<?php

namespace App\Http\Controllers\paris;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\paris\coupon;
use App\model\paris\order;
use App\model\paris\pro;
use App\model\paris\backme;
use App\model\paris\inv;
use App\model\setting;

use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
use Log;
use SLS;
use Excel;

class BackController extends WebController
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
        if($this->user->paris == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
        DB::enableQueryLog();
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
        $pros = pro::select(DB::raw("({$this->oquery}) AS now,(sites-{$this->oquery}) AS space,sites,id,rang_start,rang_end,day,id,rang_start,rang_end,day_parts,money,cash,open,p1,p2,p4"));
        if($request->has('day') && $request->has('day_end')){
            $open_count = pro::select(DB::raw("SUM(({$this->oquery})) AS sale,count(id) as num,SUM(sites) as site"))->where('open',1); 
            $all_count = pro::select(DB::raw("SUM(({$this->oquery})) AS sale,count(id) as num,SUM(sites) as site"));
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
        return view('paris.backend.pros',compact('pros','request','count','open'));
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
        return view('paris.backend.pro',compact('pro'));
    }
    public function ProUpdate(Request $request,$id){

        $data = [
            //'day_parts'   => $request->dayparts,
            'sites'      => $request->sites,
            // 'money'      => $request->money,
            'open'       => $request->open,
            // 'cash'       => $request->cash,
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
            $data['p1'] = $request->p1;
            $data['p2'] = $request->p2;
            $data['p4'] = $request->p4;
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
        return redirect('/paris/pros')->with('message','編輯完成!');
    }
    public function ProDelete(Request $request,$id){
        order::where('pro_id',$id)->delete();
        pro::where('id', $id)->delete();
        return Response::json(['message'=> '營業日已刪除'], 200);

    }

    public function ProOutputSite(Request $request){
        $pro = pro::select(DB::raw("({$this->oquery}) AS now,sites,id,rang_start,rang_end,day"));
        if($request->has('type')){
            if($request->type == 'not'){
                $pro = $pro->where('open',1)->whereRaw("(sites-{$this->oquery})>0");
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
                    'name' => '作品',
                    'id'   => '編號',
                    'day'  => '日期',
                    'mon'  => '星期',
                    'part' => '時段',
                    'open' => '開放空位',
                    'now'  => '目前訂位',
                    'only' => '剩餘座位',
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
                        'name' => '巴黎舞會',
                        'id'   => $row['id'],
                        'day'  => $day->format('m/d'),
                        'mon'  => $mon,
                        'part' => substr($row['rang_start'],0,5).'~'.substr($row['rang_end'],0,5),
                        'open' => $row['sites'],
                        'now'  => $row['now'],
                        'only' => $row['sites'] - $row['now'],
                    ];
                    array_push($data,$tmp);
                }
                $sheet->rows($data);
            });
        })->export('xls');
        return redirect('/paris/pros');
    }


    /**
     * coupon
     */
    public function Coupons(Request $request){
        if($request->isMethod('post') && $request->has('ticket') && $request->has('num')){
            $ticket = $request->ticket;
            $day = $request->day;
            $num = $request->num;
            if($day!='' && date('Y-m-d', strtotime($day)) != $day){
                return redirect('/paris/coupons')->with('message','日期錯誤!新增失敗!');
            }
            if($day == ''){
                $day = null;
            } else {
                $day = $day.' 23:59:59';
            }
            for($i=0;$i<$num;$i++){
                $data = [
                    'b_id' => 0,
                    'code' => $this->GenerateGiftCodeSN(),
                    'type' => $ticket,
                    'end_at' => $day
                ];
                coupon::insert($data);
            }
            return redirect('/paris/coupons')->with('message','新增'.$num.'筆完成!');
        }
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
            $coupons = $coupons->whereIn('type',['p1','p2','p4','gift']);
        }

        $coupons = $coupons->paginate($this->perpage);
        return view('paris.backend.coupons',compact('coupons','request'));
    }
    public function CouponDelete(Request $request,$id){
        coupon::where('id', $id)->delete();
        return Response::json(['message'=> '已刪除'], 200);

    }

    private function GenerateGiftCodeSN($gift=false){
        $random = 8;$SN = '';$inNum = 1;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($gift){
            $inNum = 5; $SN = 'GIFT';
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


