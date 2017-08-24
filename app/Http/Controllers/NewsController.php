<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\model\news; //STEP1 在Controller 要補上這段連結model這隻檔案
use App\Http\Controllers\Controller;

class NewsController extends Controller
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
        //return ('hot dog');
        $news = news::all(); //STEP1 news:: 的news是對應 model 的table name,這段的意思是把model news table中的內容放入$news這個變數

        return view('news.index',compact('news')); //compact 是傳送變數給view,'news'是傳過去的變數名稱,news.index 是view的檔案名稱
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('news.create');
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

        $news = new news;
        $news->title = $input['title'];
        $news->save();
        return redirect('/news');
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
    public function edit($id) //$id接收了 from 傳來的值
    {
        $news = news::find($id); //用傳來的值去資料庫搜尋
        return view('news.edit',compact('news'));//導向edit頁面，並且將變數news傳過去
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

        $news = news::find($id);
        $news->title = $input['title']; //將$input裡面的資料中的title指定到table中的title欄位
        $news->save();
        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = news::find($id);
        $news->delete();
        return redirect('/news');
        //
    }
}
