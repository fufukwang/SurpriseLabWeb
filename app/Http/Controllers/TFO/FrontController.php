<?php

namespace App\Http\Controllers\TFO;

use Illuminate\Http\Request;
use Mail;
use Exception;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 購物車內容

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('front.home');
    }

    public function about(){
        return view('front.about');
    }

    public function conceptstore(){
        return view('front.conceptstore');
    }
    public function conceptstoreTaipei(){
        return view('front.conceptstore_taipei');
    }

    public function contact(){
        return view('front.contact');
    }   
    // 訂單查詢
    public function OrderChecks(Request $request){
        $token = md5(time());

        $request->session()->flash($token, 1);
        return view('front.order-checks',compact('token'));
    }
    public function OrderStatus(Request $request){
        $token = $request->token;
        if($token==null || empty($request->session()->get($token))) {
            return $this->returnError('請勿重複提交表單');
        }
        if(Order::where('sn',$request->SN)->count()>0){
            $order = Order::where('sn',$request->SN)->first();
        } else {
            return $this->returnError('查無訂單編號');
        }
        $type = 'search';
        return view('front.order-status',compact('order','type'));
    }

    // 產品
    public function products(Request $request){
        $cats = Cate::orderBy('sort','desc')->get();

        return view('front.products',compact('cats'));
    }

    public function product(Request $request,$slug){
        $product = Product::where('slug',$slug)->first();
        $product->intro = json_decode($product->intro);
        $product->info  = json_decode($product->info);
        return view('front.product',compact('product'));
    }

    // 購物車
    public function cart(Request $request){
        $token = md5(time());

        $request->session()->flash($token, 1);
        return view('front.cart',compact('token'));
    }
    // 生成定單 
    public function GenerateOrder(Request $request){
        $token = $request->token;
        if($token==null || empty($request->session()->get($token))) {
            return $this->returnError('請勿重複提交表單');
        }

        $sn = $this->GenerateSN();
        $data = [
            'sn'       => $sn,
            'tel'      => $request->telInput,
            'address'  => $request->addressInput,
            'name'     => $request->nameInput,
            'email'    => $request->emailInput,
            'status'   => '未處理',
            'payStatus'=> '未付款',
            'money'    => 0,
            'freight'  => 80,
            'pay_type' => $request->pay_type,
            'sex'      => $request->sexInput,
            'zip'      => $request->zipInput,
            'shipper'  => '',
            'country'  => $request->countInput,
            'cardcode' => '',
            'notes'    => '',
        ];
        $order = Order::create($data);

        $orderDetail = []; $money = 0;
        foreach(json_decode($request->OrderDetail) as $row){
            $product = Product::find($row->product_id);
            if( strtotime($product->discount_start)>time() && strtotime($product->discount_end)<time()){ $price = $product->discount; } else { $price = $product->price; }
            $singe = $price * $row->num;
            $detail = [
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'dis_start'  => $product->discount_start,
                'dis_end'    => $product->discount_end,
                'discount'   => $product->discount,
                'price'      => $price,
                'size'       => $row->size,
                'num'        => $row->num,
                'sub'        => $singe,
            ];
            $money = $money + $singe;
            array_push($orderDetail,$detail);
        }
        OrderDetail::insert($orderDetail);


        // 回填 money
        $order->money = $money;
        $order->save();

        // 訂單成立 發送 email
        try{
            $from = [
                'email' => $order->email,
                'name'  => $order->name
            ];
            $to = [
                'email' => $order->email,
                'name'  => $order->name
            ];
            $parameter = Parameter::firstOrCreate(['slug'=>'setting']);
            if(!isnull($parameter->json)){
                $setting = json_decode($parameter->json);
                $from = [
                    'email' => $setting->email,
                    'name'  => $setting->name
                ];
            }
            //寄出信件
            Mail::send('emails.newOrderCustomer', ['order'=>$order], function($message) use ($from, $to) {
                $message->from($from['email'], $from['name']);
                $message->to($to['email'], $to['name'])->subject('訂單成立通知');
            });
            Mail::send('emails.newOrderManage', ['order'=>$order], function($message) use ($from, $to) {
                $message->from($from['email'], $from['name']);
                $message->to($from['email'], $from['name'])->subject('訂單成立通知');
            });
        } catch (Exception $exception) {
            // 先不做紀錄
        }
            

        if($data['pay_type'] == '信用卡付款'){
            //return $this->returnError('等待刷卡權限中');
            $web_password = env('BUYSAFE_PWD', '');
            // 回填 buysafeForm 表單 
            $form = [
                'web'          => env('BUYSAFE_WEB', ''),
                'MN'           => $money + $data['freight'],
                'OrderInfo'    => '商品訂購',
                'Td'           => $order->sn,
                'sna'          => $order->name,
                'sdt'          => $order->tel,
                'email'        => $order->email,
                'note1'        => '',
                'note2'        => '',
                'card_Type'    => '',
                'Country_Type' => '',
                'Term'         => '',
                'ChkValue'     => '',
            ];
            $form['ChkValue'] = $ChkValue = strtoupper(sha1($form['web'].$web_password.$form['MN'].$form['Term']));
            return view('front.buysafeForm',compact('form'));
            
        } elseif($data['pay_type'] == '貨到付款') {
            $type = 'aftershipperPay';
            return view('front.order-status',compact('order','type'));
        }
    }
    // 處理刷卡回傳
    public function SunTechSuccess(Request $request){
        $json = $this->saveRequest($request);
        if($this->CheckBuySafeValue($json['buysafeno'].$json['MN'].$json['errcode'],$json['ChkValue'])){
            $data = [
                'cardcode' => json_encode($json),
            ];
            if($json['errcode'] == '00'){
                $data['payStatus'] = '已付款';
            }
            Order::where('sn',$json['Td'])->update($data);
        }
    }
    public function SunTechFail(Request $request){
        $json = $this->saveRequest($request);
        if($this->CheckBuySafeValue($json['buysafeno'].$json['MN'].$json['errcode'],$json['ChkValue'])){
            $data = [
                'cardcode' => json_encode($json),
            ];
            Order::where('sn',$json['Td'])->update($data);
        }
    }
    // 前端使用邏輯
    private function GenerateSN(){
        $random = 10;$SN = '';
        for($i=1;$i<=$random;$i++){
            $b = rand(0,9);
            $SN .= $b;
        }
        if(Order::where('sn',$SN)->count()>0){
            $this->GenerateSN();
        } else {
            return $SN;
        }
    }
    private function returnError($txt = ''){
        return view('front._errorMsg',compact('txt'));
    }


    // 紅陽處理
    private function CheckBuySafeValue($arg,$ChkValue){
        $web          = env('BUYSAFE_WEB', '');
        $web_password = env('BUYSAFE_PWD', '');
        $Checker = strtoupper(sha1($web.$web_password.$arg));
        return ($Checker == $ChkValue);
    }
    private function saveRequest($request){
        return [
            'buysafeno'   => $request->buysafeno,
            'web'         => $request->web,
            'Td'          => $request->Td,
            'MN'          => $request->MN,
            'webname'     => $request->webname,
            'Name'        => $request->Name,
            'note1'       => $request->note1,
            'note2'       => $request->note2,
            'ApproveCode' => $request->ApproveCode,
            'Card_NO'     => $request->Card_NO,
            'SendType'    => $request->SendType,
            'errcode'     => $request->errcode,
            'errmsg'      => $request->errmsg,
            'Card_Type'   => $request->Card_Type,
            'InvoiceNo'   => $request->InvoiceNo,
            'ChkValue'    => $request->ChkValue,
        ];
    }



}
