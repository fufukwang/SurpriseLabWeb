<?php

namespace App\Http\Controllers\terminal;

use App\Http\Controllers\Controller;
use Mail;
use SLS;

class WebController extends Controller
{

    protected $oquery = "IFNULL((SELECT SUM(pople) FROM(terminalorder) LEFT JOIN terminal_pro_order ON terminalorder.id=terminal_pro_order.order_id WHERE terminalpro.id=terminal_pro_order.pro_id AND (pay_status IN ('已付款','已付款(部分退款)') OR (pay_status='未完成' AND terminalorder.created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)";


    public function SendOrderEmailByTemplateName($data){
        try{
            if(strpos($data['email'],'@yahoo') || strpos($data['email'],'@hotmail')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_DARK_USER')]);
                config(['mail.password' => env('MAIL_DARK_PASS')]);
            } else {
                config(['mail.host' => env('MAIL_HOST')]);
                config(['mail.username' => env('MAIL_USERNAME')]);
                config(['mail.password' => env('MAIL_PASSWORD')]);
            }
            Mail::send('terminal.email.'.$data['template'],$data,function($m) use ($data){
                $m->from('terminal@surpriselab.com.tw', '落日轉運站 Sunset Terminal');
                $m->sender('terminal@surpriselab.com.tw', '落日轉運站 Sunset Terminal');
                $m->replyTo('terminal@surpriselab.com.tw', '落日轉運站 Sunset Terminal');

                $m->to($data['email'], $data['name']);
                $m->subject('【落日轉運站】訂位確認信件');

                /*
                switch ($data['template']) {
                    case 'order':
                        $m->subject('【落日轉運站】訂位確認信件');
                        break;

                }
                */
                    
            });
            SLS::sent_single_sms($data['phone'],"《落日轉運站》訂位確認信已寄出，請務必、務必查看。若未收到，請至垃圾信匣或促銷內容尋找唷！\n\n祝你旅途愉快！\n落日轉運站乘務人員");
            return true;
        } catch (Exception $e){
            Log::error($e);
            return false;
        }
    }


}