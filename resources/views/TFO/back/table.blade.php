<!DOCTYPE html>
<head>
	<title>@if(isset($request->day)){{ str_replace('-','/',substr($request->day,5)) }} @endif 『{{ $request->dayparts or '' }}』外場表單</title>
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
		<span class="date">@if(isset($request->day)){{ str_replace('-','/',substr($request->day,5)) }} @endif</span> 『{{ $request->dayparts or '' }}』外場表單
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
			<td>禮物卡</td>
			<td>註記</td>
		</tr>
@forelse ($order as $row)
		<tr>
			<td></td>
			<td></td>
			<td>{{ substr($row->rangstart,0,5) }}-{{ substr($row->rangend,0,5) }}</td>
			<td>{{ $row->name }}</td>
			<td>@if($row->paytype=='現場付款') 現場 @else 其他 @endif （ @if($row->paystatus=='已付款') Y @else N @endif ）</td>
			<td>{{ $row->tel }}</td>
			<td>@if($row->meal=='V') 素@else 葷@endif </td>
			<td>{!! nl2br($row->notes) !!}</td>
			<td></td>
			<td>{!! nl2br($row->manage) !!}</td>
		</tr>
@empty
<tr><td colspan="9" align="center">此搜尋條件尚無資料</td></tr>
@endforelse

	</table>
</body>
</html>