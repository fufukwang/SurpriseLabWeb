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
.food_list td { border: none;}
.food_list td:nth-child(1),.food_list td:nth-child(2),.food_list td:nth-child(3),.food_list td:nth-child(4){ border-right: solid 1px #444444;}
.food_list tr:nth-child(1) td{ border-bottom: solid 1px #444444; }
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
			<td>英文</td>
			<td>備註</td>
			<td>優惠券 / 統編</td>
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
  	} else {
      $pay_type = $row->edit_type;
  	}
   $pay_status = $row->pay_status;
   if($pay_type == '公關位' && ($row->pay_status == '已付款' || $row->pay_status == '已付款(部分退款)')){
      $pay_status = '公關位';
   }
   $pay_money = '-';
   $modify_money = '';
   $coupons = App\model\paris\coupon::where('o_id',$row->sn)->get();
	if(count($coupons)>0){
      foreach($coupons as $c){
         if($coupon!=''){
            $coupon .= "<br >";
         }
         $coupon .= "{$c->code}";
      }
      if($row->OM>0){
         $modify_money = "修改金額:{$row->OM}";
      }
   } else {
      $pay_money = $row->OM;
   }
                    
   if($pay_status !== '已付款' && $pay_status !== '已付款(部分退款)') $pay_money = 0;
   if($row->pople == ($row->vegetarian + $row->meat_eat)){
   	$no_beef = $row->no_beef; $no_pork = $row->no_pork; $no_nut_m = $row->no_nut_m; $no_shell = $row->no_shell; $no_nut_v = $row->no_nut_v; $no_fish = $row->no_fish;
   } else {
   	$no_beef = ""; $no_pork = ""; $no_nut_m = ""; $no_shell = ""; $no_nut_v = ""; $no_fish = "";
   }
   ?>
		<tr>
			<td rowspan="2"></td>
			<td rowspan="2"></td>
			<td>{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($row->rang_start,0,5))))) }} ~ {{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($row->rang_end,0,5))))) }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $pay_type}} {{ $pay_money }} （ @if(($row->pay_status=='已付款' || $row->pay_status=='已付款(部分退款)')) Y @else N @endif ）{{ $modify_money }}</td>
			<td>{{ $row->tel }}</td>
			<td>{{ $row->pople }} 人 </td>
			<td>{{ $row->need_english }} 人</td>
			<td rowspan="2">{!! nl2br($row->notes) !!}</td>
			<td rowspan="2">
				{!! $coupon !!}
				@if($row->tax_id != '')
				<br >{{ $row->tax_id }}(統編)
				<br >{{ $row->tax_name }}
				@endif
			</td>
			<td rowspan="2">{!! nl2br($row->manage) !!}</td>
		</tr>
		<tr>
			<td>飲食禁忌</td>
			<td colspan="6" style="padding: 0px;">
				{{--
				<table class="food_list">
					<tr><td>葷食/不吃牛肉</td><td>葷食/不吃豬肉</td><td>葷食/不吃堅果</td><td>葷食/甲殼類過敏</td><td>葷食/所有海鮮過敏/不吃</td><td>素食/不吃堅果</td></tr>
					<tr><td>{{ $no_beef }} 人</td><td>{{ $no_pork }} 人</td><td>{{ $no_nut_m }} 人</td><td>{{ $no_shell }} 人</td><td>{{ $no_fish }} 人</td><td>{{ $no_nut_v }} 人</td></tr>
				</table>
				--}}

				{{--
				<table>
					@forelse(App\model\paris\TeamMail::where('order_id',$row->id)->get() as $tm)
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
				--}}
			</td>
		</tr>
@empty
<tr><td colspan="9" align="center">此搜尋條件尚無資料</td></tr>
@endforelse

	</table>
</body>
</html>