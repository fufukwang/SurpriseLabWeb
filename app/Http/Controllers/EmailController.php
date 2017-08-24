<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\model\email;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    protected $user; //protected 是保護的變數,意思是這變數只能在這個 class使用
    public function __construct(Request $request)
    {
        //驚嘆號是否定判斷的意思
        if(!$request->session()->has('key')){
            return redirect('login')->send();
        } else {
            $this->user = $request->session()->get('key');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('backstage.email.index');
        $email = email::all(); //STEP1 news:: 的news是對應 model 的table name,這段的意思是把model news table中的內容放入$news這個變數
        return view('backstage.email.index',compact('email')); //compact 是傳送變數給view,'news'是傳過去的變數名稱,news.index 是view的檔案名稱
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $email = new email;
        $email->name = $input['name'];
        $email->email = $input['email'];
        $email->save();

        //傳送資料給mailchimp
        $data = array(
            'email_address' => $input['email']
        );
        $result = MC::checksub('5ac409d48f',$data);
        $json = json_decode($result,true);
        if($json['status']==404){
            $data = array(
                'email_address' => $input['email'],
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => $input['name']
                )
            );
            //訂閱的動作
            $rr = MC::subscribe('5ac409d48f',$data);
        }
        //dd($result); 印出結果

        return redirect('/email');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = email::find($id); //用傳來的值去資料庫搜尋
        return view('email.edit',compact('email'));//導向edit頁面，並且將變數news傳過去
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all(); //接收from傳來的資料

        $email = email::find($id);
        $email->name = $input['name']; //將$input裡面的資料中的title指定到table中的title欄位
        $email->email = $input['email'];
        $email->save();
        return redirect('/email');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = email::find($id);
        $email->delete();
        return redirect('/email');
    }
}
