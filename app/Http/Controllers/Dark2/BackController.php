<?php

namespace App\Http\Controllers\Dark2;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\DarkContact;
use App\model\d2coupon;
use App\model\d2order;
use App\model\d2pro;
use App\model\d2xls;


use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
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
        DB::enableQueryLog();
    }


    /**
     * 聯絡我們.
     */
    public function Contacts(Request $request){
        $contacts = DarkContact::orderBy('updated_at','desc');
        
        $contacts = $contacts->paginate($this->perpage);
        return view('Dark2.backend.contacts',compact('contacts','request'));
    }
    public function ContactEdit(Request $request,$id){
        $contact = collect();
        if(is_numeric($id) && $id>0){
            if(DarkContact::where('id',$id)->count()>0){
                $contact = DarkContact::find($id);
            } else {
                abort(404);
            }
        }
        return view('Dark2.backend.contact',compact('contact'));
    }
    public function ContactUpdate(Request $request,$id){

        $data = [
            'status' => $request->status,
            'manage' => $request->manage,
        ];
        if(is_numeric($id) && $id>0){
            DarkContact::where('id',$id)->update($data);
        }
        return redirect('/dark2/contacts')->with('message','編輯完成!');
    }
    public function ContactDelete(Request $request,$id){
        DarkContact::where('id', $id)->delete();
        return Response::json(['message'=> '留言已刪除'], 200);

    }
    /**
     * XLS data.
     */
    public function BackMes(Request $request){
        /*
        if($request->isMethod('post') && $request->has('id')){
            foreach($request->id as $row){
                TFOPro::where('id',$row)->update(['open'=>1]);
            }
        }*/
        $mes = d2xls::where('id','>',0);

        
        $mes = $mes->paginate($this->perpage);
        return view('Dark2.backend.BackMes',compact('mes','request'));
    }


    /**
     * XLS data.
     */



    /**
     * 產品分類.
     */
    public function Pros(Request $request){
        if($request->isMethod('post') && $request->has('id')){
            foreach($request->id as $row){
                d2pro::where('id',$row)->update(['open'=>1]);
            }
        }
        $pros = d2pro::where('id','>',0);
        if($request->has('day')) $pros = $pros->where('day',$request->day);
        if($request->has('dayparts')) $pros = $pros->where('dayparts',$request->dayparts);
        if($request->has('order')){
            $order = explode('|',$request->order);
            if(count($order)>0){
                $pros = $pros->OrderBy($order[0],$order[1]);
            }
        } else { $pros = $pros->orderBy('updated_at','desc'); }
        
        $pros = $pros->paginate($this->perpage);
        return view('Dark2.backend.pros',compact('pros','request'));
    }
    public function ProEdit(Request $request,$id){
        $pro = collect();
        if(is_numeric($id) && $id>0){
            if(d2pro::where('id',$id)->count()>0){
                $pro = d2pro::find($id);
            } else {
                abort(404);
            }
        }
        return view('Dark2.backend.pro',compact('pro'));
    }
    public function ProUpdate(Request $request,$id){

        $data = [
            'dayparts'   => $request->dayparts,
            'sites'      => $request->sites,
            'money'      => $request->money,
            'open'       => $request->open,
            'cash'       => $request->cash,
        ];
        if(is_numeric($id) && $id>0){
            $data['day']       = $request->day;
            $data['rangstart'] = $request->rangstart;
            $data['rangend']   = $request->rangend;
            d2pro::where('id',$id)->update($data);
        } else {
            // 日期範圍新增多筆
            $arr = [];
            for($i=0 ; $i<count($request->rangstart) ; $i++){
                $data['rangstart'] = $request->rangstart[$i];
                $data['rangend']   = $request->rangend[$i];
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
            d2pro::insert($arr);
        }
        return redirect('/dark2/pros')->with('message','編輯完成!');
    }
    public function ProDelete(Request $request,$id){
        d2order::where('pro_id',$id)->delete();
        d2pro::where('id', $id)->delete();
        return Response::json(['message'=> '營業日已刪除'], 200);

    }












    /**
     * orders.
     */











    public function Xls2Db(Request $request){
        $filePath = 'storage/app/dark2_report.xlsx';
        Excel::load($filePath, function($reader) {
            $data = [];
            $xlsx = $reader->toArray();
            foreach($xlsx as $row){
                $r = [
                    'sn'         => $row['sn'],
                    'detail'     => $row['detail'],
                    'num'        => $row['num'],
                    'money'      => $row['money'],
                    'name'       => $row['name'],
                    'email'      => $row['email'],
                    'tel'        => $row['tel'],
                    'sponsor_id' => $row['sponsor_id'],
                    'ot1'        => $row['ot1'],
                    'ot1text'    => json_encode([$row['ot1'],$row['ot1_1'],$row['ot1_2'],$row['ot1_3']]),
                    'ot2'        => $row['ot2'],
                    'ot2text'    => json_encode([$row['ot2'],$row['ot2_1'],$row['ot2_2'],$row['ot2_3']]),
                    'ot3'        => $row['ot3'],
                    'ot3text'    => json_encode([$row['ot3'],$row['ot3_1'],$row['ot3_2'],$row['ot3_3']]),
                    'ot4'        => $row['ot4'],
                    'ot4text'    => json_encode([$row['ot4'],$row['ot4_1'],$row['ot4_2'],$row['ot4_3']]),
                    'ot5'        => $row['ot5'],
                    'ot5text'    => json_encode([$row['ot5'],$row['ot5_1'],$row['ot5_2'],$row['ot5_3']]),
                    'result'     => json_encode($row),
                ];
                array_push($data, $r);
            }
            //dd($data);
            d2xls::insert($data);
        });
    }

    public function Db2Coupon(Request $request){
        
    }
    private function GenerateGiftCodeSN(){
        $random = 8;$SN = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for($i=1;$i<=$random;$i++){
            $b = $characters[rand(0, strlen($characters)-1)];
            $SN .= $b;
        }
        if(TFOGift::where('code',$SN)->count()>0){
            $this->GenerateGiftCodeSN();
        } else {
            return $SN;
        }
    }
}


