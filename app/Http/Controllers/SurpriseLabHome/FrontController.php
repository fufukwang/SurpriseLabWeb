<?php

namespace App\Http\Controllers\SurpriseLabHome;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
use DB;
use App\model\wish;
use Carbon\Carbon;

class FrontController extends Controller
{
    // 專案列表
    public function projects(Request $request,$name = '')
    {
        try {
            $name = str_replace('.html','',$name);
            $projects = [
                'badassonly','clubtomorrow','dininginthedark','dininginthedark2','tableforone','tgtnextstop','thegreattipsy','whee','thegreattipsy1980s','sunsetterminal'
            ];
            if(in_array($name, $projects)){
                return view('SurpriseLabHome.project.'.$name);
            } else {
                abort(404);
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            abort(404);
        }
    }
    // 儲存留言
    public function storeWish(Request $request){
        try{
            $agent = $request->header('User-Agent');
            $ip = $request->ip ?? '';
            $wish = $request->wish ?? '';
            if($agent == '' || $ip == '' || $wish == ''){ return response()->json(['success'=>0]); }

            wish::insert([
                'type' => '未處理',
                'wish' => $wish,
                'manage' => '',
                'ip' => $ip,
                'agent' => $agent,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            return response()->json(['success'=>1]);
        } catch(\Exception $exception){
            Log::error($exception);
            return response()->json(['success'=>0]);
        }

    }
    // 近期活動數量統計
    public function getTicket(Request $request){
        try{
            // 微醺2數據
            // SELECT count(distinct(day)) FROM `tgt2pro` where open=1 and day<now();
            // SELECT sum(pople) FROM `tgt2order` where pay_status="已付款";
            // SELECT count(id) FROM `tgt2pro` where open=1 and day<now();
            // 無光3數據



            $data = [
                'drink2' => [
                    'day' => DB::table('tgt2pro')->where('open',1)->where('day','<',date('Y-m-d'))->distinct()->count('day') ?? 0,
                    'people' => DB::table('tgt2order')->where('pay_status',"已付款")->sum('pople') ?? 0,
                    'time' => DB::table('tgt2pro')->where('open',1)->where('day','<',date('Y-m-d'))->count('id') ?? 0,
                ],
                'dark3' => [
                    'day' => 0,
                    'people' => 0
                ]
            ];

            return view('SurpriseLabHome.ticket',$data);
        } catch(\Exception $exception){
            Log::error($exception);
            abort(404);
        }

    }
}
