@include('backstage.header',['title' => '落日轉運站訂單列表'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">落日轉運站訂單列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/terminal/print" id="SearchForm">
                                            <div class="row">
                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
<input name="dayrange" type="text" class="form-control" placeholder="yyyy-mm-dd">
<input type="hidden" name="daystart" value="{{ $request->daystart or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}">
<input type="hidden" name="dayend" value="{{ $request->dayend or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}">
                                                </div>
                                                <div class="col-sm-12">不搜尋日期
<label><input type="radio" name="srday" value="1"@if($request->srday==1) checked @endif>是</label>
<label><input type="radio" name="srday" value="0"@if($request->srday!=1) checked @endif>否</label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-sm-1">
                                                <select name="pay_status" class="form-control">
                                                    <option value="">狀態</option>
                                                    <option value="已預約"@if(isset($request->pay_status) && $request->pay_status=='已預約') selected @endif>已預約</option>
                                                    <option value="已付款"@if(isset($request->pay_status) && $request->pay_status=='已付款') selected @endif>已付款</option>
                                                    <option value="已付款(部分退款)"@if(isset($request->pay_status) && $request->pay_status=='已付款(部分退款)') selected @endif>已付款(部分退款)</option>
                                                    <option value="未完成"@if(isset($request->pay_status) && $request->pay_status=='未完成') selected @endif>未完成</option>
                                                    <option value="取消訂位"@if(isset($request->pay_status) && $request->pay_status=='取消訂位') selected @endif>取消訂位</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="dayparts" class="form-control">
                                                    <option value="">時段</option>
                                                    <option value="午場"@if(isset($request->dayparts) && $request->dayparts=='午場') selected @endif>午場</option>
                                                    <!--option value="下午茶"@if(isset($request->dayparts) && $request->dayparts=='下午茶') selected @endif>下午茶</option-->
                                                    <option value="晚場"@if(isset($request->dayparts) && $request->dayparts=='晚場') selected @endif>晚場</option>
                                                    <!--option value="特別活動"@if(isset($request->dayparts) && $request->dayparts=='特別活動') selected @endif>特別活動</option-->
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="ticket_type" class="form-control">
                                                    <option value="">票種</option>
                                                    <option value="train"@if(isset($request->ticket_type) && $request->ticket_type=='train') selected @endif>微醺列車 The Great Tipsy : The Next Stop</option>
                                                    <option value="flight"@if(isset($request->ticket_type) && $request->ticket_type=='flight') selected @endif>FLIGHT 無光飛航</option>
                                                    <option value="boat"@if(isset($request->ticket_type) && $request->ticket_type=='boat') selected @endif>Boat for ONE 單人船票</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="plan" class="form-control">
                                                    <option value="">訂單票種</option>
                                                    <option value="train"@if(isset($request->plan) && $request->plan=='train') selected @endif>微醺列車 The Great Tipsy : The Next Stop</option>
                                                    <option value="flight"@if(isset($request->plan) && $request->plan=='flight') selected @endif>FLIGHT 無光飛航</option>
                                                    <option value="boat"@if(isset($request->plan) && $request->plan=='boat') selected @endif>Boat for ONE 單人船票</option>
                                                    <option value="A"@if(isset($request->plan) && $request->plan=='A') selected @endif>方案A</option>
                                                    <option value="B"@if(isset($request->plan) && $request->plan=='B') selected @endif>方案B</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="pay_type" class="form-control">
                                                    <option value="">付款類型</option>
                                                    <option value="信用卡"@if(isset($request->pay_type) && $request->pay_type=='信用卡') selected @endif>信用卡</option>
                                                    <option value="後台編輯"@if(isset($request->pay_type) && $request->pay_type=='後台編輯') selected @endif>後台編輯</option>
                                                    <option value="現場購票"@if(isset($request->pay_type) && $request->pay_type=='現場購票') selected @endif>現場購票</option>
                                                </select>
                                                <!-- <label><input type="checkbox" name="is_overseas" value="1"@if($request->is_overseas==1) checked @endif>海外信用卡</label> -->
                                                <label><input type="checkbox" name="is_overseas" value="2"@if($request->is_overseas==2) checked @endif>國內信用卡</label>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="order" class="form-control">
                                                    <option value="">排序(預設為修改時間反序)</option>
                                                    <option value="created_at|desc"@if(isset($request->order) && $request->order=='created_at|desc') selected @endif>訂單時間反序</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="special" class="form-control">
                                                        <option value="">場別</option>
                                                        <option value="1"@if(isset($request->special) && $request->special==1) selected @endif>特別場次</option>
                                                        <option value="0"@if(isset($request->special) && (string)$request->special==="0") selected @endif>一般場次</option>
                                                    </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="search" placeholder="搜尋姓名、電話、信箱" class="form-control" value="{{ $request->search or ''}}">
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="code" placeholder="優惠碼(需較長時間)" class="form-control" value="{{ $request->code or ''}}">
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="discount" placeholder="折扣碼" class="form-control" value="{{ $request->discount or ''}}">
                                            </div>
                                        </div><div class="row">
                                            <div class="form-group col-sm-1">
                                                <label><input type="checkbox" name="no_inv" value="1"@if($request->no_inv==1) checked @endif>未開發票</label>
                                            </div>
    
                                            <div class="form-group col-sm-11">
                                                <button type="submit" class="btn btn-info" style="margin:3px;"><span class="glyphicon glyphicon-search"></span> 搜尋</button>
                                                <button type="button" class="btn btn-primary" style="margin:3px;" id="grTable"><span class="glyphicon glyphicon-search"></span> 產生列印表格</button>
                                                <button type="button" class="btn btn-warning" style="margin:3px;" id="exportXls">匯出XLS</button>
                                            </div>
                                            </div>
                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                        <form action="/terminal/order/inv/mult/open" method="post">{!! csrf_field() !!}
                                    <div class="sticky-table-header fixed-solution"><table id="datatable-buttons" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th>票種 / 場次</th>
                                                <th>序號 / 資訊</th>
                                                <!--th>主餐</th-->
                                                <th>付款狀態 / 發票號碼</th>
                                                <th>餐飲備註</th>
                                                <th>優惠券</th>
                                                <th>註記</th>
                                                <th data-orderable="false">寄信</th>
                                                <th data-orderable="false">功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($order as $row)
    <?php 
        $coupons = App\model\terminal\coupon::where('o_id',$row->sn)->where('type',$row->plan)->get();
        $coupon_pople = 0;
        $tmp_b_id = 0;
        $totle_money = 0;
        $inv_open = false;
        $last_four = '';
        $couponNumber = 0;
        if($coupons && count($coupons)>0){
            /*
            foreach($coupons as $coup){
                $single_money = App\model\terminal\backme::select('money')->find($coup->b_id)->money;
                if($tmp_b_id != $coup->b_id){
                    $tmp_b_id = $coup->b_id;
                    $totle_money += $single_money;
                }
            }
            if(isset($coup->b_id)){
                // 這裡取得貝殼過來的後四碼
                $last_four = App\model\terminal\backme::select('last_four')->find($coup->b_id)->last_four;
            }
            */
            $couponNumber = 1;
            if($row->plan == 'train'){ $totle_money = count($coupons) * 1250; } elseif ($row->plan == 'flight') { $totle_money = count($coupons) * 500; }
            if($row->OM>0){ $totle_money += $row->OM; }
        } else {
            $totle_money = $row->OM;
            if($row->pay_type == '信用卡'){
                if($row->result !=''){
                    $card_info = json_decode($row->result);
                    if(isset($card_info->status) && $card_info->status==0){
                        $last_four = $card_info->card_info->last_four;
                    }
                }
                  
            }
        }
        $number = App\model\terminal\inv::select('number','is_cancal')->where('order_id',$row->id)->first();
        if($number){
            $inv_open = true;
        }
    ?>
                                            <tr id="tr_{{ $row->id }}">
                                                <td>@if($row->pay_status=='已付款' && $row->refund == 0 && $totle_money>0 && !$inv_open)<input type="checkbox" name="id[]" value="{{ $row->id }}">@endif</td>
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
                                                    @if($row->is_overseas == 9) <span class="badge badge-pill badge-info">特別場次</span> @endif
                                                </td>
                                                <td>{{ $row->sn }}<br />{{ $row->name }}<br />phone:{{ $row->tel }}<br />email:{{ $row->email }}<br />{{ $row->created_at }}<br />人數:{{ $row->pople }}人 素食:{{ $row->vegetarian }}人</td>
                                                <td class="@if($row->pay_status=='已付款')success @elseif($row->pay_status=='已付款(部分退款)')info @elseif($row->pay_status=='未完成')danger @elseif($row->pay_status=='取消訂位')warning @endif">{{ $row->pay_type }} / {{ $row->pay_status }}
@if($row->is_overseas == 1) <br />海外刷卡 @endif<br />
<span id="inv_{{ $row->id }}">{{ $inv_open ? $number->number : '' }}</span> 
@if($inv_open)
    @if(!$number->is_cancal)
        <a class="btn btn-danger btn-xs remove-inv" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
    @else
        (已報廢)
    @endif
@endif
<br />
@if($row->pay_type == '信用卡')
    @if($row->is_overseas>0) <span class="badge badge-pill badge-info">藍新金流 @else <span class="badge badge-pill badge-info">貝殼集器 @endif
@elseif($row->pay_type == '後台編輯')
    @if($row->edit_type == '') <span class="badge badge-pill badge-warning">尚未設定 @else <span class="badge badge-pill badge-info">{{ $row->edit_type }} @endif
@endif </span>





                                                </td>
                                                <td class="editable" style="word-break: break-all;max-width: 200px;" data-id="{{ $row->id }}" contenteditable="true">{!! nl2br($row->notes) !!}</td>
                                                <!-- <td style="word-break: break-all;max-width: 200px;">{{ $row->notes }}</td> -->
                                                <th>
                                                    @forelse(App\model\terminal\coupon::where('o_id',$row->sn)->get() as $coup){{ $coup->code }} <br>@empty 
                                                    @if($row->pay_type == '信用卡') 刷卡付費[{{ $row->OM }}] @else 無使用優惠券 @endif @endforelse
                                                    @if($couponNumber>0) [{{ $totle_money }}] @endif

<br >[<span data-toggle="tooltip" data-html="true" title='<div style="text-align:left;">小計：{{ round($totle_money / (1 + (5 / 100))) }}<br>稅額：{{ $totle_money - round($totle_money / (1 + (5 / 100))) }}<br>總計：{{$totle_money}}</div>'>發票資訊</span>]
</th>
                                                <td>{!! nl2br($row->manage) !!}</td>


                                                <td class="actions">
                                                    @if($row->pay_status=='已付款' || $row->pay_status=='已付款(部分退款)')
                                                    <a class="btn btn-primary btn-xs resent" href="javascript:;" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-id="{{ $row->pro_id }}" data-pople="{{ $row->pople }}" data-sn="{{ $row->sn }}" data-oid="{{ $row->id }}" data-phone="{{ $row->tel }}"  data-plan="{{ $row->plan }}" data-toggle="tooltip" data-placement="top" data-original-title="訂位確認信(包含簡訊)"><i class="fa fa-envelope"></i>訂位確認信</a><br /><br />
                                                    <!--a class="btn btn-primary btn-xs GoMail" href="javascript:;" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-id="{{ $row->pro_id }}" data-pople="{{ $row->pople }}"><i class="fa fa-envelope"></i>行前注意事項</a><br /-->


                                                    <a class="btn btn-primary btn-xs MasterBtn" href="javascript:;" data-id="{{ $row->id }}"><i class="fa fa-users"></i>團員</a>
                                                    @endif
                                                </td>
                                                <td class="actions">
                                                    @if( Session::get('key')->terminal == 1 && Session::get('key')->admin == 1 )
                                                    @if(($row->pay_status=='已付款' || $row->pay_status=='已付款(部分退款)' || ($row->pay_status=='取消訂位' && $row->refund>0 && $row->handling>0)) && !$inv_open)
                                                    <button type="button" class="btn btn-info btn-xs inv_btn" data-id="{{ $row->id }}" data-sn="{{ $row->sn }}" data-buyeremail="{{ $row->email }}" data-buyername="{{ $row->name }}" data-dial="{{ $row->dial_code }}" data-phone="{{ $row->tel }}" data-totle_money="{{ $totle_money }}" data-people="{{ $row->pople }}" data-last_four="{{ $last_four }}" data-plan="{{ $row->plan }}" data-pay_status="{{ $row->pay_status }}" data-dis_money="{{ $row->dis_money }}" data-cut="{{ $row->cut }}" data-handling="{{ $row->handling }}" data-refund="{{ $row->refund }}">發票開立</button><br /><br />
                                                    @endif
                                                    @endif
                                                    <a class="btn btn-primary btn-xs" href="/terminal/order/{{ $row->id }}/edit?{{ Request::getQueryString() }}"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs remove-order" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="10" align="center">尚無資料</td></tr>
@endforelse



                                        </tbody>
                                        @if( Session::get('key')->terminal == 1 && Session::get('key')->admin == 1)
                                        <tfoot>
                                            <tr>
                                                <td colspan="9"><button type="submit" class="btn btn-info">B2C 發票開立</button> <br/><span> 開立稅額 5% B2C 發票可於[發票資訊] 中預覽金額是否正確</span></td>
                                            </tr>
                                        </tfoot>
                                        @endif
                                    </table>

                                    <div align="center">{{ $order->appends(Request::capture()->except('page'))->links() }}</div>
                                </div></form></div>

                            </div>
                            
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/terminal/xls/emaildata/output" class="btn btn-warning">下載成功付款的 EMail 名單</a>
                                    <span style="font-size: 12px;color:red;"><br>需要較多的伺服器資源.請在離峰時刻使用</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">開立發票</h4>
                                        </div>
                                        <div class="modal-body"><form autocomplete="off">
                                            <input type="hidden" id="inv_use_id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">發票類型</label><br>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="Category" id="B2B" value="B2B">
                                <label for="B2B"> B2B </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="Category" id="B2C" value="B2C" checked>
                                <label for="B2C"> B2C </label>
                            </div>
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">訂單編號</label>
                                                        <input type="text" class="form-control" placeholder="訂單編號" name="MerchantOrderNo" readonly value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="BuyerName" class="control-label">買受人名稱</label>
                                                        <input type="text" name="BuyerName" class="form-control" id="BuyerName" placeholder="買受人名稱">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 b2b">
                                                    <div class="form-group">
                                                        <label for="BuyerUBN" class="control-label">買受人統編</label>
                                                        <input type="text" name="BuyerUBN" class="form-control" id="BuyerUBN" placeholder="買受人統編">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="BuyerEmail" class="control-label">買受人E-Mail</label>
                                                        <input type="email" name="BuyerEmail" class="form-control" id="BuyerEmail" placeholder="買受人E-Mail">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="BuyerPhone" class="control-label">買受人手機</label>
                                                        <input type="text" name="BuyerPhone" class="form-control" id="BuyerPhone" placeholder="買受人手機">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row b2c">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">是否捐贈</label><br>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="forlovecode" id="nolove" value="no" checked>
                                <label for="nolove"> 不捐贈 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="forlovecode" id="yeslove" value="yes">
                                <label for="yeslove"> 捐贈 </label>
                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group loveyes">
                                                        <label for="LoveCode" class="control-label">捐贈碼</label>
                                                        <input type="text" class="form-control" name="LoveCode" id="LoveCode" placeholder="捐贈碼">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row b2c loveno">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">載具類型</label><br>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="CarrierType" id="ct0" value="0" >
                                <label for="ct0"> 手機條碼 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="CarrierType" id="ct1" value="1">
                                <label for="ct1"> 自然人憑證條碼 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="CarrierType" id="ct2" value="2">
                                <label for="ct2"> ezPay電子發票載具 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="CarrierType" id="ct" value="" checked>
                                <label for="ct"> 無載具 </label>
                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ctyes loveno">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="CarrierNum" class="control-label">載具號碼</label>
                                                        <input type="text" class="form-control" name="CarrierNum" id="CarrierNum" placeholder="載具號碼">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="datatable-buttons" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>品名</th>
                                                <th>數量</th>
                                                <th>單位</th>
                                                <th>單價<span class="b2c">(含稅)</span></th>
                                                <th>金額<span class="b2c">(含稅)</span></th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemBody"></tbody>
                                            <!-- <tr>
                                                <td>落日轉運站(<span  id="inv_people"></span>人)</td>
                                                <td>1</td>
                                                <td>組</td>
                                                <td id="inv_price"></td>
                                                <td id="inv_amt"></td>
                                            </tr> -->
                                        <tfoot id="pass_money">
                                            <tr>
                                                <td><button type="button" class="btn btn-info additembtn">新增品項</button></td>
                                                <td colspan="5"><span class="text-danger small">計算金額會重新編輯品項，如要修改請在最後步驟更改。</span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <input type="hidden" id="TaxPlan" value="">
                                    <input type="hidden" id="TaxDisMoney" value="">
                                    <input type="hidden" id="inv_people" value="">

                                    <input type="hidden" id="inv_cut" value="">
                                    <input type="hidden" id="inv_handling" value="">
                                    <input type="hidden" id="inv_refund" value="">

                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="control-label">課稅別</label><br>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="TaxType" id="taxyes" value="1" >
                                <label for="taxyes"> 應稅 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="TaxType" id="tax0" value="2">
                                <label for="tax0"> 零稅率 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="TaxType" id="taxno" value="3" checked>
                                <label for="taxno"> 免稅 </label>
                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="TaxRate" class="control-label">稅率(%)</label>
                                                        <input type="number" class="form-control" readonly name="TaxRate" id="TaxRate" value="5" placeholder="稅率(%)">
                                                    </div>
                                                </div>
                                            </div>




                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Amt" class="control-label">銷售額總計</label>
                                                        <input type="number" class="form-control" id="Amt" placeholder="銷售額總計">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="TaxAmt" class="control-label">稅額</label>
                                                        <input type="number" class="form-control" name="TaxAmt" id="TaxAmt" placeholder="稅額">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="TotalAmt" class="control-label">總計</label>
                                                        <input type="number" class="form-control" name="TotalAmt" id="TotalAmt" placeholder="總計">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Comment" class="control-label">備註</label>
                                                        <input type="text" class="form-control" name="Comment" id="Comment" placeholder="備註">
                                                    </div>
                                                </div>
                                            </div>




                                        </form></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">關閉</button>
                                            <button type="button" class="btn btn-info waves-effect waves-light" id="sent_inv_open">確認開立發票</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->











                            <div id="inv_cancal_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">作廢發票</h4>
                                        </div>
                                        <div class="modal-body"><form autocomplete="off">
                                            <input type="hidden" id="inv_cancal_id">
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inv_number" class="control-label">發票號碼</label>
                                                        <input type="text" class="form-control" id="inv_number" readonly placeholder="發票號碼">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inv_cancal_note" class="control-label">作廢原因</label>
                                                        <input type="text" class="form-control" required="true" name="inv_cancal_note" id="inv_cancal_note" placeholder="作廢原因">
                                                    </div>
                                                </div>
                                            </div>



                                        </form></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">關閉</button>
                                            <button type="button" class="btn btn-info waves-effect waves-light" id="sent_inv_cancal">確認作廢發票</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->






                            <div id="master_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">揪團表</h4>
                                        </div>
                                        <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            {{--
                            <h4 class="m-t-0 header-title"><b>成員列表</b></h4>
                            <p class="text-muted font-13 m-b-25" id="MasterTitle">
                                日期
                            </p>
                            <p class="text-muted font-13 m-b-25">
<!-- Target -->
<textarea id="copyMe" class="form-control"></textarea>

<!-- Trigger -->
<button class="btn btnClip" data-clipboard-target="#copyMe">複製文字</button>
                            </p>
                            --}}
                            <p class="text-muted font-13 m-b-25">
                                主揪(訂位者)補寄功能
                                <!-- <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="0" data-name="-" data-email="-" data-type="DX" data-toggle="tooltip" data-placement="top" data-original-title="開幕酒會邀請函">邀請函</a>
                                <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="0" data-name="-" data-email="-" data-type="D21" data-toggle="tooltip" data-placement="top" data-original-title="寄送21天前的通知信">21</a>
                                <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="0" data-name="-" data-email="-" data-type="D14" data-toggle="tooltip" data-placement="top" data-original-title="寄送14天前的通知信">14</a>
                                <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="0" data-name="-" data-email="-" data-type="D10" data-toggle="tooltip" data-placement="top" data-original-title="寄送11天前的通知信">11</a> -->
                                <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="0" data-name="-" data-email="-" data-type="D7" data-toggle="tooltip" data-placement="top" data-original-title="寄送7天前的通知信">07</a>

                                <!-- <a href="javascript:;" class="btn btn-warning btn-xs send_sms" data-id="0" data-name="-" data-tel="-" data-type="order" data-toggle="tooltip" data-placement="top" data-original-title="訂位確認簡訊(訂位確認信也會觸發簡訊)">訂位確認</a>
                                <a href="javascript:;" class="btn btn-warning btn-xs send_sms" data-id="0" data-name="-" data-tel="-" data-type="D7" data-toggle="tooltip" data-placement="top" data-original-title="寄送7天前的通知簡訊">7</a>
                                <a href="javascript:;" class="btn btn-warning btn-xs send_sms" data-id="0" data-name="-" data-tel="-" data-type="DX" data-toggle="tooltip" data-placement="top" data-original-title="當天通知簡訊">當天</a> -->
                            </p>

                            <table class="table table-bordered table-hover m-0">

                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>email</th>
                                        <th>電話</th>
                                        <!--th>功能</th-->
                                    </tr>
                                </thead>
                                <tbody id="MasterBody"></tbody>
                            </table>

                        </div>
                    </div>

                    <!-- <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>寄信紀錄</b></h4>
                            <p class="text-muted font-13 m-b-25">
                                信件紀錄(不包含劃位完成信件)
                            </p>

                            <table class="table table-bordered table-hover m-0">
                                <thead>
                                    <tr>
                                        <th>email</th>
                                        <th>類型</th>
                                        <th>時間</th>
                                    </tr>
                                </thead>
                                <tbody id="SendBody"></tbody>
                            </table>


                        </div>
                    </div> -->

                </div>












                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">關閉</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->












<div class="modal fade bd-example-modal-sm" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">新增品項</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="addname" class="control-label">品名</label>
                        <input type="text" class="form-control" id="addname" placeholder="品名">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="addnum" class="control-label">數量</label>
                        <input type="number" class="form-control" id="addnum" placeholder="數量">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="addunit" class="control-label">單位</label>
                        <input type="text" class="form-control" id="addunit" maxlength="1" placeholder="單位">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="addprice" class="control-label">單價</label>
                        <input type="number" class="form-control" id="addprice" placeholder="單價">
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
        <button type="button" class="btn btn-primary additemModalbtn">新增品項</button>
      </div>
    </div>
  </div>
</div>



















                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                2016 © Minton.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- End wrapper -->

@include('backstage.jquery')
<link href="/backstage/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="/backstage/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<link href="/backstage/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Examples -->
	    <script src="/backstage/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	    <!--script src="/backstage/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	    <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
	    <script src="/backstage/plugins/tiny-editable/mindmup-editabletable.js"></script>
	    <script src="/backstage/plugins/tiny-editable/numeric-input-example.js"></script-->


        <script src="/backstage/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/backstage/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="/backstage/plugins/datatables/jszip.min.js"></script>
        <script src="/backstage/plugins/datatables/pdfmake.min.js"></script>
        <script src="/backstage/plugins/datatables/vfs_fonts.js"></script>
        <script src="/backstage/plugins/datatables/buttons.html5.min.js"></script>
        <script src="/backstage/plugins/datatables/buttons.print.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/backstage/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="/backstage/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.14/dist/sweetalert2.all.min.js"></script>
        <!--
<link href="/backstage/plugins/switchery/switchery.min.css" rel="stylesheet" />
<script src="/backstage/plugins/switchery/switchery.min.js"></script>
    -->


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>
        <!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
        <script>


$(function(){
    $('#checkAll').bind('click', function() {
        $('input[name="id[]"]').prop('checked', $(this).prop('checked'));
    });
    $('input[name="dayrange"]').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        },
        startDate: '{{ $request->daystart or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}',
        endDate: '{{ $request->dayend or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}',
        minDate:moment().add(-1, 'y').format('YYYY-MM-DD'),
        maxDate:moment().add(6, 'M').format('YYYY-MM-DD'),
    }, 
    function(start, end, label) {
        $('input[name=daystart]').val(start.format('YYYY-MM-DD') );
        $('input[name=dayend]').val(end.format('YYYY-MM-DD') );
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    $('.remove-order').bind('click',function(){
        var id = $(this).data('id');
        if(confirm("確定要刪除此訂單")) {
             $.ajax({
                url: '/terminal/order/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                // swal(data.message);
                $.Notification.notify('success','bottom left','提示訊息', data.message);
                $('#tr_'+id).remove();
            });
        }
    });
    $('.resent').bind('click',function(){
        var name  = $(this).data('name');
        var email = $(this).data('email');
        var id    = $(this).data('id');
        var pople = $(this).data('pople');
        var oid   = $(this).data('oid');
        var sn    = $(this).data('sn');
        var phone = $(this).data('phone');
        var plan  = $(this).data('plan');
        $.post('/terminal/order/'+id+'/resent',{
            name  : name,
            email : email,
            pople : pople,
            oid   : oid,
            phone : phone,
            sn    : sn,
            plan  : plan,
        },function(data){
            $.Notification.notify('success','bottom left','已重發', '信件已重新發送');
        },'json');
    });
    $('.GoMail').bind('click',function(){
        var name  = $(this).data('name');
        var email = $(this).data('email');
        var id    = $(this).data('id');
        var pople = $(this).data('pople');
        $.post('/terminal/order/'+id+'/resent',{
            name  : name,
            email : email,
            pople : pople,
            mailtype : 'go'
        },function(data){
            $.Notification.notify('success','bottom left','行前確認信 已重發', '信件已重新發送');
        },'json');
    });
    // 修改餐飲備註
    $('.editable').bind('blur',function(){
        var val = $(this).html();
        var id  = $(this).data('id');
        $.post('/terminal/order/'+id+'/store/ajax',{
            act: 'upateNotes',
            notes : val
        },function(data){
            if(data.success){ $.Notification.notify('success','bottom left','已更新', '備註已更新'); 
            } else { $.Notification.notify('error','bottom left','更新失敗', '餐飲備註更新失敗'); }
        },'json');
    });

    jQuery('#datepicker-autoclose').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });


    $('#grTable').bind('click',function(){
        var day      = $('input[name=day]').val();
        var dayparts = $('select[name=dayparts]').val();
        if(day == '' || dayparts == ''){
            if(confirm("尚未選擇日期或時段確定要產生此表格?!")){
                submitSearchForm();
            }
        } else {
            submitSearchForm();
        }
       
    });
    $('#exportXls').bind('click',function(){
        var day      = $('input[name=day]').val();
        if(day == ''){
            alert('請選擇日期');
        } else {
            submitXLSForm();
        }
    })
    // 以下發票
    shb2c();shlove();shcarr();taxchange();
    // 預設開關
    $('input[name="Category"]').bind('click',function(){ shb2c(); });
    $('input[name="forlovecode"]').bind('click',function(){ shlove(); });
    $('input[name="CarrierType"]').bind('click',function(){ shcarr(); });
    $('input[name="TaxType"]').bind('click',function(){ taxchange(); });
    $('#TotalAmt').bind('keyup',function(){ calAmt(); })
    // 取得發票需要的訂單資料
    $('.inv_btn').bind('click',function(){
        var id = $(this).data('id');
        
        var dial = $(this).data('dial');
        var phone = dial.replace('+886','0') + $(this).data('phone');
        var totle_money = $(this).data('totle_money');
        var handling = $(this).data('handling');
        var refund = $(this).data('refund');
        totle_money = parseInt(totle_money) - parseInt(refund) + Math.round((parseInt(refund) * parseInt(handling)) / 100);
        var people = $(this).data('people');
        var plan = $(this).data('plan');
        $('#TaxPlan').val(plan);
        $('#TaxDisMoney').val($(this).data('dis_money'));
        
// console.log(plan);
        $('input[name="MerchantOrderNo"]').val($(this).data('sn'));
        $('#BuyerName').val($(this).data('buyername'));
        $('#BuyerEmail').val($(this).data('buyeremail'));
        $('#BuyerPhone').val(phone);
        $("#B2C").prop( "checked", true );
        $("#ct").prop( "checked", true );
        $("#nolove").prop( "checked", true );
        $('#LoveCode,#CarrierNum,#BuyerUBN').val('');
        $('#Comment').val($(this).data('last_four'));
        $('#TotalAmt').val(totle_money);
        $('#inv_people').val(people);
        // $('#inv_price').text(totle_money/people);
        // $('#inv_amt').text(totle_money);
        $('#inv_use_id').val(id);
        $('#handling_fee').val(0);
        $('#inv_cut').val($(this).data('cut'));
        $('#inv_handling').val(handling);
        $('#inv_refund').val(refund);
        /*
        if($(this).data('pay_status') == '已付款(部分退款)'){
            $('#pass_money').show();
        } else {
            $('#pass_money').hide();
        }
*/
        
        var now_tax = Math.round(totle_money*5/100);
        $('#TaxAmt').val(now_tax);
        $('#Amt').val(totle_money - now_tax);
        $('#con-close-modal').modal('show');
        shb2c();shlove();shcarr();taxchange();calAmt();
    });
    // 手續費調整
    $('#handling_fee').bind('blur keyup change',function(){
        shb2c();shlove();shcarr();taxchange();calAmt();
    });
    // 送出發票資料
    $('#sent_inv_open').bind('click',function(){
        if(parseInt($('#Amt').val()) + parseInt($('#TaxAmt').val()) == parseInt($('#TotalAmt').val())){
            var id = $('#inv_use_id').val();


            var item1 = '';
            var item2 = '';
            var item3 = '';
            var item4 = '';
            var item5 = '';
            var itemMoney = 0;
            $('#itemBody tr').each(function(index, value){
                if(index>0){
                    item1 += '|';item2 += '|';item3 += '|';item4 += '|';item5 += '|';
                }
                item1 += $(value).find('td').eq(0).text();
                item2 += $(value).find('td').eq(1).text();
                item3 += $(value).find('td').eq(2).text();
                item4 += $(value).find('td').eq(3).text();
                item5 += $(value).find('td').eq(4).text();
                itemMoney += parseInt($(value).find('td').eq(4).text());
            });
            if($('input[name="Category"]:checked').val() == 'B2C'){
                if(parseInt($('#TotalAmt').val()) != itemMoney){
                    $.Notification.notify('error','bottom left','品項金額與總金額不符', '發票建立失敗');
                    return false;
                }
            } else {
                if(parseInt($('#Amt').val()) != itemMoney){
                    $.Notification.notify('error','bottom left','品項金額與總金額不符', '發票建立失敗');
                    return false;
                }
            }





            $.post('/terminal/order/inv/single/open',{
                'MerchantOrderNo' : $('input[name="MerchantOrderNo"]').val(),
                'BuyerName' : $('#BuyerName').val(),
                'BuyerUBN' : $('#BuyerUBN').val(),
                'BuyerPhone' : $('#BuyerPhone').val(),
                'BuyerEmail' : $('#BuyerEmail').val(),
                'Category' : $('input[name="Category"]:checked').val(),
                'TaxType' : $('input[name="TaxType"]:checked').val(),
                'TaxRate': $('#TaxRate').val(),
                'Amt' : $('#Amt').val(),
                'TaxAmt' : $('#TaxAmt').val(),
                'TotalAmt' : $('#TotalAmt').val(),
                'CarrierType' : $('input[name="CarrierType"]:checked').val(),
                'CarrierNum' : $('#CarrierNum').val(),
                'LoveCode' : $('#LoveCode').val(),
                /*
                'ItemName' : '落日轉運站('+$('#inv_people').text()+'人票)',
                'ItemCount' : $('#inv_people').text(),
                'ItemUnit' : '組',
                'ItemPrice' : $('#inv_price').text(),
                'ItemAmt' : $('#inv_amt').text(),
                */
                'ItemName' : item1,
                'ItemCount' : item2,
                'ItemUnit' : item3,
                'ItemPrice' : item4,
                'ItemAmt' : item5,
                'Comment' : $('#LoveCode').val(),
                'handling_fee' : $('#handling_fee').val() ?? 0,
                'id' : id
            },function(data){
                // 顯示發票號碼
                if(data.Status == 'SUCCESS'){
                    var result = JSON.parse(data.Result);
                    $('#inv_'+id).text(result.InvoiceNumber);
                    $('#con-close-modal').modal('hide');
                    $.Notification.notify('success','bottom left','發票已建立', '發票已建立');
                    $('.inv_btn[data-id='+id+']').remove();
                    $('input[checkbox][value='+id+']').remove();
                } else if(data.Status == 'LIB10003'){
                    $('#con-close-modal').modal('hide');
                    $.Notification.notify('success','bottom left','發票已建立過了', '發票已建立');
                    $('.inv_btn[data-id='+id+']').remove();
                    $('input[checkbox][value='+id+']').remove();
                } else {
                    $.Notification.notify('error','bottom left','請聯繫資訊人員', '發票建立失敗');
                }
                
                
            },'json');
        } else {
            $.Notification.notify('error','bottom left','金額錯誤', '發票建立失敗');
        }
    });

    // 報廢訂單確認視窗
    $('.remove-inv').bind('click',function(){
        var id = $(this).data('id');
        $('#inv_cancal_id').val(id);
        $('#inv_cancal_note').val('');
        $('#inv_number').val($('#inv_'+id).text());
        $('#inv_cancal_modal').modal('show');
    });
    $('#sent_inv_cancal').bind('click',function(){
        var id = $('#inv_cancal_id').val();
        if($('#inv_cancal_note').val()!=''){
            $.post('/terminal/order/inv/cancal',{
                'InvoiceNumber' : $('#inv_number').val(),
                'InvalidReason' : $('#inv_cancal_note').val(),
                'id' : id
            },function(data){
                // 顯示發票號碼
                if(data.Status == 'SUCCESS'){
                    var result = JSON.parse(data.Result);
                    $('#inv_cancal_modal').modal('hide');
                    $.Notification.notify('success','bottom left','發票已作廢', '發票已作廢');
                    $('.remove-inv[data-id='+id+']').remove();
                } else {
                    $.Notification.notify('error','bottom left','請聯繫資訊人員', '發票作廢失敗');
                }
            },'json');
        } else {
            $.Notification.notify('error','bottom left','請輸入作廢的原因', '發票作廢失敗');
        }
    });
    // master
    $('.MasterBtn').bind('click',function(){
        var id = $(this).data('id');
        $.post('/terminal/getMasterData',{'order_id': id},function(data){
            if(data.success){
                $('#MasterTitle').html('場次:'+data.master.day+' '+data.master.rang_start+'(第一筆為主揪)');
                $('#MasterBody').html('<tr><td>'+data.master.name+'</td><td>'+data.master.email+'</td><td>'+data.master.tel+'</td></tr>');
                for(row of data.slave){
                    $('#MasterBody').append('<tr><td><a href="/terminal/getMasterList?search='+row.name+'" target="_blank">'+row.name+'</a></td><td><a href="/terminal/getMasterList?search='+row.email+'" target="_blank">'+row.email+'</a></td><td><a href="/terminal/getMasterList?search='+row.tel+'" target="_blank">'+row.tel+'</a></td></tr>');
                }
                $('#SendBody').html('');
                for(row of data.send){
                    $('#SendBody').append('<tr><td>'+row.email+'</td><td>'+row.type+'</td><td>'+row.created_at+'</td></tr>');
                }
                @if(env('APP_ENV') == 'production')
                var Host = 'www.surpriselab.com.tw';
                var Protocol = 'https';
                @else
                var Host = 'dev.surpriselab.com.tw';
                var Protocol = 'http';
                @endif
                $("#copyMe").val(Protocol+"://"+Host+"/thegreattipsy/master?id="+data.master.md5id+"&sn="+data.master.sn);
                $('.send_mail,.send_sms').data('id',id);
                $('.send_mail,.send_sms').data('name',data.master.name);
                $('.send_mail').data('email',data.master.email);
                $('.send_sms').data('tel',data.master.tel);
                $('.send_mail').data('plan',data.master.plan);
                $('#master_modal').modal('show');
            } else {
                $.Notification.notify('error','bottom left','無法開啟內容', '內容錯誤');
            }
        },'json');
    });
    new ClipboardJS('.btnClip');
    $('.send_mail').bind('click',function(){
        var id  = $(this).data('id');
        var type  = $(this).data('type');
        var name  = $(this).data('name');
        var email  = $(this).data('email');
        var plan  = $(this).data('plan');
        $.post('/terminal/postReSendMail',{
            name: name,
            id: id,
            email: email,
            type: type,
            plan: plan,
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '已重新送出');
        },'json');
    });
    $('.send_sms').bind('click',function(){
        var id  = $(this).data('id');
        var type  = $(this).data('type');
        var name  = $(this).data('name');
        var tel  = $(this).data('tel');
        $.post('/terminal/postReSendSMS',{
            name: name,
            id: id,
            tel: tel,
            type: type,
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '已重新送出');
        },'json');
    });




$('#itemBody').on('click','.remove-item',function(){
    $(this).parent().parent().remove();
});
$('.additembtn').bind('click',function(){
    $('#inputModal').modal('show');
    
});

$('.additemModalbtn').bind('click',function(){
    var name = $('#addname').val();
    var num = $('#addnum').val();
    var unit = $('#addunit').val();
    var price = $('#addprice').val();
    if(name != '' && unit != '' && num != '' && price != ''){
        addItem(name,num,unit,price,(num * price));
        $('#addname,#addnum,#addunit,#addprice').val('');
        $('#inputModal').modal('hide');
    } else {
        $.Notification.notify('error','bottom left','資料不完整無法新增品項', '內容錯誤');
    }
});

$('#inputModal').on('hide.bs.modal', function (e) {
    $('#con-close-modal').modal('hide');
    setTimeout(function(){
        $('#con-close-modal').modal('show');
    },800)
    
});



});


function shb2c(){
    if($('input[name="Category"]:checked').val() == 'B2C'){
        $('.b2b').hide();
        $('.b2c').show();
    } else {
        $('.b2c').hide();
        $('.b2b').show();
    }
    calAmt();
}
function shlove(){
    if($('input[name="forlovecode"]:checked').val() == 'yes'){
        $('.loveyes').show();
        $('.loveno').hide();
    } else {
        $('.loveyes').hide();
        $('.loveno').show();
    }
}
function shcarr(){
    if($('input[name="CarrierType"]:checked').val() == ''){
        $('.ctyes').hide();
    } else {
        $('.ctyes').show();
    }
}
function taxchange(){
    if($('input[name="TaxType"]:checked').val() == 1){
        $('#TaxRate').val(5);
    } else {
        $('#TaxRate').val(0);
    }
    calAmt();
}
// 重算稅額
function calAmt(){
    var taxrate = $('#TaxRate').val();
    var people = $('#inv_people').val();
    var totleamt = $('#TotalAmt').val();
    var nowPlan = $('#TaxPlan').val();
    var now_tax = totleamt - Math.round(totleamt / (1 + (taxrate/100)));
    var taxTrain = 0;
    var taxFlight = 0;
    var taxBoat = 0;
    // var now_tax = Math.round(totleamt*taxrate/100);
    $('#TaxAmt').val(now_tax);
    $('#Amt').val(totleamt - now_tax);
    var disMoney = parseInt($('#TaxDisMoney').val());
    if($('input[name="Category"]:checked').val() == 'B2C'){
        //$('#inv_price').text(totleamt / people);
        //$('#inv_price').text(Math.round(totleamt / people *100)/100);
        // $('#inv_price').text(totleamt);
        // $('#inv_amt').text(totleamt);
        taxTrain = 1250;
        taxFlight = 500;
        taxBoat = 800;
    } else {
        //var itemPrice = Math.round((totleamt - now_tax) / people);
        //$('#inv_price').text(itemPrice);
        // $('#inv_price').text(totleamt - now_tax);
        // $('#inv_amt').text(totleamt - now_tax);
        if($('input[name="TaxType"]:checked').val() == 3 || $('input[name="TaxType"]:checked').val() == 2){
            taxTrain = 1250;
            taxFlight = 500;
            taxBoat = 800;
        } else {
            taxTrain = 1190;
            taxFlight = 476;
            taxBoat = 762;
            totleamt = totleamt - now_tax;
        }
    }
    var handling_fee = $('#handling_fee').val() ?? 0;
    var cut = parseInt($('#inv_cut').val());
    var handling = parseInt($('#inv_handling').val());
    var refund = parseInt($('#inv_refund').val());
    if(refund>0 && handling>0){
        handling_fee = Math.round((handling * refund) / 100);
    }
    $('#itemBody').html('');
    // var html = '<tr>';
    switch(nowPlan){
        case 'train':
            addItem('微醺列車：BON VOYAGE',people,'張',taxTrain,(taxTrain * people));
            addItem('行銷折扣',1,'組',(disMoney * -1),(disMoney * -1));
            // html += '<td>微醺列車：BON VOYAGE</td><td>'+people+'</td><td>張</td><td>'+taxTrain+'</td><td>'+(taxTrain * people)+'</td>';
            // html += '</tr><tr><td>行銷折扣</td><td>1</td><td>組</td><td>'+(disMoney * -1)+'</td><td>'+(disMoney * -1)+'</td>';
            if(taxTrain * people != parseInt(totleamt) + parseInt(disMoney)){
                discountLine = parseInt(totleamt) + parseInt(disMoney) - (taxTrain * people) - parseInt(handling_fee) + refund;
                addItem('折扣',1,'組',discountLine,discountLine);
            }
            break;
        case 'flight':
            addItem('FLIGHT 無光飛航',people,'張',taxFlight,(taxFlight * people));
            addItem('行銷折扣',1,'組',(disMoney * -1),(disMoney * -1));
            // html += '<td>FLIGHT 無光飛航</td><td>'+people+'</td><td>張</td><td>'+taxFlight+'</td><td>'+(taxFlight * people)+'</td>';
            // html += '</tr><tr><td>行銷折扣</td><td>1</td><td>組</td><td>'+(disMoney * -1)+'</td><td>'+(disMoney * -1)+'</td>';
            if(taxFlight * people != parseInt(totleamt) + parseInt(disMoney)){
                discountLine = parseInt(totleamt) + parseInt(disMoney) - (taxFlight * people) - parseInt(handling_fee) + refund;
                addItem('折扣',1,'組',discountLine,discountLine);
            }
            break;
        case 'boat':
            addItem('Boat for ONE 單程船票',people,'張',taxBoat,(taxBoat * people));
            addItem('行銷折扣',1,'組',(disMoney * -1),(disMoney * -1));
            // html += '<td>Boat for ONE 單程船票</td><td>'+people+'</td><td>張</td><td>'+taxBoat+'</td><td>'+(taxBoat * people)+'</td>';
            // html += '</tr><tr><td>行銷折扣</td><td>1</td><td>組</td><td>'+(disMoney * -1)+'</td><td>'+(disMoney * -1)+'</td>';
            if(taxBoat * people != parseInt(totleamt) + parseInt(disMoney)){
                discountLine = parseInt(totleamt) + parseInt(disMoney) - (taxBoat * people) - parseInt(handling_fee) + refund;
                addItem('折扣',1,'組',discountLine,discountLine);
            }
            break;
        case 'A':
            addItem('微醺列車：BON VOYAGE',people,'張',taxTrain,(taxTrain * people));
            addItem('FLIGHT 無光飛航',people,'張',taxFlight,(taxFlight * people));
            addItem('套票折扣',people,'張',-100,(people * -100));
            addItem('行銷折扣',1,'組',(disMoney * -1),(disMoney * -1));
            // html += '<td>微醺列車：BON VOYAGE</td><td>'+people+'</td><td>張</td><td>'+taxTrain+'</td><td>'+(taxTrain * people)+'</td></tr><tr>';
            // html += '<td>FLIGHT 無光飛航</td><td>'+people+'</td><td>張</td><td>'+taxFlight+'</td><td>'+(taxFlight * people)+'</td></tr><tr>';
            // html += '<td>套票折扣</td><td>'+people+'</td><td>張</td><td>-100</td><td>'+(-100 * people)+'</td>';
            // html += '</tr><tr><td>行銷折扣</td><td>1</td><td>組</td><td>'+(disMoney * -1)+'</td><td>'+(disMoney * -1)+'</td>';
            if((taxTrain * people)+(taxFlight * people)+(-100 * people) != parseInt(totleamt) + parseInt(disMoney)){
                discountLine = parseInt(totleamt) + parseInt(disMoney) - (taxTrain * people) - (taxFlight * people) - (-100 * people) - parseInt(handling_fee) + refund;
                addItem('折扣',1,'組',discountLine,discountLine);
            }
            break;
        case 'B':
            addItem('微醺列車：BON VOYAGE',people,'張',taxTrain,(taxTrain * people));
            addItem('FLIGHT 無光飛航',people,'張',taxFlight,(taxFlight * people));
            addItem('Boat for ONE 單程船票',people,'張',taxBoat,(taxBoat * people));
            addItem('套票折扣',people,'張',-150,(people * -150));
            addItem('行銷折扣',1,'組',(disMoney * -1),(disMoney * -1));
            // html += '<td>微醺列車：BON VOYAGE</td><td>'+people+'</td><td>張</td><td>'+taxTrain+'</td><td>'+(taxTrain * people)+'</td></tr><tr>';
            // html += '<td>FLIGHT 無光飛航</td><td>'+people+'</td><td>張</td><td>'+taxFlight+'</td><td>'+(taxFlight * people)+'</td></tr><tr>';
            // html += '<td>Boat for ONE 單程船票</td><td>'+people+'</td><td>張</td><td>'+taxBoat+'</td><td>'+(taxBoat * people)+'</td></tr><tr>';
            // html += '<td>套票折扣</td><td>'+people+'</td><td>張</td><td>-150</td><td>'+(-150 * people)+'</td>';
            // html += '</tr><tr><td>行銷折扣</td><td>1</td><td>組</td><td>'+(disMoney * -1)+'</td><td>'+(disMoney * -1)+'</td>';
            if((taxTrain * people)+(taxFlight * people)+(taxBoat * people)+(-150 * people) != parseInt(totleamt) + parseInt(disMoney)){
                discountLine = parseInt(totleamt) + parseInt(disMoney) - (taxTrain * people) - (taxFlight * people) - (taxBoat * people) - (-150 * people) - parseInt(handling_fee) + refund;
                addItem('折扣',1,'組',discountLine,discountLine);
            }
            break;
    }
    // html += '</tr>';
    // html += addItem('手續費',1,'組',handling_fee,handling_fee);//'</tr><tr><td>手續費</td><td>1</td><td>組</td><td>'+handling_fee+'</td><td>'+handling_fee+'</td>';
    // $('#itemBody').html(html);
    if(refund>0) addItem('退費',cut,'張',(refund/cut)*-1,(refund*-1));
    if(handling_fee > 0) addItem('手續費',1,'組',handling_fee,handling_fee);
}
function addItem(name,num,unit,sprice,tprice){
    var html = '<tr><td>'+name+'</td><td>'+num+'</td><td>'+unit+'</td><td>'+sprice+'</td><td>'+tprice+'</td><td><a class="btn btn-danger btn-xs remove-item" href="javascript:;"><i class="fa fa-remove"></i></a></td></tr>';
    $('#itemBody').append(html);
}

function submitXLSForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/terminal/xls/data/output')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/terminal/print');
}
function submitSearchForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/terminal/table')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/terminal/print');
}
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

