<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\model\admin;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backstage.login.login');
    }

    public  function session(Request $request){
        $input = $request->all();
        //auth 是 Authentication 的縮寫
        //驗證資料庫與取得的資料是否吻合
        $auth = admin::where('account',$input['account'])->where('password',md5($input['password']))->count();
        if($auth==1){
            //將登入訊息寫入sesson
            $request->session()->put('key',admin::where('account',$input['account'])->where('password',md5($input['password']))->first());
            return redirect('/admin');
        } else {
            return redirect('/login')->withErrors(['fail'=>'username or password error']);
        }
    }

    public function logout(Request $r){
        $r->session()->forget('key');
        return redirect('login');
    }
}
