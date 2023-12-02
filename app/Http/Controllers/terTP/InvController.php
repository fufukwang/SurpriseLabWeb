<?php

namespace App\Http\Controllers\terTP;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\terTP\coupon;
use App\model\terTP\order;
use App\model\terTP\pro;
use App\model\terTP\backme;
use App\model\terTP\inv;


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
        if($this->user->terTP == 0){
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
        $key = env('DARK_KEY'); //商店專屬串接金鑰
        //HashKey 值
        $iv = env('DARK_IV'); //商店專屬串接金鑰 HashIV 值
        if (phpversion() > 7) {
            $post_data = trim(bin2hex(openssl_encrypt($this->addpadding($post_data_str),'AES-256-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));
            //php 7 以上版本加密
        } else {
            $post_data = trim(bin2hex(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$this->addpadding($post_data_str), MCRYPT_MODE_CBC, $iv))); //php 7 之前版本加密
        }
        $url = env('INV_URL') . 'invoice_issue';
        $MerchantID = env('DARK_INV_ID'); //商店代號
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
        $key = env('DARK_KEY'); //商店專屬串接金鑰
        //HashKey 值
        $iv = env('DARK_IV'); //商店專屬串接金鑰 HashIV 值
        if (phpversion() > 7) {
            $post_data = trim(bin2hex(openssl_encrypt($this->addpadding($post_data_str),'AES-256-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));
            //php 7 以上版本加密
        } else {
            $post_data = trim(bin2hex(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$this->addpadding($post_data_str), MCRYPT_MODE_CBC, $iv))); //php 7 之前版本加密
        }
        $url = env('INV_URL') . 'invoice_invalid';
        $MerchantID = env('DARK_INV_ID'); //商店代號
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
            $orders = order::whereIn('tertp_order.id',$request->id)->leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')->select('name','sn','email','pople','tel',/*'dial_code',*/'tertp_order.id','tertp_order.money','dis_money','tax_id','tax_name','co_money','p1','p2','p6','vehicle','ticket')->get();
            foreach($orders as $row){
                //$phone = str_replace("+886","0",$row->dial_code) . $row->tel;
                $phone = str_replace("+886","0",str_replace("+8860","0",$row->tel));
                $coupon_pople = 0;
                $tmp_b_id = 0;
                $totleamt = 0;
                $inv_open = false;
                $last_four = '';

                    $totleamt = $row->money;
                    if($row->pay_type == '信用卡'){
                        if($row->result !=''){
                            $card_info = json_decode($row->result);
                            if(isset($card_info->Status) && $card_info->Status=="SUCCESS"){
                                $last_four = $card_info->data->Result->Card4No;
                            }
                        }
                          
                    }
                $ticket = '';
                $num = '';
                $price = '';

                switch($row->ticket){
                    case 'p1': $ticket = '單人票'; $num = $row->pople; $price = $row->p1; break;
                    case 'p2': $ticket = '雙人票'; $num = $row->pople / 2; $price = $row->p2; break;
                    case 'p6': $ticket = '六人票'; $num = $row->pople / 6; $price = $row->p6; break;
                }
                $taxamt = $totleamt - round($totleamt / (1 + (5 / 100)));
                $ItemName = '';$ItemCount = '';$ItemUnit = '';$ItemPrice = '';$ItemAmt = '';
                $ItemName .= '巴黎舞會'.$ticket;$ItemCount .= $num;$ItemUnit .= '張';$ItemPrice .= $price;$ItemAmt .= ($price*$num);
                if($row->dis_money>0){
                    $ItemName .= '|行銷折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|-'.$row->dis_money;$ItemAmt .= '|-'.$row->dis_money;
                }
                if($row->co_money>0){
                    $ItemName .= '|禮物卡/序號折抵';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|-'.$row->co_money;$ItemAmt .= '|-'.$row->co_money;
                }
                if(($price*$num) - $row->dis_money - $row->co_money != $totleamt){
                    $balance = $totleamt - (($price*$num) - $row->dis_money - $row->co_money);
                    $ItemName .= '|折扣';$ItemCount .= '|1';$ItemUnit .= '|組';$ItemPrice .= '|'.$balance;$ItemAmt .= '|'.$balance;
                }

                $inv_count = inv::where('order_id',$row->id)->where('is_cancal',1)->count();
                $psn = '';
                if($inv_count>0){
                    $psn = '_'.$inv_count;
                }
                $category = 'B2C'; $buyername = $row->name; $buyerUBN = '';$printFlag = 'N';$CarrierType = '2';$CarrierNum = rawurlencode($row->email);
                if($row->tax_id!='' && $row->tax_name!=''){
                    $category = 'B2B'; $buyername = $row->tax_name; $buyerUBN = $row->tax_id;$printFlag = 'Y';$CarrierType = '';$CarrierNum = '';
                    if($row->vehicle!=''){
                        $printFlag = 'N';$CarrierType = '0';$CarrierNum = rawurlencode($row->vehicle);
                    }
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
                    'TaxType' => '1',
                    'TaxRate' => '5',
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
                // Log::error($post_data_array);
                $result = $this->inv_sent($post_data_array);
                Log::error($result);
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
            return redirect('/tertp/print?')->with('message','發票開立完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/tertp/print?')->with('message','發票開立失敗!');
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
            $printFlag = 'Y'; $CarrierNum = rawurlencode($request->CarrierNum);
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
            $order->discount = $request->handling_fee;
            $order->save();
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
            $inv = inv::where('order_id',$request->id)->first();
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