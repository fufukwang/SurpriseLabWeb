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
            /*
            $m->from('service@surpriselab.com.tw', 'Table For One');
            $m->sender('service@surpriselab.com.tw', 'Table For One');
            $m->replyTo('service@surpriselab.com.tw', 'Table For One');

            $m->to('service@surpriselab.com.tw', 'Table For One');
            */
            $m->from('king.no1.wang@gmail.com', 'Table For One');
            $m->sender('king.no1.wang@gmail.com', 'Table For One');
            $m->replyTo('king.no1.wang@gmail.com', 'Table For One');

            $m->to('king.no1.wang@gmail.com', 'Table For One');
            $m->subject('Table For One，聯絡我們-通知');
        });
        TFOContact::insert($data);
        return redirect("/TableForOne/index.html")->with('message','留言完成!');
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
        TFOOrder::create($data);

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

        Ecpay::i()->Send['ReturnURL']         = "http://surpriselab.hellokiki.info/TableForOne/ECPayBackCallBack" ;
        Ecpay::i()->Send['MerchantTradeNo']   = $data['sn'];              //訂單編號
        Ecpay::i()->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');      //交易時間
        Ecpay::i()->Send['TotalAmount']       = $data['money'];           //交易金額
        Ecpay::i()->Send['TradeDesc']         = $data['item'];            //交易描述
        Ecpay::i()->Send['ChoosePayment']     = \ECPay_PaymentMethod::ALL ;     //付款方式

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

        $order = TFOOrder::where('sn',$arFeedback['MerchantTradeNo'])->first();

        Mail::send('TFO.email.order',$order,function($m) use ($order){
            $m->from('service@surpriselab.com.tw', 'Table For One');
            $m->sender('service@surpriselab.com.tw', 'Table For One');
            $m->replyTo('service@surpriselab.com.tw', 'Table For One');

            $m->to($order->email, $order->name);
            $m->subject('Table For One 訂位成功 !');
        });
    }


    public function getRoomData(Request $request){
        if($request->ajax() && $request->isMethod('post') && $request->has('act')){
            switch ($request->act) {
                case 'getDayByDefault':
                    $pro = TFOPro::select('day')->where('open',1)->where('day','>=',Carbon::now()->toDateString())->groupBy('day')->get();
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
                    $pro = TFOPro::select('id','rangstart','rangend','money','wine')->where('open',1)->where('day',$day)->where('dayparts',$dayparts)
                    ->whereRaw("(sites-IFNULL((SELECT COUNT(id) FROM(TFOOrder) WHERE TFOOrder.tfopro_id=TFOPro.id AND (paystatus='已付款' OR (paystatus='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=1")
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
