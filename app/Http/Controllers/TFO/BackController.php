<?php

namespace App\Http\Controllers\TFO;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\TFOPro;
use App\model\TFOOrder;
use App\model\TFOContact;
use App\model\TFOGift;


use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;

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

    public function Welcome(Request $request){
        return view('TFO.back.welcome');
    }



    /**
     * 產品分類.
     */
    public function Rooms(Request $request){
        if($request->isMethod('post') && $request->has('id')){
            foreach($request->id as $row){
                TFOPro::where('id',$row)->update(['open'=>1]);
            }
        }
        $pros = TFOPro::where('id','>',0);
        if($request->has('day')) $pros = $pros->where('day',$request->day);
        if($request->has('dayparts')) $pros = $pros->where('dayparts',$request->dayparts);
        if($request->has('order')){
            $order = explode('|',$request->order);
            if(count($order)>0){
                $pros = $pros->OrderBy($order[0],$order[1]);
            }
        } else { $pros = $pros->orderBy('updated_at','desc'); }
        
        $pros = $pros->paginate($this->perpage);
        return view('TFO.back.pros',compact('pros','request'));
    }
    public function RoomEdit(Request $request,$id){
        $pro = collect();
        if(is_numeric($id) && $id>0){
            if(TFOPro::where('id',$id)->count()>0){
                $pro = TFOPro::find($id);
            } else {
                abort(404);
            }
        }
        return view('TFO.back.pro',compact('pro'));
    }
    public function RoomUpdate(Request $request,$id){

        $data = [
            'dayparts'   => $request->dayparts,
            'sites'      => $request->sites,
            'money'      => $request->money,
            'wine'       => $request->wine,
            'open'       => $request->open,
            'cash_money' => $request->cash_money,
            'cash_wine'  => $request->cash_wine,
        ];
        if(is_numeric($id) && $id>0){
            $data['day']       = $request->day;
            $data['rangstart'] = $request->rangstart;
            $data['rangend']   = $request->rangend;
            TFOPro::where('id',$id)->update($data);
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
            TFOPro::insert($arr);
        }
        return redirect('/TableForOne/rooms')->with('message','編輯完成!');
    }
    public function RoomDelete(Request $request,$id){
        TFOOrder::where('tfopro_id',$id)->delete();
        TFOPro::where('id', $id)->delete();
        return Response::json(['message'=> '分類已刪除'], 200);

    }
    /*
    public function CategoryStore(Request $request,$id){
        $data = [
            'sort' => $request->Sort
        ];
        if(is_numeric($id) && $id>0){
            Cate::where('id',$id)->update($data);
        }
        return Response::json(['message'=> '排序已修改'], 200);
    }*/

    public function Orders(Request $request,$id){
        $order = TFOOrder::orderBy('updated_at','desc')->where('tfopro_id',$id);
        $order = $order->get();
        return view('TFO.back.orders',compact('order'));
    }
    public function OrderEdit(Request $request,$id){
        $order = collect();
        if(is_numeric($id) && $id>0){
            if(TFOOrder::where('id',$id)->count()>0){
                $order = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id')->select('TFOOrder.id','day','dayparts','rangend','rangstart','name','tel','email','sn','meal','item','notes','story','paytype','paystatus','manage','result')->find($id);
            } else {
                abort(404);
            }
        }
        return view('TFO.back.order',compact('order'));
    }
    public function OrderUpdate(Request $request,$id){

        $data = [
            'paystatus' => $request->paystatus,
            'manage'    => $request->manage,
            'paytype'   => $request->paytype,
        ];
        if(is_numeric($id) && $id>0){
            TFOOrder::where('id',$id)->update($data);
            $order = TFOOrder::find($id);
        } 
        if($request->has('qxx') && $request->qxx != ''){
            return redirect('/TableForOne/print?'.$request->qxx)->with('message','編輯完成!');
        } else {
            return redirect('/TableForOne/orders/'.$order->tfopro_id)->with('message','編輯完成!');
        }
    }
    public function OrderDelete(Request $request,$id){
        TFOOrder::where('id',$id)->delete();
        return Response::json(['message'=> '訂單已刪除'], 200);
    }

    
    public function Appointment(Request $request,$pro_id){
        $pro = TFOPro::find($pro_id);
        return view('TFO.back.orderAppointment',compact('pro_id','pro'));
    }
    public function AppointmentUpdate(Request $request,$pro_id){
        $data = [
            'paystatus'  => $request->paystatus,
            'paytype'    => $request->paytype,
            'name'       => $request->name,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'sn'         => $this->GenerateSN(),
            'tfopro_id'  => $pro_id,
            'tfogife_id' => 0,
            'meal'       => $request->meal,
            'money'      => $request->money,
            'notes'      => $request->notes,
            'story'      => $request->story,
            'manage'     => $request->manage,
            'result'     => '',
            'item'       => $request->item,
        ];
        $order = TFOOrder::create($data);

        if($request->paystatus == '已付款'){

            $newdata = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id')->select('day','rangstart','rangend','name','email')->find($order->id);
            $arr = [
                'day'       => $newdata->day,
                'rangstart' => $newdata->rangstart,
                'rangend'   => $newdata->rangend,
                'name'      => $newdata->name,
                'email'     => $newdata->email,
            ];
            Mail::send('TFO.email.order',$arr,function($m) use ($arr){
                $m->from('tableforone@surpriselab.com.tw', 'Table For One');
                $m->sender('tableforone@surpriselab.com.tw', 'Table For One');
                $m->replyTo('tableforone@surpriselab.com.tw', 'Table For One');

                $m->to($arr['email'], $arr['name']);
                $m->subject('Table For One 訂位成功 !');
            });
        }

        return redirect('/TableForOne/rooms?')->with('message','新增完成!');
    }

















    // 禮物卡
    public function Gifts(Request $request){
        $gifts = TFOGift::orderBy('updated_at','desc');
        if($request->has('day')) $gifts = $gifts->where('created_at',$request->day);
        if($request->has('search')){
            $search = $request->search;
            $gifts = $gifts->whereRaw("(sendtype LIKE '%{$search}%' OR 
                sn LIKE '%{$search}%' OR 
                code LIKE '%{$search}%' OR 
                btel LIKE '%{$search}%' OR 
                bname LIKE '%{$search}%' OR 
                bemail LIKE '%{$search}%' OR 
                rtel LIKE '%{$search}%' OR 
                rname LIKE '%{$search}%' OR 
                remail LIKE '%{$search}%' OR 
                address LIKE '%{$search}%' OR 
                InvitationText LIKE '%{$search}%' OR 
                manage LIKE '%{$search}%')");
        }

        $gifts = $gifts->paginate($this->perpage);

        return view('TFO.back.gifts',compact('gifts','request'));
    }
    public function GiftEdit(Request $request,$id){
        $gift = collect();
        if(is_numeric($id) && $id>0){
            if(TFOGift::where('id',$id)->count()>0){
                $gift = TFOGift::find($id);
            } else {
                abort(404);
            }
        }
        return view('TFO.back.gift',compact('gift'));
    }
    public function GiftUpdate(Request $request,$id){

        $data = [
            'paystatus'      => $request->paystatus, // 付款狀態
            'bname'          => $request->bname,
            'btel'           => $request->btel,
            'bemail'         => $request->bemail,
            'rname'          => $request->rname,
            'rtel'           => $request->rtel,
            'remail'         => $request->remail,
            'address'        => $request->address,
            'send'           => $request->send,
            'manage'         => $request->manage,
            'sendtype'       => $request->sendtype,
            'InvitationText' => $request->InvitationText,
        ];
        if(is_numeric($id) && $id>0){
            TFOGift::where('id',$id)->update($data);
        } else {
            if($this->user->giftadd == 0) return redirect('/welcome')->send()->with('message','您沒有新增禮物卡的權限!');
            $data['sn']         = $this->GenerateGiftSN();
            $data['code']       = $this->GenerateGiftCodeSN();
            $data['backresult'] = '';
            $data['result']     = '';
            $data['admin_id']   = $this->user->id;
            $data['tfoorder_id']= 0;
            $data['status']     = 0;
            $order = TFOGift::create($data);
        }
        return redirect('/TableForOne/gifts')->with('message','編輯完成!');
    }
    public function GiftDelete(Request $request,$id){
        $gift = TFOGift::find($id);
        TFOGift::where('id',$id)->delete();
        TFOOrder::where('id',$gift->id)->delete();
        return Response::json(['message'=> '禮物卡已刪除'], 200);

    }
    public function sendUpdate(Request $request,$id){
        TFOGift::where('id',$id)->update([
            'send' => $request->send
        ]);
        return Response::json(['message'=> '發送狀態已更新'], 200);
    }





    /**
     * 聯絡我們.
     */
    public function Contacts(Request $request){
        $contacts = TFOContact::orderBy('updated_at','desc');
        
        $contacts = $contacts->paginate($this->perpage);
        return view('TFO.back.contacts',compact('contacts','request'));
    }
    public function ContactEdit(Request $request,$id){
        $contact = collect();
        if(is_numeric($id) && $id>0){
            if(TFOContact::where('id',$id)->count()>0){
                $contact = TFOContact::find($id);
            } else {
                abort(404);
            }
        }
        return view('TFO.back.contact',compact('contact'));
    }
    public function ContactUpdate(Request $request,$id){

        $data = [
            'status' => $request->status,
            'manage' => $request->manage,
        ];
        if(is_numeric($id) && $id>0){
            TFOContact::where('id',$id)->update($data);
        }
        return redirect('/TableForOne/contacts')->with('message','編輯完成!');
    }
    public function ContactDelete(Request $request,$id){
        TFOContact::where('id', $id)->delete();
        return Response::json(['message'=> '留言已刪除'], 200);

    }





    public function Print(Request $request){
        $order = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id');
        $order = $order->select('rangstart','rangend','name','tel','meal','notes','manage','TFOPro.money AS PM','TFOOrder.money AS OM','wine','TFOOrder.created_at AS created_at','paystatus','email','sn','TFOOrder.id','dayparts','day','email','item','paytype');
        if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('dayparts') && $request->dayparts!='') $order->where('dayparts',$request->dayparts);
        if($request->has('paystatus') && $request->paystatus=='已預約'){
            $order->whereRaw("(paystatus='已付款' OR (paytype='現場付款' AND paystatus<>'取消訂位'))");
        } elseif($request->paystatus!=''){
            $order->where('paystatus',$request->paystatus);  
        } 
        if($request->has('paytype') && $request->paytype!='') $order->where('paytype',$request->paytype);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%'");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('TFOOrder.updated_at','desc'); }
        $order = $order->paginate($this->perpage);
        

        return view('TFO.back.print',compact('order','request'));
    }

    public function Table(Request $request){
        $order = TFOOrder::leftJoin('TFOPro', 'TFOPro.id', '=', 'TFOOrder.tfopro_id');
        $order = $order->select('rangstart','rangend','name','tel','meal','notes','manage','TFOPro.money AS PM','TFOOrder.money AS OM','wine','TFOOrder.created_at AS created_at','paystatus','email','sn','TFOOrder.id','dayparts','day','email','item','paytype');
        if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('dayparts') && $request->dayparts!='') $order->where('dayparts',$request->dayparts);
        if($request->has('paystatus') && $request->paystatus=='已預約'){
            $order->whereRaw("(paystatus='已付款' OR (paytype='現場付款' AND paystatus<>'取消訂位'))");
        } elseif($request->paystatus!=''){
            $order->where('paystatus',$request->paystatus);  
        } 
        if($request->has('paytype') && $request->paytype!='') $order->where('paytype',$request->paytype);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%'");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('TFOOrder.updated_at','desc'); }
        $order = $order->get();
        

        return view('TFO.back.table',compact('order','request'));
    }


    private function GenerateSN(){
        $random = 12;$SN = '';
        for($i=1;$i<=$random;$i++){
            $b = rand(0,9);
            $SN .= $b;
        }
        if(TFOOrder::where('sn',$SN)->count()>0){
            $this->GenerateSN();
        } else {
            return $SN;
        }
    }
    private function GenerateGiftSN(){
        $random = 10;$SN = 'G';
        for($i=1;$i<=$random;$i++){
            $b = rand(0,9);
            $SN .= $b;
        }
        if(TFOGift::where('sn','G'.$SN)->count()>0){
            $this->GenerateGiftSN();
        } else {
            return $SN;
        }
    }

    private function GenerateGiftCodeSN(){
        $random = 8;$SN = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for($i=1;$i<=$random;$i++){
            $b = $characters[rand(0, strlen($characters))];
            $SN .= $b;
        }
        if(TFOGift::where('code',$SN)->count()>0){
            $this->GenerateGiftCodeSN();
        } else {
            return $SN;
        }
    }


}


