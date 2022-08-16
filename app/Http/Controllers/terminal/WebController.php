<?php

namespace App\Http\Controllers\terminal;

use App\Http\Controllers\Controller;

class WebController extends Controller
{

    protected $oquery = "IFNULL((SELECT SUM(pople) FROM(terminalorder) LEFT JOIN terminal_pro_order ON terminalorder.id=terminal_pro_order.order_id WHERE terminalpro.id=terminal_pro_order.pro_id AND (pay_status IN ('已付款','已付款(部分退款)') OR (pay_status='未完成' AND terminalorder.created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)";

}