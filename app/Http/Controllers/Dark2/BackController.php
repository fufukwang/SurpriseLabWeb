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





}


