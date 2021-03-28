<?php

namespace App\Http\Controllers\tgt2;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\tgt2\coupon;
use App\model\tgt2\order;
use App\model\tgt2\pro;
use App\model\tgt2\backme;


use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
use Log;
use SLS;
use Excel;

class BackController extends Controller
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
        if($this->user->thegreattipsy == 0 && $this->user->tgt2 == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
        DB::enableQueryLog();
    }


    /**
     * XLS data.
     */
    public function BackMes(Request $request){
        /*
        if($request->isMethod('post') && $request->has('id')){
            foreach($request->id as $row){
                d2xls::where('id',$row)->update(['is_sent'=>1]);
            }
        }*/
        if($request->isMethod('post') && $request->has('id')){
            foreach($request->id as $row){
                $id = $row;
                $xls     = backme::find($id);
                $coupons = coupon::where('b_id',$id)->get();
                $data = [
                    'xls'     => $xls,
                    'coupons' => $coupons,
                ];
                if(strpos($data['xls']->email,'@yahoo') || strpos($data['xls']->email,'@hotmail')) {
                    config(['mail.host' => 'smtp.gmail.com']);
                    config(['mail.username' => env('MAIL_TGT_USER')]);
                    config(['mail.password' => env('MAIL_TGT_PASS')]);
                }
                Mail::send('thegreattipsy.email.coupon',$data,function($m) use ($data){
                    $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                    $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                    $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                    $m->to($data['xls']->email, $data['xls']->name);
                    $m->subject('【微醺大飯店：1980s】劃位序號信件');
                });
                backme::where('id',$id)->update(['is_sent'=>1]);
            }
            $par = '?';
            if($request->has('search')) $par .= "&search=".$request->search;
            if($request->has('isdone')) $par .= "&isdone=".$request->isdone;
            if($request->has('is_sent')) $par .= "&is_sent=".$request->is_sent;
            if($request->has('season')) $par .= "&season=".$request->season;
            return redirect('/thegreattipsyS2/backmes'.$par)->with('message','已寄送完成!');
        }


        $mes = backme::where('id','>',0);
        if($request->has('search')){
            $search = $request->search;
            $mes = $mes->whereRaw("(
                name LIKE '%{$search}%' OR 
                tel LIKE '%{$search}%' OR 
                email LIKE '%{$search}%' OR 
                (SELECT COUNT(id) FROM(tgt2coupon) WHERE code LIKE '%{$search}%' AND tgt2coupon.b_id=tgt2backme.id)
            )");
        }
        if($request->has('isdone')){
            $mes = $mes->whereRaw("(SELECT COUNT(id) FROM(tgt2coupon) WHERE o_id=0 AND tgt2coupon.b_id=tgt2backme.id)>0");
        }
        if($request->has('is_sent')){
            $mes = $mes->where('is_sent',0);
        }
        if($request->has('season')){
            $mes = $mes->where('quarter',$request->season);
        }
        
        $mes = $mes->paginate($this->perpage);
        $quart = backme::select('quarter')->groupBy('quarter')->get();
        //dd(DB::getQueryLog());
        return view('thegreattipsy.backend.BackMes',compact('mes','request','quart'));
    }
    public function NotUseXls(Request $request){
        $backmes = backme::select('name','email','tel','eb1','p1','p2','p6','detail','manage')->whereRaw("(SELECT COUNT(id) FROM(tgt2coupon) WHERE o_id=0 AND tgt2coupon.b_id=tgt2backme.id)>0")->get()->toArray();
        $cellData = [['姓名','信箱','電話','可劃位人數','訂購內容','註記']];
        foreach ($backmes as $val) {
            $num = 0;
            if($val['eb1']>0) $num += $val['eb1'] * 1;
            if($val['p1']>0) $num += $val['p1'] * 1;
            if($val['p2']>0) $num += $val['p2'] * 2;
            if($val['p6']>0) $num += $val['p6'] * 6;
            $temp = [
                'name'   => $val['name'],
                'email'  => $val['email'],
                'tel'    => $val['tel'],
                'num'    => $num,
                'detail' => $val['detail'],
                'manage' => $val['manage'],
            ];
            array_push($cellData, $temp);
        }
        Excel::create('匯出未兌換名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
    public function sendUpdate(Request $request,$id){
        backme::where('id',$id)->update([
            'is_sent' => $request->send
        ]);
        return Response::json(['message'=> '發送狀態已更新'], 200);
    }
    public function sendManageUpdate(Request $request,$id){
        backme::where('id',$id)->update([
            'manage' => $request->manage
        ]);
        return Response::json(['message'=> '已更新'], 200);
    }
    public function infoUpdate(Request $request,$id){
        backme::where('id',$id)->update([
            'name'  => strip_tags($request->name),
            'tel'   => strip_tags($request->tel),
            'email' => strip_tags($request->email)
        ]);
        return Response::json(['message'=> '已更新'], 200);
    }
    public function CanelCoupon(Request $request){
        $id   = $request->b_id;
        $code = $request->code;
        coupon::where('b_id',$id)->where('code',$code)->update([
            'o_id' => 0
        ]);
        return Response::json(['message'=> '已更新'], 200);
    }
    public function SentCouponCode(Request $request,$id){
        if($request->isMethod('post')){
            $id = $id;
            $xls     = backme::find($id);
            $coupons = coupon::where('b_id',$id)->get();
            $data = [
                'xls'     => $xls,
                'coupons' => $coupons,
            ];
            if(strpos($data['xls']->email,'@yahoo') || strpos($data['xls']->email,'@hotmail')) {
                config(['mail.host' => 'smtp.gmail.com']);
                config(['mail.username' => env('MAIL_TGT_USER')]);
                config(['mail.password' => env('MAIL_TGT_PASS')]);
            }



            Mail::send('thegreattipsy.email.coupon',$data,function($m) use ($data){
                $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                $m->to($data['xls']->email, $data['xls']->name);
                $m->subject('【微醺大飯店：1980s】劃位序號信件');
            });
            backme::where('id',$id)->update(['is_sent'=>1]);
            return Response::json(['message'=> 'success'], 200);
        }
        return Response::json(['message'=> 'error'], 200);
    }


    /**
     * 產品分類.
     */
    public function Pros(Request $request){
        if($request->isMethod('post') && $request->has('id')){
            $act = $request->act;
            if($act == 'muUpdate'){
                foreach($request->id as $row){
                    pro::where('id',$row)->update(['open'=>$request->muopVal]);
                }    
            } elseif($act == 'oneUpdate'){
                pro::where('id',$request->id)->update(['open'=>$request->muopVal]);
                return Response::json(['success'=> true], 200);
            }
        }
        $pros = pro::where('id','>',0);
        if($request->has('day')) $pros = $pros->where('day','>=',$request->day);
        if($request->has('day_end')) $pros = $pros->where('day','<=',$request->day_end);
        if($request->has('dayparts')) $pros = $pros->where('day_parts',$request->dayparts);
        if($request->has('open')){
            if($request->open==1 || $request->open==0){
                $pros = $pros->where('open',$request->open);
            } else {
                $pros = $pros->where('open',0)->where('day','>=',Carbon::now()->format('Y-m-d'));
            }
        }
        if($request->has('open_limit') && $request->has('open_number')){
            $open_number = $request->open_number;
            if($request->open_limit==1 && is_numeric($open_number)){
                $pros = $pros->where('sites','<',$open_number);
            }
        }
        if($request->has('order')){
            $order = explode('|',$request->order);
            if(count($order)>0){
                $pros = $pros->OrderBy($order[0],$order[1]);
            }
        } else { $pros = $pros->orderBy('updated_at','desc'); }
        
        $pros = $pros->paginate($this->perpage);
        return view('thegreattipsy.backend.pros',compact('pros','request'));
    }
    public function ProEdit(Request $request,$id){
        $pro = collect();
        if(is_numeric($id) && $id>0){
            if(pro::where('id',$id)->count()>0){
                $pro = pro::find($id);
            } else {
                abort(404);
            }
        }
        return view('thegreattipsy.backend.pro',compact('pro'));
    }
    public function ProUpdate(Request $request,$id){

        $data = [
            //'day_parts'   => $request->dayparts,
            'sites'      => $request->sites,
            'money'      => $request->money,
            'open'       => $request->open,
            'cash'       => $request->cash,
        ];
        if(is_numeric($id) && $id>0){
            $data['day']       = $request->day;
            $data['day_parts']  = $request->dayparts;
            $data['rang_start'] = $request->rangstart;
            $data['rang_end']   = $request->rangend;
            pro::where('id',$id)->update($data);
        } else {
            // 日期範圍新增多筆
            $arr = [];
            for($i=0 ; $i<count($request->rangstart) ; $i++){
                $data['day_parts'] = $request->dayparts[$i];
                $data['rang_start'] = $request->rangstart[$i];
                $data['rang_end']   = $request->rangend[$i];
                if($request->daystart == ''){
                    $data['day'] = Carbon::today()->format('Y-m-d');
                    array_push($arr,$data);
                } else {
                    $daystart = Carbon::createFromFormat('Y-m-d', $request->daystart);
                    $dayend   = Carbon::createFromFormat('Y-m-d', $request->dayend);
                    do {
                        $data['day'] = $daystart->format('Y-m-d');
                        array_push($arr,$data);
                        $daystart = $daystart->addDay();
                    } while ($daystart->timestamp <= $dayend->timestamp);
                    
                }
            }
            pro::insert($arr);
        }
        return redirect('/thegreattipsyS2/pros')->with('message','編輯完成!');
    }
    public function ProDelete(Request $request,$id){
        order::where('pro_id',$id)->delete();
        pro::where('id', $id)->delete();
        return Response::json(['message'=> '營業日已刪除'], 200);

    }

    public function ProOutputSite(Request $request){
        $pro = pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(tgt2order) WHERE tgt2order.pro_id=tgt2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>0")
            ->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(tgt2order) WHERE tgt2order.pro_id=tgt2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,day"));
        if($request->daystart == ''){
            $pro = $pro->where('day',Carbon::today()->format('Y-m-d'));
        } else {
            $daystart = Carbon::createFromFormat('Y-m-d', $request->daystart);
            $dayend   = Carbon::createFromFormat('Y-m-d', $request->dayend);
            $pro = $pro->where('day','>=',$daystart);
            $pro = $pro->where('day','<=',$dayend);    
        }
        $pro = $pro->orderBy('day','asc')->orderBy('rang_start','asc')->get();

        $cellData = $pro->toArray();
        Excel::create('座位狀況',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $data = [[
                    'day'  => '日期',
                    'mon'  => '星期',
                    'part' => '時段',
                    'site' => '座位數'
                ]];
                foreach($cellData as $row){
                    $day = Carbon::parse($row['day']);
                    switch ($day->dayOfWeek) {
                        case 1: $mon = '一'; break;
                        case 2: $mon = '二'; break;
                        case 3: $mon = '三'; break;
                        case 4: $mon = '四'; break;
                        case 5: $mon = '五'; break;
                        case 6: $mon = '六'; break;
                        default: $mon = '日'; break;
                    }
                    $tmp = [
                        'day'  => $day->format('m/d'),
                        'mon'  => $mon,
                        'part' => substr($row['rang_start'],0,5).'~'.substr($row['rang_end'],0,5),
                        'site' => $row['sites']
                    ];
                    array_push($data,$tmp);
                }
                $sheet->rows($data);
            });
        })->export('xls');
        return redirect('/thegreattipsyS2/pros');
    }


    /**
     * coupon
     */
    public function Coupons(Request $request){

        $coupons = coupon::orderBy('updated_at','desc');
        //if($request->has('day')) $coupons = $coupons->where('created_at','like',$request->day.'%');
        if($request->has('search')){
            $search = $request->search;
            $coupons = $coupons->whereRaw("(
                code LIKE '%{$search}%'
            )");
        }

        $coupons = $coupons->paginate($this->perpage);
        return view('thegreattipsy.backend.coupons',compact('coupons','request'));
    }
    public function CouponDelete(Request $request,$id){
        coupon::where('id', $id)->delete();
        return Response::json(['message'=> '已刪除'], 200);

    }







    /**
     * orders.
     */
    public function Orders(Request $request,$id){
        $order = order::orderBy('updated_at','desc')->where('pro_id',$id);
        $order = $order->get();
        return view('thegreattipsy.backend.orders',compact('order'));
    }
    public function OrderEdit(Request $request,$id){
        $order = collect();
        if(is_numeric($id) && $id>0){
            if(order::where('id',$id)->count()>0){
                $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id')->select('tgt2order.id','day','day_parts','rang_end','rang_start','name','tel','email','sn','meat','notes','pay_type','pay_status','manage','result','pople','vegetarian','sites')->find($id);
            } else {
                abort(404);
            }
        }
        $pro = pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(tgt2order) WHERE tgt2order.pro_id=tgt2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$order->pople)
            ->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(tgt2order) WHERE tgt2order.pro_id=tgt2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,day"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        return view('thegreattipsy.backend.order',compact('order','pro'));
    }
    public function OrderUpdate(Request $request,$id){

        $data = [
            'pay_status' => $request->pay_status,
            'manage'     => $request->manage,
            'pay_type'   => $request->pay_type,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'vegetarian' => $request->vegetarian,
        ];
        if($request->has('pro_id') && $request->pro_id>0){
            $data['pro_id'] = $request->pro_id;
            $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 更改場次";
            // 觸發補寄
            try {
                $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id')->select('tgt2order.id','day','day_parts','rang_end','rang_start','name','tel','email','sn','meat','notes','pay_type','pay_status','manage','result','pople','vegetarian','sites')->find($id);
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($order->day.' '.$order->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($order->day.' '.$order->rang_end))));
                $mailer = [
                    'day'   => Carbon::parse($order->day)->format('Y / m / d'),
                    'time'  => substr($order->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $order->pople,
                    'email' => $order->email,
                    'name'  => $order->tel,
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn
                ];
                if($mailer['email'] != ''){
                    if(strpos($mailer['email'],'@yahoo') || strpos($mailer['email'],'@hotmail')) {
                        config(['mail.host' => 'smtp.gmail.com']);
                        config(['mail.username' => env('MAIL_TGT_USER')]);
                        config(['mail.password' => env('MAIL_TGT_PASS')]);
                    }
                    if($mailer['pople']==1){
                        $mailTheme = 'orderOne';
                    } else {
                        $mailTheme = 'order';
                    }
                    Mail::send('thegreattipsy.email.'.$mailTheme,$mailer,function($m) use ($mailer){
                        $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->to($mailer['email'], $mailer['name']);
                        $m->subject('訂位確認信 ── 內有重要任務');
                    });
                    SLS::sent_single_sms($order->tel,"《微醺大飯店：1980s》訂位確認信已寄出，內含重要任務，請務必、務必查看。若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待與您見面。\n\n順安, 微醺大飯店：1980s");
                    // 信件補送
                    $now = time();
                    $lim = strtotime($order->day.' '.$order->rang_start);
                    $day = round( ($lim - $now) / 86400 );
                    // 寄送 A 信件
                    $toData = [
                        'id'    => $order->id,
                        'name'  => $order->name,
                        'email' => $order->email,
                        'type'  => "DX" // 邀請信件
                    ];
                    // 信件補送
                    if($day <= 21){
                        $toData['type'] = "D21";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day <= 14){
                        $toData['type'] = "D14";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day <= 11){
                        $toData['day'] = $order->day.' '.$order->rang_start;
                        $toData['type'] = "D10";
                        SLS::SendPreviewEmail($toData);
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》行前提醒信已寄至您的信箱，請前往查看。 若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待見面。\n\n順安, 微醺大飯店：1980s");
                    }
                    /*
                    if($day <= 5){
                        $toData['type'] = "D05";
                        SLS::SendPreviewEmail($toData);
                    }
                    */
                    if($day == 0){
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》開幕酒會將在今日舉行，期待見面！\n\n順安, 微醺大飯店：1980s");
                    }
                }
            } catch (Exception $e){
                Log::error($e);
            }
        }
        if(is_numeric($id) && $id>0){
            order::where('id',$id)->update($data);
            $order = order::find($id);
        } 
        if($request->has('qxx') && $request->qxx != ''){
            return redirect('/thegreattipsyS2/print?'.$request->qxx)->with('message','編輯完成!');
        } else {
            return redirect('/thegreattipsyS2/orders/'.$order->pro_id)->with('message','編輯完成!');
        }
    }
    public function OrderDelete(Request $request,$id){
        $order = order::select('sn')->find($id);
        if($order){
            coupon::where('o_id',$order->sn)->update(['o_id'=>-1]);
        }
        order::where('id',$id)->delete();
        return Response::json(['message'=> '訂單已刪除'], 200);
    }

    
    public function Appointment(Request $request,$pro_id){
        try {
            $pro = pro::find($pro_id);
            return view('thegreattipsy.backend.orderAppointment',compact('pro_id','pro'));
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/thegreattipsyS2/pros?')->with('message','此編號無座位表!');
        }
    }
    public function AppointmentUpdate(Request $request,$pro_id){
        try {
            $now = Carbon::now()->toDateString();
            $count = order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');
            $people = $request->people;
            if($count>0){
                $count += 1;
            } else {
                $count = Carbon::now()->format('Ymd').'0001';
            }
            $act = pro::where('id',$pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(tgt2order) WHERE tgt2order.pro_id=tgt2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rang_start','rang_end')->first();
            $meat = [];
            /*
            for($i=0;$i<$people;$i++){
                array_push($meat,$request->input('Meal.'.$i));
            }
            */
            $money = $act->cash * $people * 1.1;
            $data = [
                'pro_id'     => $pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'notes'      => $request->notes,
                'meat'       => json_encode($meat),
                'coupon'     => 0,
                'sn'         => $count,
                'money'      => $money,
                'pay_type'   => $request->pay_type,
                'pay_status' => $request->pay_status,
                'result'     => '',
                'manage'     => $request->manage,
                'discount'   => '',
                'vegetarian' => $request->vegetarian,
            ];
            $order = order::create($data);

            if($request->pay_status == '已付款'){
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                /*
                $rangTS    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_start,0,5)))));
                $rangTE    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_end,0,5)))));
                */
                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('Y / m / d'),
                    'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $people,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn
                ];
                if($mailer['email'] != ''){
                    if(strpos($mailer['email'],'@yahoo') || strpos($mailer['email'],'@hotmail')) {
                        config(['mail.host' => 'smtp.gmail.com']);
                        config(['mail.username' => env('MAIL_TGT_USER')]);
                        config(['mail.password' => env('MAIL_TGT_PASS')]);
                    }
                    if($mailer['pople']==1){
                        $mailTheme = 'orderOne';
                    } else {
                        $mailTheme = 'order';
                    }
                    Mail::send('thegreattipsy.email.'.$mailTheme,$mailer,function($m) use ($mailer){
                        $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                        $m->to($mailer['email'], $mailer['name']);
                        $m->subject('訂位確認信 ── 內有重要任務');
                    });
                    $order->is_send = 1;
                    $order->save();
                    SLS::sent_single_sms($order->tel,"《微醺大飯店：1980s》訂位確認信已寄出，內含重要任務，請務必、務必查看。若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待與您見面。\n\n順安, 微醺大飯店：1980s");
                    // 信件補送
                    $now = time();
                    $lim = strtotime($act->day.' '.$act->rang_start);
                    $day = round( ($lim - $now) / 86400 );
                    // 寄送 A 信件
                    $toData = [
                        'id'    => $order->id,
                        'name'  => $order->name,
                        'email' => $order->email,
                        'type'  => "DX" // 邀請信件
                    ];
                    // 信件補送
                    if($day <= 21){
                        $toData['type'] = "D21";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day <= 14){
                        $toData['type'] = "D14";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day <= 11){
                        $toData['day'] = $act->day.' '.$act->rang_start;
                        $toData['type'] = "D10";
                        SLS::SendPreviewEmail($toData);
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》行前提醒信已寄至您的信箱，請前往查看。 若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待見面。\n\n順安, 微醺大飯店：1980s");
                    }
                    /*
                    if($day <= 5){
                        $toData['type'] = "D05";
                        SLS::SendPreviewEmail($toData);
                    }
                    */
                    if($day == 0){
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》開幕酒會將在今日舉行，期待見面！\n\n順安, 微醺大飯店：1980s");
                    }
                }
            }

            return redirect('/thegreattipsyS2/pros?')->with('message','新增完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/thegreattipsyS2/pros?')->with('message','新增失敗!');
        }
    }


    public function Print(Request $request){
        $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','meat','notes','tgt2order.manage','tgt2pro.money AS PM','tgt2order.money AS OM','tgt2order.created_at AS created_at','tgt2order.pay_status','email','tgt2order.sn','tgt2order.id','day_parts','day','email','pay_type','pople','pro_id','is_overseas','vegetarian');

        //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('srday')  && $request->srday!=1){
            if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
            if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);    
        }
        
        if($request->has('is_overseas') && ($request->is_overseas==1 || $request->is_overseas==2)) $order->where('is_overseas',$request->is_overseas); 

        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(tgt2order.pay_status='已付款' OR (tgt2order.pay_type='現場付款' AND tgt2order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('tgt2order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'");
        }
        if($request->has('code') && $request->code!=''){
            $order = $order->whereRaw("(SELECT COUNT(id) FROM(tgt2coupon) WHERE code='{$request->code}' AND tgt2coupon.o_id=tgt2order.sn)>0");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('tgt2order.updated_at','desc'); }
        $order = $order->paginate($this->perpage);

        return view('thegreattipsy.backend.print',compact('order','request'));
    }

    public function Table(Request $request){
        $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','meat','notes','tgt2order.manage','tgt2pro.money AS PM','tgt2order.money AS OM','tgt2order.created_at AS created_at','tgt2order.pay_status','email','tgt2order.sn','tgt2order.id','day_parts','day','email','pay_type','pople','pro_id','is_overseas','vegetarian');
        //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('srday')  && $request->srday!=1){
            if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
            if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);
        }

        if($request->has('is_overseas') && ($request->is_overseas==1 || $request->is_overseas==2)) $order->where('is_overseas',$request->is_overseas); 

        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(tgt2order.pay_status='已付款' OR (tgt2order.pay_type='現場付款' AND tgt2order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('tgt2order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'");
        }
        if($request->has('code') && $request->code!=''){
            $order = $order->whereRaw("(SELECT COUNT(id) FROM(tgt2coupon) WHERE code='{$request->code}' AND tgt2coupon.o_id=tgt2order.sn)>0");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('tgt2order.updated_at','desc'); }
        $order = $order->get();
        

        return view('thegreattipsy.backend.table',compact('order','request'));
    }

    public function XlsDataOuput(Request $request){
        $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','meat','notes','tgt2order.manage','tgt2pro.money AS PM','tgt2order.money AS OM','tgt2order.created_at AS created_at','tgt2order.pay_status','email','tgt2order.sn','tgt2order.id','day_parts','day','email','pay_type','pople','pro_id','is_overseas');
        //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('srday')  && $request->srday!=1){
            if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
            if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);
        }

        if($request->has('is_overseas') && ($request->is_overseas==1 || $request->is_overseas==2)) $order->where('is_overseas',$request->is_overseas); 

        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(tgt2order.pay_status='已付款' OR (tgt2order.pay_type='現場付款' AND tgt2order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('tgt2order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'");
        }
        if($request->has('code') && $request->code!=''){
            $order = $order->whereRaw("(SELECT COUNT(id) FROM(tgt2coupon) WHERE code='{$request->code}' AND tgt2coupon.o_id=tgt2order.sn)>0");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('tgt2order.updated_at','desc'); }
        $order = $order->get();

        $cellData = $order->toArray();
        Excel::create('名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $data = [];
                foreach($cellData as $row){
                    $row['meat'] = implode(',',json_decode($row['meat'],true));
                    array_push($data,$row);
                }
                $sheet->rows($data);
            });
        })->export('xls');
    }
    public function XlsEmailDataOuput(Request $request){
        $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
        $order = $order->select('name','email')->groupBy('email');
        $order->whereRaw("(tgt2order.pay_status='已付款' OR (tgt2order.pay_type='現場付款' AND tgt2order.pay_status<>'取消訂位'))");
        $order = $order->orderBy('tgt2order.updated_at','desc')->get();
        $cellData = $order->toArray();
        Excel::create('Email 名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    public function beSentOrderMail(Request $request,$id){
        $act = pro::select('day','rang_start','rang_end')->find($id);


        $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
        $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
        /*
        $rangTS    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_start,0,5)))));
        $rangTE    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_end,0,5)))));
        */
        $mailer = [
            'day'   => Carbon::parse($act->day)->format('Y / m / d'),
            'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
            'pople' => $request->pople,
            'email' => $request->email,
            'name'  => $request->name,
            'gday'  => $rangStart.'/'.$rangEnd,
            'master'=> "?id=".md5($request->oid)."&sn=".$request->sn
        ];
        if(strpos($mailer['email'],'@yahoo') || strpos($mailer['email'],'@hotmail')) {
            config(['mail.host' => 'smtp.gmail.com']);
            config(['mail.username' => env('MAIL_TGT_USER')]);
            config(['mail.password' => env('MAIL_TGT_PASS')]);
        }
        if($mailer['pople']==1){
            $mailTheme = 'orderOne';
        } else {
            $mailTheme = 'order';
        }
        Mail::send('thegreattipsy.email.'.$mailTheme,$mailer,function($m) use ($mailer){
            $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
            $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
            $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

            $m->to($mailer['email'], $mailer['name']);
            $m->subject('訂位確認信 ── 內有重要任務');
        });
        order::where('id',$request->oid)->update(['is_send'=>1]);
        return Response::json(['message'=> '已更新'], 200);
    }





    public function UploadXlsx2Db(Request $request){
        $filePath = '';
//dd($request->file('xlsx')->getMimeType());
        try{
            $rules = [
                'xlsx'    => 'required|mimetypes:application/octet-stream,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip',
                'quarter' => 'required|numeric'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/thegreattipsyS2/backmes')->with('message','新增失敗!(請輸入季度或檢查檔案)');
            } else {
                if ($request->hasFile('xlsx')) {
                    if ($request->file('xlsx')->isValid())
                    {
                        $destinationPath = base_path() . '/storage/app';
                        $extension = $request->file('xlsx')->getClientOriginalExtension();
                        $fileName = 'tgt_' . date('YmdHis') . '.' . $extension;
                        $request->file('xlsx')->move($destinationPath, $fileName);
                        $filePath = '/storage/app/' . $fileName;
                    }
                }
            }

            $quarter = $request->quarter;
            $i = 0;
            Excel::load($filePath, function($reader) use (&$quarter,&$i) {
                $data = [];
                $xlsx = $reader->toArray();
                foreach($xlsx as $row){
                    if($row['sn'] == '' && $row['name'] == '' && $row['detail'] == ''){
                        break;
                    } else {
                        //echo $row['sn'].'<br />';
                        if($row['sn'] == '') $row['sn'] = 0;
                        if($row['sponsor_id'] == '') $row['sponsor_id'] = 0;
                        if($row['eb1'] == '') $row['eb1'] = 0;
                        if($row['p1'] == '') $row['p1'] = 0;
                        if($row['p2'] == '') $row['p2'] = 0;
                        if($row['p6'] == '') $row['p6'] = 0;
                        $r = [
                            'sn'         => $row['sn'],
                            'detail'     => $row['detail'],
                            'num'        => $row['num'],
                            'money'      => $row['money'],
                            'name'       => $row['name'],
                            'email'      => $row['email'],
                            'tel'        => $row['tel'],
                            'sponsor_id' => $row['sponsor_id'],
                            'eb1'         => $row['eb1'],
                            'p1'         => $row['p1'],
                            'p2'         => $row['p2'],
                            'p6'         => $row['p6'],
                            'quarter'    => $quarter,  // 產出季度
                        ];
                        if(backme::where('quarter',$quarter)->where('sn', $row['sn'])->count()==0){
                            backme::insert($r);
                            $i++;
                        }
                        //array_push($data, $r);
                    }
                    
                }
                //backme::insert($data);
                $this->Db2Coupon();
            });
            return redirect('/thegreattipsyS2/backmes')->with('message','新增完成!!共新增'.$i.'筆資料');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/thegreattipsyS2/backmes')->with('message','新增失敗!');
        }
    }

    private function Db2Coupon(){
        $xls = backme::select('eb1','p1','p2','p6','id')->where('gen_coup',0)->get();
        foreach($xls as $row){
            $data = [
                'b_id' => $row->id
            ];
            if($row->eb1 >= 1){
                for($i=0;$i<$row->eb1;$i++){
                    $data['type'] = 'eb1';
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                }
            } elseif($row->p1 >= 1){
                for($i=0;$i<$row->p1;$i++){
                    $data['type'] = 'p1';
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                }
            } elseif($row->p2 >= 1){
                for($i=0;$i<$row->p2;$i++){
                    $data['type'] = 'p2';
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                }
            } elseif($row->p6 >= 1){
                for($i=0;$i<$row->p6;$i++){
                    $data['type'] = 'p6';
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                }
            }
            backme::where('id',$row->id)->update(['gen_coup'=>1]);
        }

    }

    private function GenerateGiftCodeSN(){
        $random = 8;$SN = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for($i=1;$i<=$random;$i++){
            $b = $characters[rand(0, strlen($characters)-1)];
            $SN .= $b;
        }
        if(coupon::where('code',$SN)->count()>0){
            $this->GenerateGiftCodeSN();
        } else {
            return $SN;
        }
    }
}


