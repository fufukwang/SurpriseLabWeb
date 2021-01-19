@include('backstage.header',['title' => '微醺大飯店：1980s訂單列表'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">微醺大飯店：1980s訂單列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/thegreattipsyS2/print" id="SearchForm">

                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
<input name="dayrange" type="text" class="form-control" placeholder="yyyy-mm-dd">
<input type="hidden" name="daystart" value="{{ $request->daystart or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}">
<input type="hidden" name="dayend" value="{{ $request->dayend or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}">
                                                    <!--div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div--><!-- input-group -->
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
                                                <select name="pay_type" class="form-control">
                                                    <option value="">付款類型</option>
                                                    <option value="信用卡"@if(isset($request->pay_type) && $request->pay_type=='信用卡') selected @endif>信用卡</option>
                                                    <option value="現場付款"@if(isset($request->pay_type) && $request->pay_type=='現場付款') selected @endif>現場付款</option>
                                                    <option value="後台編輯"@if(isset($request->pay_type) && $request->pay_type=='後台編輯') selected @endif>後台編輯</option>
                                                </select>
                                                <label><input type="checkbox" name="is_overseas" value="1"@if($request->is_overseas==1) checked @endif>海外信用卡</label>
                                                <label><input type="checkbox" name="is_overseas" value="2"@if($request->is_overseas==2) checked @endif>國內信用卡</label>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <select name="order" class="form-control">
                                                    <option value="">排序(預設為修改時間反序)</option>
                                                    <option value="rang_start|asc"@if(isset($request->order) && $request->order=='rang_start|asc') selected @endif>開始時間正序</option>
                                                    <option value="rang_start|desc"@if(isset($request->order) && $request->order=='rang_start|desc') selected @endif>開始時間反序</option>
                                                    <option value="created_at|desc"@if(isset($request->order) && $request->order=='created_at|desc') selected @endif>訂單時間反序</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="search" placeholder="搜尋姓名、電話、信箱" class="form-control" value="{{ $request->search or ''}}">
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="code" placeholder="優惠碼(需較長時間)" class="form-control" value="{{ $request->code or ''}}">
                                            </div>
 
                                            <div class="form-group col-sm-1">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="button" class="btn btn-primary" id="grTable"><span class="glyphicon glyphicon-search"></span> 產生列印表格</button>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="button" class="btn btn-warning" id="exportXls">匯出XLS</button>
                                            </div>

                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                        <form action="/thegreattipsyS2/order/inv/mult/open" method="post">{!! csrf_field() !!}
                                    <div class="sticky-table-header fixed-solution"><table id="datatable-buttons" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th>序號 / 場次</th>
                                                <th>資訊</th>
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
        $coupons = App\model\tgt2\coupon::where('o_id',$row->sn)->get();
        $coupon_pople = 0;
        $tmp_b_id = 0;
        $totle_money = 0;
        $inv_open = false;
        $last_four = '';
        if($coupons){
            foreach($coupons as $coup){
                $single_money = App\model\tgt2\backme::select('money')->find($coup->b_id)->money;
                if($tmp_b_id != $coup->b_id){
                    $tmp_b_id = $coup->b_id;
                    $totle_money += $single_money;
                }
                if($coup->type == 'eb1' || $coup->type == 'p1'){ $coupon_pople += 1; } elseif ($coup->type == 'p4') { $coupon_pople += 4; } elseif ($coup->type == 'p6') { $coupon_pople += 6; }
            }
            if(isset($coup->b_id)){
                // 這裡取得貝殼過來的後四碼
                $last_four = App\model\tgt2\backme::select('last_four')->find($coup->b_id)->last_four;
            }
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
        $number = App\model\tgt2\inv::select('number','is_cancal')->where('order_id',$row->id)->first();
        if($number){
            $inv_open = true;
        }
    ?>
                                            <tr id="tr_{{ $row->id }}">
                                                <td>@if($row->pay_status=='已付款' && $totle_money>0 && !$inv_open)<input type="checkbox" name="id[]" value="{{ $row->id }}">@endif</td>
                                                <td>{{ $row->sn }}<br />{{ $row->day }}<br />{{ $row->day_parts }}<br />
{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($row->rang_start,0,5))))) }} ~ 
{{ str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($row->rang_end,0,5))))) }}</td>
                                                <td>{{ $row->name }}<br />phone:{{ $row->tel }}<br />email:{{ $row->email }}<br />{{ $row->created_at }}<br />人數:{{ $row->pople }}人 素食:{{ $row->vegetarian }}人</td>
                                                <!--td>{{ implode('/',json_decode($row->meat,true)) }}</td-->
                                                <td class="@if($row->pay_status=='已付款')success @elseif($row->pay_status=='未完成')danger @elseif($row->pay_status=='取消訂位')warning @endif">{{ $row->pay_type }} / {{ $row->pay_status }}
@if($row->is_overseas) <br />海外刷卡 @endif<br />
<span id="inv_{{ $row->id }}">{{ $inv_open ? $number->number : '' }}</span> 
@if($inv_open)
    @if(!$number->is_cancal)
        <a class="btn btn-danger btn-xs remove-inv" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
    @else
        (已報廢)
    @endif
@endif
                                                </td>
                                                <td style="word-break: break-all;max-width: 200px;">{{ $row->notes }}</td>
                                                <th>@forelse(App\model\tgt2\coupon::where('o_id',$row->sn)->get() as $coup){{ $coup->code }} [{{App\model\tgt2\backme::select('money')->find($coup->b_id)->money}}]<br >@empty 
@if($row->pay_type == '信用卡') 刷卡付費[{{ $row->OM }}] @else 無使用優惠券 @endif @endforelse
<br >[<span data-toggle="tooltip" data-html="true" title='<div style="text-align:left;">小計：{{$totle_money-round($totle_money*5/100)}}<br>稅額：{{round($totle_money*5/100)}}<br>總計：{{$totle_money}}</div>'>發票資訊</span>]
</th>
                                                <td>{{ $row->manage }}</td>


                                                <td class="actions">
                                                    @if($row->pay_status=='已付款')
                                                    <a class="btn btn-primary btn-xs resent" href="javascript:;" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-id="{{ $row->pro_id }}" data-pople="{{ $row->pople }}"><i class="fa fa-envelope"></i>訂位確認信</a><br /><br />
                                                    <a class="btn btn-primary btn-xs GoMail" href="javascript:;" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-id="{{ $row->pro_id }}" data-pople="{{ $row->pople }}"><i class="fa fa-envelope"></i>行前注意事項</a><br />


                                                    <!-- <a class="btn btn-primary btn-xs MasterBtn" href="javascript:;" data-id="{{ $row->id }}"><i class="fa fa-envelope"></i>test</a> -->
                                                    @endif
                                                </td>
                                                <td class="actions">
                                                    @if( Session::get('key')->tgt2 == 0 )
                                                    @if($row->pay_status=='已付款')
                                                    <button type="button" class="btn btn-info btn-xs inv_btn" data-id="{{ $row->id }}" data-sn="{{ $row->sn }}" data-buyeremail="{{ $row->email }}" data-buyername="{{ $row->name }}" data-dial="{{ $row->dial_code }}" data-phone="{{ $row->tel }}" data-totle_money="{{ $totle_money }}" data-people="{{ $row->pople }}" data-last_four="{{ $last_four }}">發票開立</button><br /><br />
                                                    @endif
                                                    @endif
                                                    <a class="btn btn-primary btn-xs" href="/thegreattipsyS2/order/{{ $row->id }}/edit?{{ Request::getQueryString() }}"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs remove-order" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="10" align="center">尚無資料</td></tr>
@endforelse



                                        </tbody>
                                        @if( Session::get('key')->tgt2 == 0 )
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
                                    <a href="/thegreattipsyS2/xls/emaildata/output" class="btn btn-warning">下載成功付款的 EMail 名單</a>
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
                                            </tr>
                                            <tr>
                                                <td>微醺大飯店：1980s</td>
                                                <td id="inv_people"></td>
                                                <td>張</td>
                                                <td id="inv_price"></td>
                                                <td id="inv_amt"></td>
                                            </tr>
                                        </thead>
                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="control-label">課稅別</label><br>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="TaxType" id="taxyes" value="1" checked>
                                <label for="taxyes"> 應稅 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="TaxType" id="tax0" value="2">
                                <label for="tax0"> 零稅率 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" name="TaxType" id="taxno" value="3">
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
                            <h4 class="m-t-0 header-title"><b>成員列表</b></h4>
                            <p class="text-muted font-13 m-b-25" id="MasterTitle">
                                日期
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

                    <div class="col-lg-12">
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
                    </div>

                </div>












                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">關閉</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->

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
        <!--
<link href="/backstage/plugins/switchery/switchery.min.css" rel="stylesheet" />
<script src="/backstage/plugins/switchery/switchery.min.js"></script>
    -->


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>
        <!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>
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
                url: '/thegreattipsyS2/order/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
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
        $.post('/thegreattipsyS2/order/'+id+'/resent',{
            name  : name,
            email : email,
            pople : pople,
            oid   : oid
        },function(data){
            $.Notification.notify('success','bottom left','已重發', '信件已重新發送');
        },'json');
    });
    $('.GoMail').bind('click',function(){
        var name  = $(this).data('name');
        var email = $(this).data('email');
        var id    = $(this).data('id');
        var pople = $(this).data('pople');
        $.post('/thegreattipsyS2/order/'+id+'/resent',{
            name  : name,
            email : email,
            pople : pople,
            mailtype : 'go'
        },function(data){
            $.Notification.notify('success','bottom left','行前確認信 已重發', '信件已重新發送');
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
            console.log('test');
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
        var people = $(this).data('people');

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
        $('#inv_people').text(people);
        $('#inv_price').text(totle_money/people);
        $('#inv_amt').text(totle_money);
        $('#inv_use_id').val(id);

        var now_tax = Math.round(totle_money*5/100);
        $('#TaxAmt').val(now_tax);
        $('#Amt').val(totle_money - now_tax);
        $('#con-close-modal').modal('show');
        shb2c();shlove();shcarr();taxchange();calAmt();
    });
    // 送出發票資料
    $('#sent_inv_open').bind('click',function(){
        if(parseInt($('#Amt').val()) + parseInt($('#TaxAmt').val()) == parseInt($('#TotalAmt').val())){
            var id = $('#inv_use_id').val();
            $.post('/thegreattipsyS2/order/inv/single/open',{
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
                'ItemName' : '微醺大飯店：1980s',
                'ItemCount' : $('#inv_people').text(),
                'ItemUnit' : '張',
                'ItemPrice' : $('#inv_price').text(),
                'ItemAmt' : $('#inv_amt').text(),
                'Comment' : $('#LoveCode').val(),
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
            $.post('/thegreattipsyS2/order/inv/cancal',{
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
        $.post('/thegreattipsyS2/getMasterData',{'order_id': id},function(data){
            if(data.success){
                $('#MasterTitle').html('場次:'+data.master.day+' '+data.master.rang_start+'(第一筆為主揪)');
                $('#MasterBody').html('<tr><td>'+data.master.name+'</td><td>'+data.master.email+'</td><td>'+data.master.tel+'</td></tr>');
                for(row in data.slave){
                    $('#MasterBody').append('<tr><td>'+row.name+'</td><td>'+row.email+'</td><td>'+row.tel+'</td><td></td></tr>');
                }
                $('#SendBody').html('');
                for(row in data.send){
                    $('#SendBody').append('<tr><td>'+row.email+'</td><td>'+row.type+'</td><td>'+row.created_at+'</td></tr>');
                }
                $('#master_modal').modal('show');
            } else {
                $.Notification.notify('error','bottom left','無法開啟內容', '內容錯誤');
            }
        },'json');
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
    var people = $('#inv_people').text();
    var totleamt = $('#TotalAmt').val();
    var now_tax = Math.round(totleamt*taxrate/100);
    $('#TaxAmt').val(now_tax);
    $('#Amt').val(totleamt - now_tax);
    if($('input[name="Category"]:checked').val() == 'B2C'){
        //$('#inv_price').text(totleamt / people);
        $('#inv_price').text(Math.round(totleamt / people *100)/100);
        $('#inv_amt').text(totleamt);
    } else {
        var itemPrice = Math.round((totleamt - now_tax) / people);
        $('#inv_price').text(itemPrice);
        $('#inv_amt').text(totleamt - now_tax);
    }
}

function submitXLSForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/thegreattipsyS2/xls/data/output')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/thegreattipsyS2/print');
}
function submitSearchForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/thegreattipsyS2/table')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/thegreattipsyS2/print');
}
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

