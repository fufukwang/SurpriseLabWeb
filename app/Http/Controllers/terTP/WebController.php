<?php

namespace App\Http\Controllers\terTP;

use App\Http\Controllers\Controller;
use Mail;
use SLS;
use log;
use Carbon\Carbon;

class WebController extends Controller
{
    // +8hr - 900 sec = 27900
    protected $oquery = "IFNULL((SELECT SUM(pople)-SUM(cut) FROM(tertp_order) WHERE tertp_order.pro_id=tertp_pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()+interval 27900 second and SYSDATE()+interval 28800 second))),0)";


    public function grenOrderSN(){
        $now = \Carbon\Carbon::now()->toDateString();
        $sn = \App\model\terTP\order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');
        if($sn>0){
            $sn += 1;
        } else {
            $sn = "3".\Carbon\Carbon::now()->format('Ymd').'0001';
        }
        return $sn;
    }
    
    public function sendMailCenter($ord,$type='wheel'){
        try{
            $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($ord->day.' '.$ord->rang_start)->subMinutes(20))));
            $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($ord->day.' '.$ord->rang_end))));
            $toData = [
                'day'   => Carbon::parse($ord->day)->format('Y / m / d'),
                'pople' => $ord->pople,
                'id'    => $ord->id,
                'name'  => $ord->name,
                'email' => $ord->email,
                'phone' => $ord->tel,
                'time'  => substr($ord->rang_start,0,5),
                'gday'  => $rangStart.'/'.$rangEnd,
                'master'=> "?id=".md5($ord->id)."&sn=".$ord->sn,
                'mday'  => $ord->day,
                'need_english' => $ord->need_english,
                'need_chinese' => $ord->need_chinese,
            ];
            if($type == 'wheel'){
                $toData['template'] = 'order';
                SLS::SendEmailterTPByTemplateName($toData);
                $now = time();
                $lim = strtotime($ord->day.' '.$ord->rang_start);
                $day = round( ($lim - $now) / 86400 );
                if($day <= 7){
                    $toData['template'] = 'D7';
                    SLS::SendEmailterTPByTemplateName($toData);
                }
                if($day <= 5){
                    $toData['template'] = 'D5';
                    SLS::SendEmailterTPByTemplateName($toData);
                }
                if($day <= 3){
                    $toData['template'] = 'D3';
                    SLS::SendEmailterTPByTemplateName($toData);
                }
            } else {
                $toData['template'] = $type;
                if(SLS::SendEmailterTPByTemplateName($toData)){
                    return true;
                } else {
                    return false;
                }
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
    public function sendSmsCenter($ord,$type='wheel'){
        try{
            $toData = [
                'id'    => $ord->id,
                'name'  => $ord->name,
                'phone' => $ord->tel,
                'mday'  => $ord->day,
            ];
            if($type == 'wheel'){
                $toData['template'] = 'order';
                SLS::SendSmsterTPByTemplateName($toData);
                $now = time();
                $lim = strtotime($ord->day.' '.$ord->rang_start);
                $day = round( ($lim - $now) / 86400 );
                
                if($day <= 0){
                    $toData['template'] = 'DX';
                    SLS::SendSmsterTPByTemplateName($toData);
                }
                
            } else {
                $toData['template'] = $type;
                if(SLS::SendSmsterTPByTemplateName($toData)){
                    return true;
                } else {
                    return false;
                }
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}