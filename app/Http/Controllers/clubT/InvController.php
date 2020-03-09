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

    private function inv_sent(){
        $post_data_array = array(
            'RespondType' => 'JSON',
            'Version' => '1.4',
            'TimeStamp' => time(), //請以 time() 格式
            'TransNum' => '',
            'MerchantOrderNo' => '201409170000001',
            'BuyerName' => '王大品',
            'BuyerUBN' => '',
            'BuyerAddress' => '',
            'BuyerEmail' => '',
            'Category' => 'B2B',
            'TaxType' => '1',
            'TaxRate' => '5',
            'Amt' => '490',
            'TaxAmt' => '10',
            'TotalAmt' => '500',
            'CarrierType' => '',
            'CarrierNum' => rawurlencode(''),
            'LoveCode' => '',
            'PrintFlag' => 'Y',
            'ItemName' => '商品一|商品二', //多項商品時，以「|」分開
            'ItemCount' => '1|2', //多項商品時，以「|」分開
            'ItemUnit' => '個|個', //多項商品時，以「|」分開
            'ItemPrice' => '300|100', //多項商品時，以「|」分開
            'ItemAmt' => '300|200', //多項商品時，以「|」分開
            'Comment' => '',
            'CreateStatusTime' => '',
            'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
        );
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
        $url = env('INV_URL');
        $MerchantID = env('INV_ID'); //商店代號
        $transaction_data_array = array(//送出欄位
            'MerchantID_' => $MerchantID,
            'PostData_' => $post_data
        );
        $transaction_data_str = http_build_query($transaction_data_array);
        $result = $this->curl_work($url, $transaction_data_str); //背景送出
        print_r($result); //印出結果
    }


    // 列表多人開立發票
    public function muInvOpen(Request $request){
        $orders = order::whereIn('id',$request->id)->select('name','sn','email')->get();

        $post_data_array = [
            'RespondType' => 'JSON',
            'Version' => '1.4',
            'TimeStamp' => time(), //請以 time() 格式
            'TransNum' => '',
            'MerchantOrderNo' => '201409170000001',
            'BuyerName' => '王大品',
            'BuyerUBN' => '',
            'BuyerAddress' => '',
            'BuyerEmail' => '',
            'Category' => 'B2C',
            'TaxType' => '1',
            'TaxRate' => '5',
            'Amt' => '490',
            'TaxAmt' => '10',
            'TotalAmt' => '500',
            'CarrierType' => '',
            'CarrierNum' => rawurlencode(''),
            'LoveCode' => '',
            'PrintFlag' => 'Y',
            'ItemName' => '商品一|商品二', //多項商品時，以「|」分開
            'ItemCount' => '1|2', //多項商品時，以「|」分開
            'ItemUnit' => '個|個', //多項商品時，以「|」分開
            'ItemPrice' => '300|100', //多項商品時，以「|」分開
            'ItemAmt' => '300|200', //多項商品時，以「|」分開
            'Comment' => '',
            'CreateStatusTime' => '',
            'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
        ];
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
                'MerchantOrderNo' => $order->sn,
                'BuyerName' => $request->name,
                'BuyerUBN' => $request->UBN,
                'BuyerAddress' => '',
                'BuyerEmail' => $request->email,
                'Category' => $request->category,
                'TaxType' => $request->tax_type,
                'TaxRate' => $request->tax_rate,
                'Amt' => '490',
                'TaxAmt' => '10',
                'TotalAmt' => '500',
                'CarrierType' => '',
                'CarrierNum' => rawurlencode(''),
                'LoveCode' => '',
                'PrintFlag' => 'Y',
                'ItemName' => '', //多項商品時，以「|」分開
                'ItemCount' => '', //多項商品時，以「|」分開
                'ItemUnit' => '', //多項商品時，以「|」分開
                'ItemPrice' => '', //多項商品時，以「|」分開
                'ItemAmt' => '', //多項商品時，以「|」分開
                'Comment' => '',
                'CreateStatusTime' => '',
                'Status' => '1' //1=立即開立，0=待開立，3=延遲開立
            ];
        } catch (Exception $exception) {
            Log::error($exception);
            //return redirect('/clubtomorrow/pros?')->with('message','新增失敗!');
        }
    }
    // 發票報廢
    public function InvClose(){

    }
}