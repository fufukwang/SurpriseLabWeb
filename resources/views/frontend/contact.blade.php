@extends('frontend.layout')

@section('content')
<div class="section-02 reservation-section contact-section">
           <div class="contact-info-container">
               <div class="row">
                   <div class="col-md-6">
                       <div>
                           <h1 class="datm7">
                               營業時間｜Opening hour
                           </h1>
                           <table>
                               <tr>
                                   <td>
                                       Tue-Fri 
                                   </td>
                                   <td>
                                       18:00-23:00
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Sat-Sun
                                   </td>
                                   <td>
                                       11:30-16:00 / 18:00-23:00
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Monday
                                   </td>
                                   <td>
                                       Closed
                                   </td>
                               </tr>
                           </table>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div>
                           <h1 class="datm7">
                               地址｜Address
                           </h1>
                           <table>
                               <tr>
                                   <td>
                                       {{ trans('front.contact.address') }}<br>{{ trans('front.contact.address2') }}
                                   </td>
                               </tr>
                           </table>
                       </div>
                       <div>
                           <h1 class="datm7">
                               聯絡信箱｜E-mail
                           </h1>
                           <table>
                               <tr>
                                   <td>
                                       service@surpriselab.com.tw
                                   </td>
                               </tr>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
            <div>
                <img style="max-width: 640px;" class="hidden-xs" src="/images/map.jpg" alt=""><img style="width: 100%;margin-bottom: 25px;" class="visible-xs" src="/images/map-MOBILE.jpg" alt="">  
            </div>
           <div class="contact-alert-container">
               <div class="left-box">
                   {{ trans('front.contact.story') }} 
               </div>
               <div class="right-box">
                   {{ trans('front.contact.storyc') }} 
               </div>
               <!--div class="left-box">
                   {{ trans('front.contact.title') }} 
               </div>
               <div class="right-box">
                  {!! trans('front.contact.content') !!}service@surpriselab.com.tw
                </div-->
           </div>
           
            <div class="main-container"><form action="/frontcontactstore" method="post" id="contactform">{!! csrf_field() !!}
                <table>
                    <tr>
                        <td>＊{{ trans('front.contact.Name') }}</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="Name" id="Name" required>
                        </td>
                    </tr>
                    <tr id="NameAlert" style="display: none;">
                        <td>
                            <span class="alert-wrap alert-show">

                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ trans('front.contact.NameAlert') }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.contact.Tel') }}</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="tel" name="Tel" id="Tel">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>＊EMAIL</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="EMail" id="EMail" required>
                        </td>
                    </tr>
                    <tr id="EMailAlert" style="display: none;">
                        <td>
                            <span class="alert-wrap alert-show">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ trans('front.contact.EMailAlert') }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>＊{{ trans('front.contact.Sub') }}</td>
                    </tr>
                    <tr>
                        <td class="select-wrap">
                            <select name="Subject" id="Subject">
                                <option value="付款問題">{{ trans('front.contact.SubTit1') }}</option>
                                <option value="訂位問題">{{ trans('front.contact.SubTit2') }}</option>
                                <option value="媒體來信">{{ trans('front.contact.SubTit3') }}</option>
                                <option value="包場詢問">{{ trans('front.contact.SubTit4') }}</option>
                                <option value="驚喜小故事">{{ trans('front.contact.SubTit5') }}</option>
                                <option value="服務建議">{{ trans('front.contact.SubTit6') }}</option>
                                <option value="其他">{{ trans('front.contact.SubTit7') }}</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="SubAlert" style="display: none;;">
                        <td>
                            <span class="alert-wrap alert-show">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ trans('front.contact.SubAlert') }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.contact.Content') }}</td>
                    </tr>
                    <tr>
                        <td>
                            <textarea rows="5" id="Content" name="Content"></textarea>
                        </td>
                    </tr>
                    <tr id="ContAlert" style="display: none;">
                        <td>
                            <span class="alert-wrap alert-show">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ trans('front.contact.ContAlert') }}
                            </span>
                        </td>
                    </tr>
                </table>

                <a href="javascript:;" id="contactbtn">
                    <div class="btn btn-standard">
                        {{ trans('front.home.submit') }}
                    </div>
                </a>
            </form></div>
            
            
        </div>
<script type="text/javascript">
$(function(){
  $('#contactbtn').bind('click',function(){
    var GoNext = 0;
    if($('#Name').val()==''){ $('#NameAlert').show(); GoNext++; } else { $('#NameAlert').hide(); }
    if(!validateEmail($('#EMail').val())){ $('#EMailAlert').show(); GoNext++; } else { $('#EMailAlert').hide(); }
    if($('#Content').val()==''){ $('#ContAlert').show(); GoNext++; } else { $('#ContAlert').hide(); }
    if(GoNext==0){
      $('#contactform').submit();
    }
  });
});
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
</script>
@endsection