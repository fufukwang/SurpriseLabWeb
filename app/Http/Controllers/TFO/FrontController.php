<?php

namespace App\Http\Controllers\TFO;

use Illuminate\Http\Request;
use Response;
use Mail;
use Exception;
use App\model\TFOPro;
use App\model\TFOOrder;
use App\model\TFOContact;
use App\model\TFOGift;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Ecpay;
use MC;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function ContentStore(Request $request){
        $data = [
            'tel'    => $request->tel,
            'status' => '未處理',
            'email'  => $request->email,
            'name'   => $request->name,
            'notes'  => $request->notes,
        ];
        Mail::send('TFO.email.Contact',$data,function($m) use ($data){
            $m->from('tableforone@surpriselab.com.tw', 'Table For One');
            $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
            $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

            $m->to('tableforone@surpriselab.com.tw', 'Table For One');

            $m->subject('Table For One，聯絡我們-通知');
        });
        TFOContact::insert($data);
        return redirect("/tableforone/index.html")->with('message','留言完成!');
    }
    // 生成訂單並顯示內容
    public function CashPay(Request $request){
        if($request->ajax() && $request->isMethod('post')){
            $pro = TFOPro::find($request->pro_id);
            /*
            if($request->SelSet == 'money'){
                $money = $pro->cash_money;
            } else {
                $money = $pro->cash_money + $pro->cash_wine;
            }
            */
            $money = ($pro->cash_money * $request->pople) * 1.1; // 服務費
            // 處理葷素選擇
            $tmp = [$request->mv1];
            if($request->pople==2){
                array_push($tmp,$request->mv2);
            } else if($request->pople==3){
                array_push($tmp,$request->mv2,$request->mv3);
            } else if($request->pople>=4){
                array_push($tmp,$request->mv2,$request->mv3,$request->mv4);
            }
            $mv = json_encode($tmp);
            $data = [
                'name'       => $request->name,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'pople'      => $request->pople,
                'paystatus'  => '未完成',
                'sn'         => $this->GenerateSN(),
                'tfopro_id'  => $request->pro_id,
                'tfogife_id' => 0,
                'meal'       => '',
                'money'      => $money,
                'notes'      => $request->notes,
                'story'      => '',
                'manage'     => '',
                'result'     => '',
                'paytype'    => '現場付款',
                'item'       => $request->item,
                'mv'         => $mv,
            ];

            $order = TFOOrder::create($data);


            // 加入電子報
            $mcAdd = array(
                'email_address' => $data['email']
            );
            $result = MC::checksub('1ffcba4562',$mcAdd);
            $json = json_decode($result,true);
            if($json['status']==404){
                $mcArray = array(
                    'email_address' => $data['email'],
                    'status'        => 'subscribed',
                    'merge_fields'  => array(
                        'FNAME' => $data['name']
                    )
                );
                //訂閱的動作
                $rr = MC::subscribe('1ffcba4562',$mcArray);
            }

            try {

                $order = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id')->select('day','rangstart','rangend','name','email')->where('sn',$data['sn'])->first();

                $arr = [
                    'day'       => $order->day,
                    'rangstart' => $order->rangstart,
                    'rangend'   => $order->rangend,
                    'name'      => $order->name,
                    'email'     => $order->email,
                ];
                Mail::send('TFO.email.order',$arr,function($m) use ($arr){
                    $m->from('tableforone@surpriselab.com.tw', 'Table For One');
                    $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
                    $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

                    $m->to($arr['email'], $arr['name']);
                    $m->subject('Table For One 訂位成功 !');
                });
            } catch(Exception $e) {

            }
            return Response::json(['status'=> 'success','sn'=>$data['sn']], 200);
        }
        
        $order = TFOOrder::where('sn',$request['sn'])->first();
        $sn    = $order->sn;
        $money = $order->money;        
        return view('TFO.front.CashPay',compact('sn','money'));

    }
    // 生成訂單並送給金流
    public function generateOrder(Request $request){
        $pro = TFOPro::find($request->pro_id);
        /*
        if($request->SelSet == 'money'){
            $money = $pro->money;
        } else {
            $money = $pro->money + $pro->wine;
        }
        $money = $money * 1.1; // 服務費

        $data = [
            'name'       => $request->name,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'paystatus'  => '未完成',
            'sn'         => $this->GenerateSN(),
            'tfopro_id'  => $request->pro_id,
            'tfogife_id' => 0,
            'meal'       => $request->meal,
            'money'      => $money,
            'notes'      => $request->notes,
            'story'      => '',
            'manage'     => '',
            'result'     => '',
            'paytype'    => '信用卡',
            'item'       => $request->item,
        ];
        */
        $money = ($pro->money * $request->pople) * 1.1; // 服務費
            // 處理葷素選擇
        $tmp = [$request->mv1];
        if($request->pople==2){
            array_push($tmp,$request->mv2);
        } else if($request->pople==3){
            array_push($tmp,$request->mv2,$request->mv3);
        } else if($request->pople>=4){
            array_push($tmp,$request->mv2,$request->mv3,$request->mv4);
        }
        $mv = json_encode($tmp);
        $data = [
            'name'       => $request->name,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'pople'      => $request->pople,
            'paystatus'  => '未完成',
            'sn'         => $this->GenerateSN(),
            'tfopro_id'  => $request->pro_id,
            'tfogife_id' => 0,
            'meal'       => '',
            'money'      => $money,
            'notes'      => $request->notes,
            'story'      => '',
            'manage'     => '',
            'result'     => '',
            'paytype'    => '信用卡',
            'item'       => $request->item,
            'mv'         => $mv,
        ];
        $order = TFOOrder::create($data);

        // 加入電子報
        $mcAdd = array(
            'email_address' => $data['email']
        );
        $result = MC::checksub('1ffcba4562',$mcAdd);
        $json = json_decode($result,true);
        if($json['status']==404){
            $mcArray = array(
                'email_address' => $data['email'],
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => $data['name']
                )
            );
            //訂閱的動作
            $rr = MC::subscribe('1ffcba4562',$mcArray);
        }

        $request->session()->put('OrderData', [
            'lang' => $request->lang,
            'id'   => $order->id,
        ]);

        Ecpay::i()->Send['ReturnURL']         = "https://www.surpriselab.com.tw/tableforone/ECPayBackCallBack" ;
        Ecpay::i()->Send['MerchantTradeNo']   = $data['sn'];              //訂單編號
        Ecpay::i()->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');      //交易時間
        Ecpay::i()->Send['TotalAmount']       = $data['money'];           //交易金額
        Ecpay::i()->Send['TradeDesc']         = $data['item'];            //交易描述
        Ecpay::i()->Send['ChoosePayment']     = \ECPay_PaymentMethod::Credit ;     //付款方式
        ECpay::i()->Send['ClientBackURL']     = 'https://www.surpriselab.com.tw/tableforone/';
        ECpay::i()->Send['OrderResultURL']    = 'https://www.surpriselab.com.tw/tableforone/ECPaySuccess';

        //訂單的商品資料
        array_push(Ecpay::i()->Send['Items'], [
            'Name'     => $data['item'], 
            'Price'    => (int)$data['money'],
            'Currency' => "元", 
            'Quantity' => (int) "1", 
            'URL'      => "dedwed"]);

        //Go to ECPay
        echo "緑界頁面導向中...";
        echo Ecpay::i()->CheckOutString();
    }



    public function ECPaySuccess(Request $request){
        if($request->ajax() && $request->isMethod('post')){
            $data = [
                'story' => $request->story,
            ];
            if($request->has('sn')){
                TFOOrder::where('sn',$request->sn)->update($data);
                //$request->session()->forget('OrderData');
            } 
            //$request->session()->forget('OrderData');
            return Response::json(['message'=> '已更新'], 200);
        }



/*
        if($session == 'emp'){
            abort(404);
        } else {
            $id = $session['id'];
            if(is_numeric($id) && $id>0){
                $order = TFOOrder::find($id);
                if($order->paystatus != '已付款') return redirect('/tableforone/m/ECPayFail');
            } 
            $reduri = '';
            if($session['lang']=='/tableforone/m/reservation.html'){
                $reduri = '/tableforone/m/ECPaySuccess';
            } elseif($session['lang']=='/tableforone/en/reservation.html'){
                $reduri = '/tableforone/en/ECPaySuccess';
            } elseif($session['lang']=='/tableforone/m.en/reservation.html'){
                $reduri = '/tableforone/m.en/ECPaySuccess';
            }
            if($reduri!='') return redirect($reduri);

            return view('TFO.front.ECPaySuccess');
        }
        */
        $arFeedback = $request->all();
        $data = [
            'return_result' => json_encode($arFeedback)
        ];
        TFOOrder::where('sn',$arFeedback['MerchantTradeNo'])->update($data);

        if($arFeedback['RtnCode'] == 1){
            $sn = $arFeedback['MerchantTradeNo'];
            return view('TFO.front.ECPaySuccess',compact('sn'));
        } else {
            return redirect('/tableforone/ECPayFail');
        }
    }

    public function ECPayFail(Request $request){
        $session = $request->session()->get('OrderData', 'emp');
        if($session == 'emp'){
            abort(404);
        } else {
            /*
            $reduri = '';
            if($session['lang']=='/tableforone/m/reservation.html'){
                $reduri = '/tableforone/m/ECPayFail.html';
            } elseif($session['lang']=='/tableforone/en/reservation.html'){
                $reduri = '/tableforone/en/ECPayFail.html';
            } elseif($session['lang']=='/tableforone/m.en/reservation.html'){
                $reduri = '/tableforone/m.en/ECPayFail.html';
            }
            if($reduri!='') return redirect($reduri);*/
            $request->session()->forget('OrderData');
            
            return view('TFO.front.ECPayFail');
        }
    }



    public function EcPayBackCallBack(Request $request){
        $arFeedback = Ecpay::i()->CheckOutFeedback($request->all());
        $data = [
            'result' => json_encode($arFeedback)
        ];
        if($arFeedback['RtnCode'] == 1 ){
            $data['paystatus'] = '已付款';
        } 
        TFOOrder::where('sn',$arFeedback['MerchantTradeNo'])->update($data);
        //print Ecpay::i()->getResponse($arFeedback);

        if($arFeedback['RtnCode'] == 1 ){
            $order = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id')->select('day','rangstart','rangend','name','email')->where('sn',$arFeedback['MerchantTradeNo'])->first();

            $arr = [
                'day'       => $order->day,
                'rangstart' => $order->rangstart,
                'rangend'   => $order->rangend,
                'name'      => $order->name,
                'email'     => $order->email,
            ];
            Mail::send('TFO.email.order',$arr,function($m) use ($arr){
                $m->from('tableforone@surpriselab.com.tw', 'Table For One');
                $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
                $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

                $m->to($arr['email'], $arr['name']);
                $m->subject('Table For One 訂位成功 !');
            });
            return '1|OK';
        }
    }


    public function getRoomData(Request $request){
        if($request->ajax() && $request->isMethod('post') && $request->has('act')){
            switch ($request->act) {
                case 'getDayByDefault':
                    $pro = TFOPro::select('day')->where('open',1)->where('day','>=',Carbon::now()->toDateString())->groupBy('day')->whereRaw("(sites-IFNULL((SELECT COUNT(id) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paytype='現場付款' AND paystatus<>'取消訂位') OR (paystatus='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=1")->get();
                    return $pro->toJson();
                break;
                case 'getDatepartByDay':
                    $day = $request->day;
                    $pro = TFOPro::select('dayparts')->where('open',1)->where('day',$day)->groupBy('dayparts')->get();
                    return $pro->toJson();
                break;
                case 'getIDByDatepart':
                    $day      = $request->day;
                    $dayparts = $request->dayparts;
                    $pro = TFOPro::select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paytype='現場付款' AND paystatus<>'取消訂位') OR (paystatus='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS site,id,rangstart,rangend,money,wine,cash_wine,cash_money"))
                        ->where('open',1)->where('day',$day)->where('dayparts',$dayparts)
                    //->whereRaw("(sites-IFNULL((SELECT COUNT(id) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paystatus='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=1")
                        ->get();
                    return $pro->toJson();
                break;
                case 'getDayByRedeem':
                    $pro = TFOPro::select('day')->where('open',1)->where('dayparts','晚餐')->where('day','>=',Carbon::now()->toDateString())->groupBy('day')->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paytype='現場付款' AND paystatus<>'取消訂位') OR (paystatus='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=1")->get();
                    return $pro->toJson();
                break;
                case 'getDatepartByDayRedeem':
                    $day = $request->day;
                    $pro = TFOPro::select('dayparts')->where('open',1)->where('day',$day)->where('dayparts','晚餐')->groupBy('dayparts')->get();
                    return $pro->toJson();
                break;
            }


        }
    }




    /* About Gift Card */
    public function checkGiftCardStatus(Request $request){
        $act = '-----';
        if(TFOGift::where('code',strtoupper($request->code))->where('paystatus',1)->where('status',0)->where('tfoorder_id',0)->count()>0){
            $act = 'YES';
        }
        return Response::json(['status'=> 'OK','activate'=>$act], 200);
    }
    public function checkAndGenerateOrder(Request $request){
        $act = '-----';
        if(TFOGift::where('code',strtoupper($request->code))->where('paystatus',1)->where('status',0)->where('tfoorder_id',0)->count()>0){
            $data = [
                'paystatus'  => '已付款',
                'paytype'    => '禮物卡',
                'name'       => $request->name,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'sn'         => $this->GenerateSN(),
                'tfopro_id'  => $request->pro_id,
                'tfogife_id' => 0,
                'meal'       => $request->meal,
                'money'      => 1200,
                'notes'      => $request->notes,
                'story'      => '',
                'manage'     => '',
                'result'     => '',
                'item'       => '禮物卡',
            ];
            $order = TFOOrder::create($data);

            if($data['paystatus'] == '已付款'){

                $newdata = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id')->select('day','rangstart','rangend','name','email')->find($order->id);
                $arr = [
                    'day'       => $newdata->day,
                    'rangstart' => $newdata->rangstart,
                    'rangend'   => $newdata->rangend,
                    'name'      => $newdata->name,
                    'email'     => $newdata->email,
                ];
                Mail::send('TFO.email.order',$arr,function($m) use ($arr){
                    $m->from('tableforone@surpriselab.com.tw', 'Table For One');
                    $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
                    $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

                    $m->to($arr['email'], $arr['name']);
                    $m->subject('Table For One 訂位成功 !');
                });
            }

            TFOGift::where('code',$request->code)->update([
                'status'      => 1,
                'tfoorder_id' => $order->id,
            ]);
            $act = 'YES';
        }

        return Response::json(['status'=> 'OK','activate'=>$act], 200);
    }



    // 生成禮物卡
    public function generateGiftCardOrder(Request $request){

        $data = [
            'sn'             => $this->GenerateGiftSN(),
            'code'           => $this->GenerateGiftCodeSN(),
            'status'         => 0, // 未使用
            'paystatus'      => 0, // 付款狀態
            'tfoorder_id'    => 0, // 哪一筆訂單使用
            'bname'          => $request->bname,
            'btel'           => $request->btel,
            'bemail'         => $request->bemail,
            'rname'          => $request->rname,
            'rtel'           => $request->rtel,
            'remail'         => $request->remail,
            'address'        => $request->inaddress.$request->outaddress,
            'send'           => 0,
            'manage'         => '',
            'admin_id'       => 0,
            'sendtype'       => $request->sendtype,
            'backresult'     => '',
            'result'         => '',
            'InvitationText' => $request->InvitationText,
        ];
        $order = TFOGift::create($data);

        // 加入電子報
        $mcAdd = array(
            'email_address' => $data['bemail']
        );
        $result = MC::checksub('1ffcba4562',$mcAdd);
        $json = json_decode($result,true);
        if($json['status']==404){
            $mcArray = array(
                'email_address' => $data['bemail'],
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => $data['bname']
                )
            );
            //訂閱的動作
            $rr = MC::subscribe('1ffcba4562',$mcArray);
        }

        $mcAdd = array(
            'email_address' => $data['remail']
        );
        $result = MC::checksub('1ffcba4562',$mcAdd);
        $json = json_decode($result,true);
        if($json['status']==404){
            $mcArray = array(
                'email_address' => $data['remail'],
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => $data['rname']
                )
            );
            //訂閱的動作
            $rr = MC::subscribe('1ffcba4562',$mcArray);
        }
        $money = 1200;
        if($data['sendtype']=='國內郵寄'){
            $money = 1300;
        } elseif($data['sendtype']=='國外郵寄'){
            $money = 1400;
        }


        Ecpay::i()->Send['ReturnURL']         = "https://www.surpriselab.com.tw/tableforone/EcPayGiftCardBackCallBack" ;
        Ecpay::i()->Send['MerchantTradeNo']   = $data['sn'];              //訂單編號
        Ecpay::i()->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');      //交易時間
        Ecpay::i()->Send['TotalAmount']       = $money;           //交易金額
        Ecpay::i()->Send['TradeDesc']         = '禮物卡';            //交易描述
        Ecpay::i()->Send['ChoosePayment']     = \ECPay_PaymentMethod::Credit ;     //付款方式
        ECpay::i()->Send['ClientBackURL']     = 'https://www.surpriselab.com.tw/tableforone/';
        ECpay::i()->Send['OrderResultURL']    = 'https://www.surpriselab.com.tw/tableforone/EcPayGiftCardBack';

        //訂單的商品資料
        array_push(Ecpay::i()->Send['Items'], [
            'Name'     => '禮物卡', 
            'Price'    => $money,
            'Currency' => "元", 
            'Quantity' => (int) "1", 
            'URL'      => "dedwed"]);

        //Go to ECPay
        echo "緑界頁面導向中...";
        echo Ecpay::i()->CheckOutString();
    }
    public function EcPayGiftCardBackCallBack(Request $request){
        $arFeedback = Ecpay::i()->CheckOutFeedback($request->all());
        $data = [
            'backresult' => json_encode($arFeedback)
        ];
        if($arFeedback['RtnCode'] == 1 ){
            $data['paystatus'] = 1;
        } 
        TFOGift::where('sn',$arFeedback['MerchantTradeNo'])->update($data);

        if($arFeedback['RtnCode'] == 1 ){
            $gift = TFOGift::where('sn',$arFeedback['MerchantTradeNo'])->first();
            if($gift->sendtype == 'Email'){
                $arr = [
                    'bname'          => $gift->bname,
                    'rname'          => $gift->rname,
                    'remail'         => $gift->remail,
                    'InvitationText' => $gift->InvitationText,
                    'code'           => $gift->code
                ];
                Mail::send('TFO.email.giftcard',$arr,function($m) use ($arr){
                    $m->from('tableforone@surpriselab.com.tw', 'Table For One');
                    $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
                    $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

                    $m->to($arr['remail'], $arr['rname']);
                    $m->subject('【一人餐桌來信】嘿！你的朋友，捎來了份禮物給你');
                });
                TFOGift::where('id',$gift->id)->update(['send'=>1]);
            }
            $arr = [
                'bname'          => $gift->bname,
                'bemail'         => $gift->bemail,
                'rname'          => $gift->rname,
                'rtel'           => $gift->rtel,
                'remail'         => $gift->remail,
                'InvitationText' => $gift->InvitationText,
            ];
            Mail::send('TFO.email.giftorder',$arr,function($m) use ($arr){
                $m->from('tableforone@surpriselab.com.tw', 'Table For One');
                $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
                $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

                $m->to($arr['bemail'], $arr['bname']);
                $m->subject('table for ONE 一人餐桌 !');
            });
            return '1|OK';
        }
    }
    public function EcPayGiftCardBack(Request $request){
        $arFeedback = $request->all();
        $data = [
            'result' => json_encode($arFeedback)
        ];

        
        TFOGift::where('sn',$arFeedback['MerchantTradeNo'])->update($data);

        if($arFeedback['RtnCode'] == 1){
            $sn = $arFeedback['MerchantTradeNo'];
            return view('TFO.front.giftcard5',compact('sn'));
        } else {
            return view('TFO.front.giftcard6');
        }
    }


    private function GenerateSN(){
        $random = 12;$SN = '';
        for($i=1;$i<=$random;$i++){
            $b = rand(0,9);
            $SN .= $b;
        }
        if(TFOOrder::where('sn',$SN)->count()>0){
            $this->GenerateSN();
        } else {
            return $SN;
        }
    }

    private function GenerateGiftSN(){
        $random = 10;$SN = 'G';
        for($i=1;$i<=$random;$i++){
            $b = rand(0,9);
            $SN .= $b;
        }
        if(TFOGift::where('sn','G'.$SN)->count()>0){
            $this->GenerateGiftSN();
        } else {
            return $SN;
        }
    }

    private function GenerateGiftCodeSN(){
        $random = 8;$SN = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for($i=1;$i<=$random;$i++){
            $b = $characters[rand(0, strlen($characters)-1)];
            $SN .= $b;
        }
        if(TFOGift::where('code',$SN)->count()>0){
            $this->GenerateGiftCodeSN();
        } else {
            return $SN;
        }
    }

}
