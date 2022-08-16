<!DOCTYPE html>
<head>
	<title>@if(isset($request->dayrange)){{ $request->dayrange }} @endif 『{{ $request->dayparts or '' }}』外場表單</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			margin: 0;
			font-family: sans-serif;
			padding: 15px;
			font-size: 10px;
		}

		table{
			width: 100%;
			 border-collapse: collapse;
		}

		td{
			border: solid 1px #444444;
			padding: 0.5em;
			text-align: center;
			max-width: 80px;
		}

		td:nth-child(odd){
			background: #eeeeee;
		}

		@media print {
 td:nth-child(odd){
    background-color: #eeeeee !important;
    -webkit-print-color-adjust: exact; 
}}

	</style>
</head>
<body>
	<h1>
		<span class="date">@if(isset($request->dayrange)){{ $request->dayrange }} @endif</span> 『{{ $request->dayparts or '' }}』外場表單
	</h1>
	<table>
		<tr>
			<td>確認</td>
			<td>桌號</td>
			<td>時間</td>
			<td>姓名(主揪)</td>
			<td>付款</td>
			<td>電話</td>
			<td>人數<!-- 主餐 --></td>
			<td>素食</td>
			<td>備註</td>
			<td>優惠券</td>
			<td>註記</td>
		</tr>
@forelse ($order as $row)
	<?php
	$coupon = '';
	if($row->pay_type == '信用卡'){
      if($row->is_overseas>0){
          $pay_type = '藍新金流';
          $coupon = '刷卡付費';
      } else {
          $pay_type = '貝殼集器';
      }
  	} elseif($row->pay_type == '後台編輯'){
      $pay_type = $row->edit_type;
  	}
   $pay_status = $row->pay_status;
   if($pay_type == '公關位' && $row->pay_status == '已付款'){
      $pay_status = '公關位';
   }
   $pay_money = '';
   $coupons = App\model\terminal\coupon::where('o_id',$row->sn)->get();
                    
   if($coupons && count($coupons)>0){
      foreach($coupons as $c){
         if($coupon!=''){
            $coupon .= "<br >";
            $pay_money.= "<br />";
         }
         $coupon .= "{$c->code}";
         $pay_money .= App\model\terminal\backme::select('money')->find($c->b_id)->money;
      }
   } else {
      $pay_money = $row->OM;
   }
                    
   if($pay_status !== '已付款') $pay_money = 0;
   ?>
		<tr>
			<td rowspan="2"></td>
			<td rowspan="2"></td>
			<td>
				@if($row->plan == 'train') 微醺列車 The Great Tipsy : The Next Stop @endif
                    @if($row->plan == 'flight') FLIGHT 無光飛航 @endif
                    @if($row->plan == 'boat') Boat for ONE 單人船票 @endif
                    @if($row->plan == 'A') 套票A：Train+Flight @endif
                    @if($row->plan == 'B') 套票B：Train+Flight+Boat @endif
                    <br />
                    @foreach(DB::table('terminal_pro_order')->leftJoin('terminalpro', 'terminalpro.id', '=', 'terminal_pro_order.pro_id')->where('order_id',$row->id)->get() as $r)
                        {{ $r->day }} {{ $r->day_parts }} <br />
{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($r->rang_start,0,5))))) }} ~ 
{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($r->rang_end,0,5))))) }} ({{ $r->ticket_type}})<br >                     
                    @endforeach



</td>
			<td>{{ $row->name }}</td>
			<td>{{ $pay_type}} {!! $pay_money !!} （ @if($row->pay_status=='已付款') Y @else N @endif ）</td>
			<td>{{ $row->tel }}</td>
			<td>{{ $row->pople }} 人 </td>
			<td>{{ $row->vegetarian }} 人</td>
			<td rowspan="2">{!! nl2br($row->notes) !!}</td>
			<td rowspan="2">{!! $coupon !!}</td>
			<td rowspan="2">{!! nl2br($row->manage) !!}</td>
		</tr>
		<tr>
			<td>團員</td>
			<td colspan="5">
				<table>
					@forelse(App\model\terminal\TeamMail::where('order_id',$row->id)->get() as $tm)
					<tr>
						<td>{{ $tm->name }}</td>
						<td>{{ $tm->tel }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="2">尚無團員</td>
					</tr>
					@endforelse
				</table>
			</td>
		</tr>
@empty
<tr><td colspan="9" align="center">此搜尋條件尚無資料</td></tr>
@endforelse

	</table>
</body>
</html>