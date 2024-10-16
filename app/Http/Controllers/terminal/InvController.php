<?php

namespace App\Http\Controllers\terminal;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\terminal\coupon;
use App\model\terminal\order;
use App\model\terminal\pro;
use App\model\terminal\backme;
use App\model\terminal\inv;


use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
use Log;
use Excel;


class InvController extends WebController
{
    public $perpage = 20;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user; //protected 是保護的變數,意思是這變數只能在這個 class使用
    public function __construct(Request $request)
    {
        //驚嘆號是否定判斷的意思
        if(!$request->session()->has('key')){
            return redirect('login')->send();
        } else {
            $this->user = $request->session()->get('key');
        }
        if($this->user->terminal == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
        DB::enableQueryLog();
    }


    //====以下為副程式====
    private function addpadding($string, $blocksize = 32)
    {
        $len = strlen($string);
        $pad = $blocksize - ($len % $blocksize);
        $string .= str_repeat(chr($pad), $pad);
        return $string;
    }
    private function curl_work($url = '', $parameter = '')
    {
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'Google Bot',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_POST => '1',
            CURLOPT_POSTFIELDS => $parameter
        );
        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);
        $result = curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_errno($ch);
        curl_close($ch);
        $return_info = array(
            'url' => $url,
            'sent_parameter' => $parameter,
            'http_status' => $retcode,
            'curl_error_no' => $curl_error,
            'web_info' => $result
        );
        return $return_info;
    }

    private function inv_sent($post_data_array){
        $post_data_str = http_build_query($post_data_array); //轉成字串排列
        $key = env('INV_KEY'); //商店專屬串接金鑰
        //HashKey 值
        $iv = env('INV_IV'); //商店專屬串接金鑰 HashIV 值
        if (phpversion() > 7) {
            $post_data = trim(bin2hex(openssl_encrypt($this->addpadding($post_data_str),'AES-256-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));
            //php 7 以上版本加密
        } else {
            $post_data = trim(bin2hex(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$this->addpadding($post_data_str), MCRYPT_MODE_CBC, $iv))); //php 7 之前版本加密
        }
        $url = env('INV_URL') . 'invoice_issue';
        $MerchantID = env('INV_ID'); //商店代號
        $transaction_data_array = array(//送出欄位
            'MerchantID_' => $MerchantID,
            'PostData_' => $post_data
        );
        $transaction_data_str = http_build_query($transaction_data_array);
        $result = $this->curl_work($url, $transaction_data_str); //背景送出
        return $result;
    }
    // 發票作廢
    private function inv_cancel($post_data_array){
        $post_data_str = http_build_query($post_data_array); //轉成字串排列
        $key = env('INV_KEY'); //商店專屬串接金鑰
        //HashKey 值
        $iv = env('INV_IV'); //商店專屬串接金鑰 HashIV 值
        if (phpversion() > 7) {
            $post_data = trim(bin2hex(openssl_encrypt($this->addpadding($post_data_str),'AES-256-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));
            //php 7 以上版本加密
        } else {
            $post_data = trim(bin2hex(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$this->addpadding($post_data_str), MCRYPT_MODE_CBC, $iv))); //php 7 之前版本加密
        }
        $url = env('INV_URL') . 'invoice_invalid';
        $MerchantID = env('INV_ID'); //商店代號
        $transaction_data_array = array(//送出欄位
            'MerchantID_' => $MerchantID,
            'PostData_' => $post_data
        );
        $transaction_data_str = http_build_query($transaction_data_array);
        $result = $this->curl_work($url, $transaction_data_str); //背景送出
        return $result;
    }

    // 列表多人開立發票
    public function muInvOpen(Request $request){
        try{
            $orders = order::whereIn('id',$request->id)->select('name','sn','email','pople','tel',/*'dial_code',*/'id','plan','money','dis_money','tax_id','tax_name')->get();
            foreach($orders as $row){
                //$phone = str_replace("+886","0",$row->dial_code) . $row->tel;
                $phone = $row->tel;
                $coupons = coupon::where('o_id',$row->sn)->get();
                // $coupon_pople = 0;
                $tmp_b_id = 0;
                $totleamt = 0;
                $inv_open = false;
                $last_four = '';
                $gift_money = 0;
                if(count($coupons)>0){
                    /*
                    foreach($coupons as $coup){
                        $single_money = backme::select('money')->find($coup->b_id)->money;
                        if($tmp_b_id != $coup->b_id){
                            $tmp_b_id = $coup->b_id;
                            $totleamt += $single_money;
                        }
                        if($coup->type == 'p1'){ $coupon_pople += 1; } elseif ($coup->type == 'p4') { $coupon_pople += 4; } elseif ($coup->type == 'p10') { $coupon_pople += 10; }
                    }
                    */
                    /*
                    $totleamt = count($coupons) * 4400;
                    $last_four = backme::select('last_four')->find($coup->b_id)->last_four;
                    */
                    if($row->plan == 'train'){ 
                        $gift_money = count($coupons) * 1250; // $gift_money = $totle_money; 
                    } elseif ($row->plan == 'flight') { 
                        $gift_money = count($coupons) * 500; // $gift_money = $totle_money; 
                    }
                    if($row->money>0){ $totleamt += $row->money; }
                } else {
                    $totleamt = $row->money;
                    if($row->pay_type == '信用卡'){
                        if($row->result !=''){
                            $card_info = json_decode($row->result);
                            if(isset($card_info->Status) && $card_info->Status=="SUCCESS"){
                                $last_four = $card_info->data->Result->Card4No;
                            }
                        }
                          
                    }
                }
                $taxamt = 0;// $totleamt - round($totleamt / (1 + (5 / 100)));
                $ItemName = '';$ItemCount = '';$ItemUnit = '';$ItemPrice = '';$ItemAmt = '';
                switch($row->plan){
                    case 'train':
                        $ItemName .= '微醺列車：BON VOYAGE';$ItemCount .= $row->pople;$ItemUnit .= '張';$ItemPrice .= '1250';$ItemAmt .= (1250*$row->pople);
                        $ItemName .= '|行銷折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$row->dis_money;$ItemAmt .= '|'.$row->dis_money;
                        if(1250 * $row->pople != $totleamt + $row->dis_money + $gift_money){
                            $discountLine = $totleamt + $row->dis_money - (1250 * $row->pople);
                            $ItemName .= '|折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$discountLine;$ItemAmt .= '|'.$discountLine;
                        }
                        break;
                    case 'flight':
                        $ItemName .= 'FLIGHT 無光飛航';$ItemCount .= $row->pople;$ItemUnit .= '張';$ItemPrice .= '500';$ItemAmt .= (500*$row->pople);
                        $ItemName .= '|行銷折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$row->dis_money;$ItemAmt .= '|'.$row->dis_money;
                        if(500 * $row->pople != $totleamt + $row->dis_money + $gift_money){
                            $discountLine = $totleamt + $row->dis_money - (500 * $row->pople);
                            $ItemName .= '|折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$discountLine;$ItemAmt .= '|'.$discountLine;
                        }
                        break;
                    case 'boat':
                        $ItemName .= 'Boat for ONE 單程船票';$ItemCount .= $row->pople;$ItemUnit .= '張';$ItemPrice .= '800';$ItemAmt .= (800*$row->pople);
                        $ItemName .= '|行銷折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$row->dis_money;$ItemAmt .= '|'.$row->dis_money;
                        if(800 * $row->pople != $totleamt + $row->dis_money + $gift_money){
                            $discountLine = $totleamt + $row->dis_money - (800 * $row->pople);
                            $ItemName .= '|折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$discountLine;$ItemAmt .= '|'.$discountLine;
                        }
                        break;
                    case 'A':
                        $ItemName .= '微醺列車：BON VOYAGE';$ItemCount .= $row->pople;$ItemUnit .= '張';$ItemPrice .= '1250';$ItemAmt .= (1250*$row->pople);
                        $ItemName .= '|FLIGHT 無光飛航';$ItemCount .= '|'.$row->pople;$ItemUnit .= '|張';$ItemPrice .= '|500';$ItemAmt .= '|'.(500*$row->pople);
                        $ItemName .= '|套票折扣';$ItemCount .= '|'.$row->pople;$ItemUnit .= '|張';$ItemPrice .= '|-100';$ItemAmt .= '|'.(-100*$row->pople);
                        $ItemName .= '|行銷折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$row->dis_money;$ItemAmt .= '|'.$row->dis_money;
                        if(1250 * $row->pople + 500 * $row->pople + (-100 * $row->pople) != $totleamt + $row->dis_money){
                            $discountLine = $totleamt + $row->dis_money - (1250 * $row->pople) - (500 * $row->pople) - (-100 * $row->pople);
                            $ItemName .= '|折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$discountLine;$ItemAmt .= '|'.$discountLine;
                        }
                        break;
                    case 'B':
                        $ItemName .= '微醺列車：BON VOYAGE';$ItemCount .= $row->pople;$ItemUnit .= '張';$ItemPrice .= '1250';$ItemAmt .= (1250*$row->pople);
                        $ItemName .= '|FLIGHT 無光飛航';$ItemCount .= '|'.$row->pople;$ItemUnit .= '|張';$ItemPrice .= '|500';$ItemAmt .= '|'.(500*$row->pople);
                        $ItemName .= '|Boat for ONE 單程船票';$ItemCount .= '|'.$row->pople;$ItemUnit .= '|張';$ItemPrice .= '|800';$ItemAmt .= '|'.(800*$row->pople);
                        $ItemName .= '|套票折扣';$ItemCount .= '|'.$row->pople;$ItemUnit .= '|張';$ItemPrice .= '|-150';$ItemAmt .= '|'.(-150*$row->pople);
                        $ItemName .= '|行銷折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$row->dis_money;$ItemAmt .= '|'.$row->dis_money;
                        if(1250 * $row->pople + 500 * $row->pople + 800 * $row->pople + (-150 * $row->pople) != $totleamt + $row->dis_money){
                            $discountLine = $totleamt + $row->dis_money - (1250 * $row->pople) - (500 * $row->pople) - (800 * $row->pople) - (-150 * $row->pople);
                            $ItemName .= '|折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$discountLine;$ItemAmt .= '|'.$discountLine;
                        }
                        break;
                }
                $ItemName .= '|手續費';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|0';$ItemAmt .= '|0';
                if($gift_money>0){
                    $ItemName .= '|禮物卡折抵';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.($gift_money*-1);$ItemAmt .= '|'.($gift_money*-1);
                }

                $inv_count = inv::where('order_id',$row->id)->where('is_cancal',1)->count();
                $psn = '';
                if($inv_count>0){
                    $psn = '_'.$inv_count;
                }
                $printFlag = 'N';$category = 'B2C'; $buyername = $row->name; $buyerUBN = '';$CarrierType = '2';$CarrierNum = rawurlencode($row->email);
                if($row->tax_id!='' && $row->tax_name!=''){
                    $category = 'B2B'; $buyername = $row->tax_name; $buyerUBN = $row->tax_id;$printFlag = 'Y';$CarrierType = '';$CarrierNum = '';
                }
                $post_data_array = [
                    'RespondType' => 'JSON',
                    'Version' => '1.4',
                    'TimeStamp' => time(), //請以 time() 格式
                    'TransNum' => '',
                    'MerchantOrderNo' => $row->sn.$psn,
                    'BuyerName' => $buyername,
                    'BuyerUBN' => $buyerUBN,
                    'BuyerPhone' => $phone,
                    'BuyerAddress' => '',
                    'BuyerEmail' => $row->email,
                    'Category' => $category,
                    'TaxType' => '3', // 1 應稅 3 是免稅
                    'TaxRate' => '0', // 正常是5%
                    'Amt' => $totleamt - $taxamt,
                    'TaxAmt' => $taxamt,
                    'TotalAmt' => $totleamt,
                    'CarrierType' => $CarrierType,
                    'CarrierNum' => $CarrierNum,
                    'LoveCode' => '',
                    'PrintFlag' => $printFlag,
                    'ItemName' => $ItemName, //多項商品時，以「|」分開
                    'ItemCount' => $ItemCount, //多項商品時，以「|」分開
                    'ItemUnit' => $ItemUnit, //多項商品時，以「|」分開
                    'ItemPrice' => $ItemPrice, //多項商品時，以「|」分開
                    'ItemAmt' => $ItemAmt, //多項商品時，以「|」分開
                    'Comment' => $last_four,
                    'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
                ];
                $result = $this->inv_sent($post_data_array);
                // Log::error($post_data_array);
                // Log::error($result);
                $results = json_decode($result['web_info'],true);
                if($results['Status'] == 'SUCCESS'){
                    if(isset($results['Result']) && gettype($results['Result']) == 'string') $r = json_decode($results['Result'],true);
                    if(isset($r['InvoiceNumber'])){
                        inv::insert([
                            'order_id'  => $row->id,
                            'number'    => $r['InvoiceNumber'],
                            'is_cancal' => 0,
                            'sent_obj'  => json_encode($post_data_array),
                            'results'   => $result['web_info']
                        ]);
                    } else {
                        // return Response::json(['Status' => false,'message' => '無法取得發票號碼'], 200);
                    }
                }

                /*
                if($results['Status'] != 'LIB10003'){
                    if(isset($results['Result']) && gettype($results['Result']) == 'string') $r = json_decode($results['Result'],true);
                } else {
                    $r['InvoiceNumber'] = '';
                }
                $inv = inv::where('order_id',$row->id)->first();
                if($inv){
                    $inv->is_cancal = 0;
                    $inv->save();
                } else {
                    $invnumber = '';
                    if(isset($r['InvoiceNumber'])){
                        $invnumber = $r['InvoiceNumber'];
                    }
                    if($invnumber!=''){
                        inv::insert([
                            'order_id'  => $row->id,
                            'number'    => $invnumber,
                            'is_cancal' => 0,
                            'sent_obj'  => json_encode($post_data_array),
                            'results'   => $result['web_info']
                        ]);
                    }
                }
                */
                /*
                $r = json_decode($results['Result'],true);
                inv::insert([
                    'order_id'  => $row->id,
                    'number'    => $r['InvoiceNumber'],
                    'is_cancal' => 0,
                    'sent_obj'  => json_encode($post_data_array),
                    'results'   => $result['web_info']
                ]);

                */
            }
            return redirect('/terminal/print?')->with('message','發票開立完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/terminal/print?')->with('message','發票開立失敗!');
        }
    }
    // 單一發票開立
    public function singleInvOpne(Request $request){
        try{
            $order = order::find($request->id);
            $inv_count = inv::where('order_id',$request->id)->where('is_cancal',1)->count();
            $psn = '';
            if($inv_count>0){
                $psn = '_'.$inv_count;
            }
            $printFlag = 'Y';$CarrierNum = rawurlencode($request->CarrierNum);
            if((int)$request->CarrierType == 2){
                $printFlag = 'N';
            }
            if($request->CarrierType == ''){ $CarrierNum = '';}
            $post_data_array = [
                'RespondType' => 'JSON',
                'Version' => '1.4',
                'TimeStamp' => time(), //請以 time() 格式
                'TransNum' => '',
                'MerchantOrderNo' => $request->MerchantOrderNo.$psn,
                'BuyerName' => $request->BuyerName,
                'BuyerUBN' => $request->BuyerUBN,
                'BuyerPhone' => $request->BuyerPhone,
                'BuyerAddress' => '',
                'BuyerEmail' => $request->BuyerEmail,
                'Category' => $request->Category,
                'TaxType' => $request->TaxType,
                'TaxRate' => $request->TaxRate,
                'Amt' => $request->Amt,
                'TaxAmt' => $request->TaxAmt,
                'TotalAmt' => $request->TotalAmt,
                'CarrierType' => $request->CarrierType,
                'CarrierNum' => $CarrierNum,
                'LoveCode' => $request->LoveCode,
                'PrintFlag' => $printFlag,
                /*
                'ItemName' => '落日轉運站票券('.$request->ItemCount.'人票)', //多項商品時，以「|」分開
                'ItemCount' => 1, //多項商品時，以「|」分開
                'ItemUnit' => '組', //多項商品時，以「|」分開
                'ItemPrice' => $request->ItemPrice, //多項商品時，以「|」分開
                'ItemAmt' => $request->ItemAmt, //多項商品時，以「|」分開
                */
                'ItemName' => $request->ItemName, //多項商品時，以「|」分開
                'ItemCount' => $request->ItemCount, //多項商品時，以「|」分開
                'ItemUnit' => $request->ItemUnit, //多項商品時，以「|」分開
                'ItemPrice' => $request->ItemPrice, //多項商品時，以「|」分開
                'ItemAmt' => $request->ItemAmt, //多項商品時，以「|」分開
                'Comment' => $request->Comment,
                'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
            ];
            $result = $this->inv_sent($post_data_array);
            $results = json_decode($result['web_info'],true);
            if($results['Status'] == 'SUCCESS'){
                $order->discount = $request->handling_fee;
                $order->save();
                if(isset($results['Result']) && gettype($results['Result']) == 'string') $r = json_decode($results['Result'],true);
                if(isset($r['InvoiceNumber'])){
                    inv::insert([
                        'order_id'  => $request->id,
                        'number'    => $r['InvoiceNumber'],
                        'is_cancal' => 0,
                        'sent_obj'  => json_encode($post_data_array),
                        'results'   => $result['web_info']
                    ]);
                } else {
                    return Response::json(['Status' => false,'message' => '無法取得發票號碼'], 200);
                }
            }

/*
            if($results['Status'] != 'LIB10003'){
                if(isset($results['Result']) && gettype($results['Result']) == 'string') $r = json_decode($results['Result'],true);
            } else {
                $r['InvoiceNumber'] = '';
            }
            $inv = inv::where('order_id',$request->id)->first();
            
            if($inv){
                $inv->is_cancal = 0;
                $inv->save();
            } else {
                $invnumber = '';
                if(isset($r['InvoiceNumber'])){
                    $invnumber = $r['InvoiceNumber'];
                }
                if($invnumber!=''){
                    inv::insert([
                        'order_id'  => $request->id,
                        'number'    => $invnumber,
                        'is_cancal' => 0,
                        'sent_obj'  => json_encode($post_data_array),
                        'results'   => $result['web_info']
                    ]);
                } else {
                    return Response::json(['Status' => false], 200);
                }
            }
            */
            return Response::json($results, 200);
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json([
                'Status' => false
            ], 200);
            //return redirect('/clubtomorrow/pros?')->with('message','新增失敗!');
        }
    }
    // 發票報廢
    public function InvClose(Request $request){
        try{
            $inv = inv::where('order_id',$request->id)->orderBy('created_at','desc')->first();
            $post_data_array = array(
                'RespondType' => 'JSON',
                'Version' => '1.0',
                'TimeStamp' => time(), //請以 time() 格式
                'InvoiceNumber' => $request->InvoiceNumber, // 發票號碼
                'InvalidReason' => $request->InvalidReason, // 作廢原因
            );
            $result = $this->inv_cancel($post_data_array);
            $results = json_decode($result['web_info'],true);
            // $r = json_decode($results['Result'],true);
            if($results['Status'] == 'SUCCESS'){
                $inv->is_cancal = 1;
                $inv->save();
            }
            return Response::json($results, 200);
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json([
                'Status' => false
            ], 200);
        }
    }
}