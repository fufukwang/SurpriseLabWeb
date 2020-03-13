<?php

namespace App\Http\Controllers\clubT;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\club\club_sms;
use App\model\club\coupon;
use App\model\club\order;
use App\model\club\pro;
use App\model\club\backme;
use App\model\club\inv;


use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
use Log;
use Excel;


class InvController extends Controller
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
        if($this->user->clubtomorrow == 0){
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
            $orders = order::whereIn('id',$request->id)->select('name','sn','email','pople','tel','dial_code','id')->get();
            foreach($orders as $row){
                $phone = str_replace("+886","0",$row->dial_code) . $row->tel;
                $coupons = coupon::where('o_id',$row->sn)->get();
                $coupon_pople = 0;
                $tmp_b_id = 0;
                $totleamt = 0;
                $inv_open = false;
                $last_four = '';
                if($coupons){
                    foreach($coupons as $coup){
                        $single_money = backme::select('money')->find($coup->b_id)->money;
                        if($tmp_b_id != $coup->b_id){
                            $tmp_b_id = $coup->b_id;
                            $totleamt += $single_money;
                        }
                        if($coup->type == 'p1'){ $coupon_pople += 1; } elseif ($coup->type == 'p4') { $coupon_pople += 4; } elseif ($coup->type == 'p10') { $coupon_pople += 10; }
                    }
                    $last_four = backme::select('last_four')->find($coup->b_id)->last_four;
                } else {
                    $totleamt = $row->OM;
                    if($row->pay_type == '信用卡'){
                        if($row->result !=''){
                            $card_info = json_decode($row->result);
                            if(isset($card_info->status) && $card_info->status==0){
                                $last_four = $card_info->card_info->last_four;
                            }
                        }
                          
                    }
                }
                $taxamt = $totleamt * 5 / 100;
                $post_data_array = [
                    'RespondType' => 'JSON',
                    'Version' => '1.4',
                    'TimeStamp' => time(), //請以 time() 格式
                    'TransNum' => '',
                    'MerchantOrderNo' => $row->sn,
                    'BuyerName' => $row->name,
                    'BuyerUBN' => '',
                    'BuyerPhone' => $phone,
                    'BuyerAddress' => '',
                    'BuyerEmail' => $row->email,
                    'Category' => 'B2C',
                    'TaxType' => '1',
                    'TaxRate' => '5',
                    'Amt' => $totleamt - $taxamt,
                    'TaxAmt' => $taxamt,
                    'TotalAmt' => $totleamt,
                    'CarrierType' => '',
                    'CarrierNum' => rawurlencode(''),
                    'LoveCode' => '',
                    'PrintFlag' => 'Y',
                    'ItemName' => '明日俱樂部票券', //多項商品時，以「|」分開
                    'ItemCount' => $row->pople, //多項商品時，以「|」分開
                    'ItemUnit' => '張', //多項商品時，以「|」分開
                    'ItemPrice' => $totleamt / $row->pople, //多項商品時，以「|」分開
                    'ItemAmt' => $totleamt, //多項商品時，以「|」分開
                    'Comment' => $last_four,
                    'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
                ];
                $result = $this->inv_sent($post_data_array);
                $results = json_decode($result['web_info'],true);
                $r = json_decode($results['Result'],true);
                inv::insert([
                    'order_id'  => $row->id,
                    'number'    => $r['InvoiceNumber'],
                    'is_cancal' => 0,
                    'sent_obj'  => json_encode($post_data_array),
                    'results'   => $result['web_info']
                ]);
            }
            return redirect('/clubtomorrow/print?')->with('message','發票開立完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/clubtomorrow/print?')->with('message','發票開立失敗!');
        }
    }
    // 單一發票開立
    public function singleInvOpne(Request $request){
        try{
            $order = order::find($request->id);
            $post_data_array = [
                'RespondType' => 'JSON',
                'Version' => '1.4',
                'TimeStamp' => time(), //請以 time() 格式
                'TransNum' => '',
                'MerchantOrderNo' => $request->MerchantOrderNo,
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
                'CarrierNum' => rawurlencode($request->CarrierNum),
                'LoveCode' => $request->LoveCode,
                'PrintFlag' => 'Y',
                'ItemName' => '明日俱樂部票券', //多項商品時，以「|」分開
                'ItemCount' => $request->ItemCount, //多項商品時，以「|」分開
                'ItemUnit' => '張', //多項商品時，以「|」分開
                'ItemPrice' => $request->ItemPrice, //多項商品時，以「|」分開
                'ItemAmt' => $request->ItemAmt, //多項商品時，以「|」分開
                'Comment' => $request->Comment,
                'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
            ];
            $result = $this->inv_sent($post_data_array);
            $results = json_decode($result['web_info'],true);
            $r = json_decode($results['Result'],true);
            $inv = inv::where('order_id',$request->id)->first();
            if($inv){
                $inv->is_cancal = 0;
                $inv->save();
            } else {
                inv::insert([
                    'order_id'  => $request->id,
                    'number'    => $r['InvoiceNumber'],
                    'is_cancal' => 0,
                    'sent_obj'  => json_encode($post_data_array),
                    'results'   => $result['web_info']
                ]);    
            }
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
            $r = json_decode($results['Result'],true);
            $inv->is_cancal = 1;
            $inv->save();
            return Response::json($results, 200);
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json([
                'Status' => false
            ], 200);
        }
    }
}