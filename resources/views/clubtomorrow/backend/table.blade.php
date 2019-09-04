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
			<td>姓名</td>
			<td>付款</td>
			<td>電話</td>
			<td>主餐</td>
			<td>備註</td>
			<td>優惠券</td>
			<td>註記</td>
		</tr>
@forelse ($order as $row)
		<tr>
			<td></td>
			<td></td>
			<td>{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($row->rang_start,0,5))))) }} ~ 
{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($row->rang_end,0,5))))) }}</td>
			<td>{{ $row->name }}</td>
			<td>@if($row->pay_type=='現場付款') 現場 @elseif($row->pay_type=='信用卡') 信用卡 @elseif($row->pay_type='後臺編輯') 後台 @endif {{ $row->OM }} （ @if($row->pay_status=='已付款') Y @else N @endif ）</td>
			<td>{{ $row->tel }}</td>
			<td>{{ $row->pople }} 人 {{ implode('/',json_decode($row->meat,true)) }} </td>
			<td>{!! nl2br($row->notes) !!}</td>
			<td>@forelse(App\model\club\coupon::where('o_id',$row->sn)->get() as $coup){{ $coup->code }} [{{App\model\club\backme::select('money')->find($coup->b_id)->money}}]<br >@empty 無使用優惠券 @endforelse</td>
			<td>{!! nl2br($row->manage) !!}</td>
		</tr>
@empty
<tr><td colspan="9" align="center">此搜尋條件尚無資料</td></tr>
@endforelse

	</table>
</body>
</html>