<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\model\email;
use App\Http\Controllers\Controller;
use App\model\act;
use App\model\orderlist;
use App\model\pople;
use DB;
use Response;
use App\model\contact;
use Carbon\Carbon;
use Mail;
use Redirect;

class FrontendController extends Controller
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }
    
	public function home(){
		return view('frontend.home');
	}

	public function about(){
		return view('frontend.about');
	}

	public function chef(){
		return view('frontend.chef');
	}

	public function rules(){
		return view('frontend.rules');
	}

	public function reservation(){
		return view('frontend.reservation');
	}

	public function contact(){
		return view('frontend.contact');
	}

    public function contactstore(Request $request){
        $contact = new contact;
        $contact->Name    = $request->Name;
        $contact->Tel     = $request->Tel;
        $contact->EMail   = $request->EMail;
        $contact->Subject = $request->Subject;
        $contact->Content = $request->Content;
        $contact->Status  = 0;
        $contact->save();
        $obj = [
            'Name'    => $request->Name,
            'Tel'     => $request->Tel,
            'EMail'   => $request->EMail,
            'Subject' => $request->Subject,
            'Content' => $request->Content,
        ];
        Mail::send('frontend.contacemail',$obj,function($m) use ($obj){
            $m->from('service@surpriselab.com.tw', '無光晚餐');
            $m->sender('service@surpriselab.com.tw', '無光晚餐');
            $m->replyTo('service@surpriselab.com.tw', '無光晚餐');

            $m->to('service@surpriselab.com.tw', '無光晚餐');
            $m->subject('無光晚餐，聯絡我們-通知');
        });
        return Redirect::to("/dininginthedark/")->with('message','留言完成!');
    }

    public function ReOrderData(Request $request){
        $now = Carbon::now()->toDateString();
        $count = orderlist::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('SN');
        if($count>0){
            $count += 1;
        } else {
            $count = Carbon::now()->format('Ymd').'001';
        }

        $act = act::where('AID',$request->AID)->select(DB::raw("(Pop-IFNULL((SELECT SUM(Pople) FROM(OrderLists) WHERE OrderLists.AID=Acts.AID AND (Status='SUCCESS' OR (Status='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count,Card,ADay,STime,ETime"))->first();
        if($request->Pople>$act->Count){
            return Response::json(array(
                'success' => false,
                'message' => 'full'
            ), 200);
        }

        //$count = str_pad($count,3,"0",STR_PAD_LEFT);
        $order = new orderlist;
        $order->Name   = $request->Name;
        $order->Tel    = $request->Tel;
        $order->EMail  = $request->EMail;
        $order->SN     = $count;
        $order->Notes  = $request->Notes;
        $order->Surprised  = $request->Surprised;
        $order->Pay    = $request->Pay;
        $order->AID    = $request->AID;
        $order->Pople  = $request->Pople;
        if($order->Pay=='onsite') $order->Status = 'SUCCESS';
        $order->save();
        $OID = $order->OID;
        for($i=0;$i<$request->Pople;$i++){
            $pople = new pople;
            $pople->OID  = $OID;
            $pople->Meal = $request->input('Meal.'.$i);
            $pople->Sort = $i;
            $pople->save();
        }
        $time = time();
        $act = act::find($request->AID);
        $Money = $act->Card*$order->Pople;
        $Amt  = ($Money*.1) + $Money;
        $CheckValue = strtoupper(hash("sha256", "HashKey=ybmYe0KpakHaNnkJGYUOLe7pLFfoPO9o&Amt={$Amt}&MerchantID=35699182&MerchantOrderNo={$count}&TimeStamp={$time}&Version=1.2&HashIV=Zvnev7DFskQfIbYo"));


        // 加入電子報
        $data = array(
            'email_address' => $request->EMail
        );
        $result = MC::checksub('0656269a9c',$data);
        $json = json_decode($result,true);
        if($json['status']==404){
            $data = array(
                'email_address' => $request->EMail,
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => $request->Name
                )
            );
            //訂閱的動作
            $rr = MC::subscribe('0656269a9c',$data);
        }
        if($order->Status=='SUCCESS'){
            $this->SendSuccessByGmail([
                'tomail' => $request->EMail,
                'name'   => $request->Name,
                'time'   => str_replace(' 00:00:00','',$act->ADay).' '.substr($act->STime,0,5).'~'.substr($act->ETime,0,5),
                'pop'    => $request->Pople
            ]);
        }

        return Response::json(array(
            'success'   => true,
            'TimeStamp' => $time,
            'SN'        => $count,
            'Amt'       => $Amt,
            'CheckValue'=> $CheckValue,
        ), 200);
    }

    public function getPayDone(Request $request){
        $obj = json_decode($request->JSONData,true);

        $result = json_decode($obj['Result'],true);
        $order = orderlist::where('SN',$result['MerchantOrderNo'])->first();
        $order->Status  = $obj['Status'];
        $order->Message = $obj['Message'];
        $order->Result  = $obj['Result'];
        $order->save();
        $success = false;
        if($obj['Status']=='SUCCESS'){
            $act = act::find($order->AID);
            $this->SendSuccessByGmail([
                'tomail' => $order->EMail,
                'name'   => $order->Name,
                'time'   => str_replace(' 00:00:00','',$act->ADay).' '.substr($act->STime,0,5).'~'.substr($act->ETime,0,5),
                'pop'    => $order->Pople
            ]);
            $success = true;  
            return view('frontend.reservation',compact('success'));
        } else {
            return view('frontend.payfail');
        }
    }

    private function SendSuccessByGmail($obj){
        Mail::send('frontend.email',$obj,function($m) use ($obj){
            $m->from('service@surpriselab.com.tw', '無光晚餐');
            $m->sender('service@surpriselab.com.tw', '無光晚餐');
            $m->replyTo('service@surpriselab.com.tw', '無光晚餐');

            $m->to($obj['tomail'], $obj['name']);
            $m->subject('無光晚餐訂位成功 !');
        });
    }

    public function GetAjaxData(Request $request){
    	if($request->ajax()){
    		if($request->has('act')){
    			switch ($request->act) {
    				case 'GetActByPople':
    					$act = act::whereRaw("(Pop-IFNULL((SELECT SUM(Pople) FROM(OrderLists) WHERE OrderLists.AID=Acts.AID AND (Status='SUCCESS' OR (Status='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$request->Pople)
    						->select('ADay','Sp','One')->groupBy('ADay')->where('ADay','>=',Carbon::today());
                        if($request->Pople==1){
                            $act = $act->where('One',1);
                        }
                        $act = $act->get();
                        //dd(DB::getQueryLog());
    					return $act->toJson();
    				break;
    				case 'GetActByDate':
    					$act = act::where('ADay',$request->Day)->select(DB::raw("(Pop-IFNULL((SELECT SUM(Pople) FROM(OrderLists) WHERE OrderLists.AID=Acts.AID AND (Status='SUCCESS' OR (Status='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Pople, ADay,AID,STime,ETime,One,Sp,Card,Money"))->get();
    					return $act->toJson();
    				break;
    			}
    		}
    	} else {
    		abort(404);
    	}
    }
}
