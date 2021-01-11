<?php

namespace App\Http\Controllers\tgt2;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\tgt2\coupon;
use App\model\tgt2\order;
use App\model\tgt2\pro;


use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;

class MasterController extends Controller
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }
    

    public function ReOrderData(Request $request){
        try {
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
}
