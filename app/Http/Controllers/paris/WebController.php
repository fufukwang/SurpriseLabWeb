<?php

namespace App\Http\Controllers\paris;

use App\Http\Controllers\Controller;
use Mail;
use SLS;

class WebController extends Controller
{
    // +8hr - 900 sec = 27900
    protected $oquery = "IFNULL((SELECT SUM(pople)-SUM(cut) FROM(paris_order) WHERE paris_order.pro_id=paris_pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()+interval 27900 second and SYSDATE()+interval 28800 second))),0)";





}