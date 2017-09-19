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
    // 生成訂單並送給金流
    public function generateOrder(Request $request){
        $pro = TFOPro::find($request->pro_id);
        if($request->SelSet == 'money'){
            $money = $pro->money;
        } else {
            $money = $pro->money + $pro->wine;
        }

        $data = [
            'name'       => $request->name,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'paystatus'  => '未付款',
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
        ECpay::i()->Send['ClientBackURL']     = 'https://www.surpriselab.com.tw/';
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
        //$session = $request->session()->get('OrderData', 'emp');
        if($request->ajax() && $request->isMethod('post')){
            $data = [
                'sotry' => $request->sotry,
            ];
            $id = $session['id'];
            if(is_numeric($id) && $id>0){
                TFOOrder::where('id',$id)->update($data);
                $request->session()->forget('OrderData');
            } 
            $request->session()->forget('OrderData');
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
        $arFeedback = Ecpay::i()->CheckOutFeedback($request->all());
        if($arFeedback['RtnCode'] == 1 && $arFeedback['RtnMsg'] == '交易成功'){
            return view('TFO.front.ECPaySuccess');
        } else {
            return redirect('/tableforone/m/ECPayFail');
        }
    }

    public function ECPayFail(Request $result){
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
            if($reduri!='') return redirect($reduri);
            $request->session()->forget('OrderData');
            */
            return view('TFO.front.ECPayFail');
        }
    }



    public function EcPayBackCallBack(Request $request){
        $arFeedback = Ecpay::i()->CheckOutFeedback($request->all());
        $data = [
            'result' => json_encode($arFeedback)
        ];
        if($arFeedback['RtnCode'] == 1 && $arFeedback['RtnMsg'] == '交易成功'){
            $data['paystatus'] = '已付款';
        } 
        TFOOrder::where('sn',$arFeedback['MerchantTradeNo'])->update($data);
        print Ecpay::i()->getResponse($arFeedback);

        if($arFeedback['RtnCode'] == 1 && $arFeedback['RtnMsg'] == '交易成功'){
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
        }
    }


    public function getRoomData(Request $request){
        if($request->ajax() && $request->isMethod('post') && $request->has('act')){
            switch ($request->act) {
                case 'getDayByDefault':
                    $pro = TFOPro::select('day')->where('open',1)->where('day','>=',Carbon::now()->toDateString())->groupBy('day')->whereRaw("(sites-IFNULL((SELECT COUNT(id) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paystatus='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=1")->get();
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
                    $pro = TFOPro::select(DB::raw("(sites-IFNULL((SELECT COUNT(id) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paystatus='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS site,id,rangstart,rangend,money,wine"))
                        ->where('open',1)->where('day',$day)->where('dayparts',$dayparts)
                    //->whereRaw("(sites-IFNULL((SELECT COUNT(id) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paystatus='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=1")
                        ->get();
                    return $pro->toJson();
                break;
            }


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

}
