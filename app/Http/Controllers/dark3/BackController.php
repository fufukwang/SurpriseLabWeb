<?php

namespace App\Http\Controllers\dark3;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\dark3\coupon;
use App\model\dark3\order;
use App\model\dark3\pro;
use App\model\dark3\backme;
use App\model\dark3\inv;
use App\model\setting;

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
        if($this->user->dark3 == 0){
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
                $pp = '';
                if($xls->p2>0){ $pp = 'p2';}
                if($xls->p4>0){ $pp = 'p4';}
                if($xls->gift>0){ $pp = 'gift';}
                $data = [
                    'email'    => $xls->email,
                    'name'     => $xls->name,
                    'xls'      => $xls,
                    'coupons'  => $coupons,
                    'template' => 'coupon'.$pp,
                ];
                SLS::SendEmailByTemplateName($data);
                backme::where('id',$id)->update(['is_sent'=>1]);
                /*
                if(strpos($data['xls']->email,'@yahoo')) {
                    config(['mail.host' => 'smtp.gmail.com']);
                    config(['mail.username' => env('MAIL_TGT_USER')]);
                    config(['mail.password' => env('MAIL_TGT_PASS')]);
                }
                try {
                    Mail::send('thegreattipsy.email.coupon',$data,function($m) use ($data){
                        $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                        $m->to($data['xls']->email, $data['xls']->name);
                        $m->subject('【微醺大飯店：1980s】劃位序號信件');
                    });
                    backme::where('id',$id)->update(['is_sent'=>1]);
                } catch (\Exception $e){
                    Log::error($e);
                }
                */
            }
            $par = '?';
            if($request->has('search')) $par .= "&search=".$request->search;
            if($request->has('isdone')) $par .= "&isdone=".$request->isdone;
            if($request->has('is_sent')) $par .= "&is_sent=".$request->is_sent;
            if($request->has('season')) $par .= "&season=".$request->season;
            return redirect('/dark3/backmes'.$par)->with('message','已寄送完成!');
        }


        $mes = backme::where('id','>',0);
        if($request->has('search')){
            $search = $request->search;
            $mes = $mes->whereRaw("(
                name LIKE '%{$search}%' OR 
                tel LIKE '%{$search}%' OR 
                email LIKE '%{$search}%'
            )");
        }
        if($request->has('copuon')){
            $text = trim($request->copuon);
            $coupons = coupon::orderBy('updated_at','desc')->select('b_id')->whereRaw("(
                code LIKE '%{$text}%'
            )")->get();
            $mes = $mes->whereIn('id',$coupons->toArray());



// (SELECT COUNT(id) FROM(tgt2coupon) WHERE code LIKE '%{$$request->search}%' AND tgt2coupon.b_id=tgt2backme.id)
        }
        if($request->has('isdone')){
            $mes = $mes->whereRaw("(SELECT COUNT(id) FROM(dark3coupon) WHERE o_id=0 AND dark3coupon.b_id=dark3backme.id)>0");
        }
        if($request->has('is_sent')){
            $mes = $mes->where('is_sent',0);
        }
        if($request->has('season')){
            $mes = $mes->where('quarter',$request->season);
        }

        if($request->has('xls') && $request->xls == 1){
            // 輸出 XLS
            $cellData = [['庫碰','類別','兌換狀態']];
            foreach ($mes->get() as $val) {
                foreach(coupon::where('b_id',$val['id'])->get() as $row){
                    $type = '';
                    if($row->type == 'p2'){ $type ='雙人套票'; }elseif( $row->type == 'p4' ){ $type ='雙菜單套票'; }elseif( $row->type == 'gift' ){ $type ='禮物卡'; } 
                    $temp = [
                        'sn'     => $row->code,
                        'type'   => $type,
                        'status' => ($row->o_id === 0) ? '尚未兌換' : '兌換或已失效',
                    ];
                    array_push($cellData, $temp);
                }
            }
            Excel::create('匯出名單酷碰',function ($excel) use ($cellData){
                $excel->sheet('data', function ($sheet) use ($cellData){
                    $sheet->rows($cellData);
                });
            })->export('xls');
        }
        
        $mes = $mes->paginate($this->perpage);
        $quart = backme::select('quarter')->groupBy('quarter')->get();
        //dd(DB::getQueryLog());
        return view('dininginthedark3.backend.BackMes',compact('mes','request','quart'));
    }
    public function NotUseXls(Request $request){
        $backmes = backme::select('id','name','email','tel','p2','p4','gift','detail','manage')->whereRaw("(SELECT COUNT(id) FROM(dark3coupon) WHERE o_id=0 AND dark3coupon.b_id=dark3backme.id)>0")->get()->toArray();
        $cellData = [['姓名','信箱','電話','可劃位人數','訂購內容','註記']];
        foreach ($backmes as $val) {
            $num = 0;
            $count = coupon::where('b_id',$val['id'])->where('o_id',0)->count();
            $num = $count * 2;
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
        backme::where('id',$id)->update([
            'is_sent' => 0
        ]);
        return Response::json(['message'=> '已更新'], 200);
    }
    public function SentCouponCode(Request $request,$id){
        if($request->isMethod('post')){
            $id = $id;
            $xls     = backme::find($id);
            $coupons = coupon::where('b_id',$id)->get();
            $pp = '';
            if($xls->p2>0){ $pp = 'p2';}
            if($xls->p4>0){ $pp = 'p4';}
            if($xls->gift>0){ $pp = 'gift';}
            $data = [
                'email'    => $xls->email,
                'name'     => $xls->name,
                'xls'      => $xls,
                'coupons'  => $coupons,
                'template' => 'coupon'.$pp,
            ];
            $success = SLS::SendEmailByTemplateName($data);

            /*
            Mail::send('thegreattipsy.email.coupon',$data,function($m) use ($data){
                $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                $m->to($data['xls']->email, $data['xls']->name);
                $m->subject('【微醺大飯店：1980s】劃位序號信件');
            });
            */
            if($success){
                backme::where('id',$id)->update(['is_sent'=>1]);
                return Response::json(['message'=> 'success'], 200);
            } else {
                return Response::json(['message'=> 'error'], 200);
            }
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
        $queryBetween = "'".Carbon::now()->subSeconds(900)->format('Y-m-d H:i:s')."' AND '".Carbon::now()->format('Y-m-d H:i:s')."'";
        $pros = pro::select(DB::raw("(IFNULL((SELECT SUM(pople)-SUM(cut) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))),0)) AS now,(sites-IFNULL((SELECT SUM(pople)-SUM(cut) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))),0)) AS space,sites,id,rang_start,rang_end,day,id,rang_start,rang_end,day_parts,money,cash,open"));
        if($request->has('day') && $request->has('day_end')){
            $open_count = pro::select(DB::raw("SUM((IFNULL((SELECT SUM(pople)-SUM(cut) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))),0))) AS sale,count(id) as num,SUM(sites) as site"))->where('open',1); 
            $all_count = pro::select(DB::raw("SUM((IFNULL((SELECT SUM(pople)-SUM(cut) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))),0))) AS sale,count(id) as num,SUM(sites) as site"));
        } else {
            $open_count = pro::select('id')->where('id',0);
            $all_count = pro::select('id')->where('id',0);
        }

        if($request->has('day')){
            $pros = $pros->where('day','>=',$request->day);
            $open_count = $open_count->where('day','>=',$request->day);
            $all_count = $all_count->where('day','>=',$request->day);
        }
        if($request->has('day_end')){
            $pros = $pros->where('day','<=',$request->day_end);
            $open_count = $open_count->where('day','<=',$request->day_end);
            $all_count = $all_count->where('day','<=',$request->day_end);
        }
        if($request->has('dayparts')){
            $pros = $pros->where('day_parts',$request->dayparts);
            $open_count = $open_count->where('day_parts',$request->dayparts);
            $all_count = $all_count->where('day_parts',$request->dayparts);
        }
        if($request->has('special')){
            $pros = $pros->where('special',$request->special);
            $open_count = $open_count->where('special',$request->special);
            $all_count = $all_count->where('special',$request->special);
        }
        if($request->has('open')){
            if($request->open==1 || $request->open==0){
                $pros = $pros->where('open',$request->open);
                $open_count = $open_count->where('open',$request->open);
                $all_count = $all_count->where('open',$request->open);
            } else {
                $pros = $pros->where('open',0)->where('day','>=',Carbon::now()->format('Y-m-d'));
                $open_count = $open_count->where('open',0)->where('day','>=',Carbon::now()->format('Y-m-d'));
                $all_count = $all_count->where('open',0)->where('day','>=',Carbon::now()->format('Y-m-d'));
            }
        }
        if($request->has('open_limit') && $request->has('open_number')){
            $open_number = $request->open_number;
            if($request->open_limit==1 && is_numeric($open_number)){
                $pros = $pros->where('sites','<=',$open_number);
                $open_count = $open_count->where('sites','<=',$open_number);
                $all_count = $all_count->where('sites','<=',$open_number);
            }
        }
        if($request->has('order')){
            $order = explode('|',$request->order);
            if(count($order)>0){
                $pros = $pros->OrderBy($order[0],$order[1]);
            }
        } else { $pros = $pros->orderBy('updated_at','desc'); }
        $pros = $pros->paginate($this->perpage);
        $open = $open_count->get();
        $count = $all_count->get();
        return view('dininginthedark3.backend.pros',compact('pros','request','count','open'));
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
        return view('dininginthedark3.backend.pro',compact('pro'));
    }
    public function ProUpdate(Request $request,$id){

        $data = [
            //'day_parts'   => $request->dayparts,
            'sites'      => $request->sites,
            'money'      => $request->money,
            'open'       => $request->open,
            'cash'       => $request->cash,
            'special'    => $request->special,
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
        return redirect('/dark3/pros')->with('message','編輯完成!');
    }
    public function ProDelete(Request $request,$id){
        order::where('pro_id',$id)->delete();
        pro::where('id', $id)->delete();
        return Response::json(['message'=> '營業日已刪除'], 200);

    }

    public function ProOutputSite(Request $request){
        $queryBetween = "'".Carbon::now()->subSeconds(900)->format('Y-m-d H:i:s')."' AND '".Carbon::now()->format('Y-m-d H:i:s')."'";
        $pro = pro::select(DB::raw("(IFNULL((SELECT SUM(pople)-SUM(cut) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))),0)) AS now,sites,id,rang_start,rang_end,day"));
        if($request->has('type')){
            if($request->type == 'not'){
                $pro = $pro->where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople)-SUM(cut) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))),0))>0");
            } elseif($request->type == 'open'){
                $pro = $pro->where('open',1);
            }
        }

        if($request->daystart == ''){
            $pro = $pro->where('day',Carbon::today()->format('Y-m-d'));
        } else {
            // $daystart = Carbon::createFromFormat('Y-m-d', $request->daystart);
            // $dayend   = Carbon::createFromFormat('Y-m-d', $request->dayend);
            $pro = $pro->where('day','>=',$request->daystart);
            $pro = $pro->where('day','<=',$request->dayend);    
        }
        $pro = $pro->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        
        $cellData = $pro->toArray();
        Excel::create('座位狀況',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $data = [[
                    'id'   => '編號',
                    'day'  => '日期',
                    'mon'  => '星期',
                    'part' => '時段',
                    'open' => '開放空位',
                    'now'  => '目前訂位',
                    'only' => '剩餘座位',
                    'pr'   => '公關位置數',
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
                        'id'   => $row['id'],
                        'day'  => $day->format('m/d'),
                        'mon'  => $mon,
                        'part' => substr($row['rang_start'],0,5).'~'.substr($row['rang_end'],0,5),
                        'open' => $row['sites'],
                        'now'  => $row['now'],
                        'only' => $row['sites'] - $row['now'],
                        'pr'   => order::where('edit_type','公關位')->where('pay_status','已付款')->where('pro_id',$row['id'])->sum('pople') ?? 0
                    ];
                    array_push($data,$tmp);
                }
                $sheet->rows($data);
            });
        })->export('xls');
        return redirect('/dark3/pros');
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
        if($request->has('type')){
            $type = $request->type;
            $coupons = $coupons->where('type',$type);
        } else {
            $coupons = $coupons->whereIn('type',['p2','p4','gift']);
        }

        $coupons = $coupons->paginate($this->perpage);
        return view('dininginthedark3.backend.coupons',compact('coupons','request'));
    }
    public function CouponDelete(Request $request,$id){
        coupon::where('id', $id)->delete();
        return Response::json(['message'=> '已刪除'], 200);

    }
    /**
     *  gift
     **/
    public function Gift(Request $request){
        try{
            $coupons = coupon::orderBy('updated_at','desc')->where('type','gift');


        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/dark3/backmes')->with('message','新增失敗!');
        }
    }
    public function GiftCreate(Request $request){
        
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
                return redirect('/dark3/backmes')->with('message','新增失敗!(請輸入季度或檢查檔案)');
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
                        if($row['p2'] == '') $row['p2'] = 0;
                        if($row['p4'] == '') $row['p4'] = 0;
                        if($row['gift'] == '') $row['gift'] = 0;
                        $r = [
                            'sn'         => $row['sn'],
                            'detail'     => $row['detail'],
                            'num'        => $row['num'],
                            'money'      => $row['money'],
                            'name'       => $row['name'],
                            'email'      => $row['email'],
                            'tel'        => $row['tel'],
                            'sponsor_id' => $row['sponsor_id'],
                            'p2'         => $row['p2'],
                            'p4'         => $row['p4'],
                            'gift'         => $row['gift'],
                            'quarter'    => $quarter,  // 產出季度
                            'buy_at'     => Carbon::parse($row['time'])->format('Y-m-d H:i:s')
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
            return redirect('/dark3/backmes')->with('message','新增完成!!共新增'.$i.'筆資料');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/dark3/backmes')->with('message','新增失敗!');
        }
    }

    private function Db2Coupon(){
        $xls = backme::select('p2','p4','gift','id')->where('gen_coup',0)->get();
        foreach($xls as $row){
            $data = [
                'b_id' => $row->id
            ];
            if($row->p2 >= 1){
                for($i=0;$i<$row->p2;$i++){
                    $data['type'] = 'p2';
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                }
            } elseif($row->gift >= 1){
                for($i=0;$i<$row->gift;$i++){
                    $data['type'] = 'gift';
                    $data['code'] = $this->GenerateGiftCodeSN(true);
                    coupon::insert($data);
                }
            } elseif($row->p4 >= 1){
                for($i=0;$i<$row->p4;$i++){
                    $data['type'] = 'p4';
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                    $data['code'] = $this->GenerateGiftCodeSN();
                    coupon::insert($data);
                }
            }
            backme::where('id',$row->id)->update(['gen_coup'=>1]);
        }

    }

    private function GenerateGiftCodeSN($gift=false){
        $random = 8;$SN = '';$inNum = 1;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($gift){
            $SN = 'CHANGE';
        }
        for($i=$inNum;$i<=$random;$i++){
            $b = $characters[rand(0, strlen($characters)-1)];
            $SN .= $b;
        }
        if(coupon::where('code',$SN)->count()>0){
            return $this->GenerateGiftCodeSN($gift);
        } else {
            return $SN;
        }
    }
}


