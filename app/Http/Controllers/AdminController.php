<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\model\admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $user; //protected 是保護的變數,意思是這變數只能在這個 class使用
    public function __construct(Request $request)
    {
        //驚嘆號是否定判斷的意思
        if(!$request->session()->has('key')){
            return redirect('login')->send()->withErrors(['fail'=>'please login']);
        } else {
            $this->user = $request->session()->get('key');
        }
        if($this->user->admin == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
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
        $admin = admin::all(); //STEP1 news:: 的news是對應 model 的table name,這段的意思是把model news table中的內容放入$news這個變數
        return view('backstage.admin.index',compact('admin')); //compact 是傳送變數給view,'news'是傳過去的變數名稱,news.index 是view的檔案名稱
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backstage.admin.create');
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
        $admin = new admin;
        $admin->account  = $input['account'];
        $admin->admin = $request->has('admin') ? $input['admin'] : 0;
        $admin->giftadd = $request->has('giftadd') ? $input['giftadd'] : 0;
        $admin->thegreattipsy = $request->has('thegreattipsy') ? $input['thegreattipsy'] : 0;
        $admin->oldview = $request->has('oldview') ? $input['oldview'] : 0;
        $admin->clubtomorrow = $request->has('clubtomorrow') ? $input['clubtomorrow'] : 0;
        $admin->tgt2 = $request->has('tgt2') ? $input['tgt2'] : 0;
        $admin->dark3 = $request->has('dark3') ? $input['dark3'] : 0;
        $admin->password = md5($input['password']);
        $admin->save();

        return redirect('/admin');
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
        $admin = admin::find($id); //用傳來的值去資料庫搜尋
        return view('backstage.admin.edit',compact('admin'));
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

        $admin = admin::find($id);
        $admin->account  = $input['account'];
        $admin->admin = $request->has('admin') ? $input['admin'] : 0;
        $admin->giftadd = $request->has('giftadd') ? $input['giftadd'] : 0;
        $admin->thegreattipsy = $request->has('thegreattipsy') ? $input['thegreattipsy'] : 0;
        $admin->oldview = $request->has('oldview') ? $input['oldview'] : 0;
        $admin->clubtomorrow = $request->has('clubtomorrow') ? $input['clubtomorrow'] : 0;
        $admin->tgt2 = $request->has('tgt2') ? $input['tgt2'] : 0;
        $admin->dark3 = $request->has('dark3') ? $input['dark3'] : 0;
        $admin->password = md5($input['password']); //將$input裡面的資料中的title指定到table中的title欄位
        $admin->save();
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = admin::find($id);
        $admin->delete();
        return redirect('/admin');
    }
}
