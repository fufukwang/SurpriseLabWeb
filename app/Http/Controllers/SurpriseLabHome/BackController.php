<?php

namespace App\Http\Controllers\SurpriseLabHome;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
use DB;
use App\model\wish;

class BackController extends Controller
{
    // wish 列表
    public function wishs(Request $request)
    {
        try {
            $wishs = wish::orderBy('updated_at','desc');
            if($request->has('type')) $wishs = $wishs->where('type',$request->type);
            if($request->has('search') && $request->search!=''){
                $search = $request->search;
                $wishs = $wishs->whereRaw("wish LIKE '%{$search}%'");
            }
            $wishs = $wishs->paginate(20);
            // dd($data);
            return view('SurpriseLabHome.backend.wishs',compact("wishs"));
        } catch (\Exception $exception) {
            Log::error($exception);
            abort(404);
        }
    }
    // wish 儲存
    public function storeWish(Request $request,$id){
        try{

            wish::where('id',$id)->update([
                'type' => $request->type ?? '未處理',
                'manage' => $request->manage ?? '',
            ]);
            return redirect('/surprise/wishs')->send()->with('message','已完成!');
        } catch(\Exception $exception){
            Log::error($exception);
            return redirect('/surprise/wishs')->send()->with('message','失敗!');
        }

    }
    // wish 編輯
    public function wish(Request $request,$id){
        try{
            $wish = wish::find($id);

            return view('SurpriseLabHome.backend.wish',compact("wish"));
        } catch(\Exception $exception){
            Log::error($exception);
            abort(404);
        }

    }
}
