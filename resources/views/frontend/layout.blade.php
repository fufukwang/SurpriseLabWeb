<!DOCTYPE html>
<head>
    <title>無光晚餐 DINING IN THE DARK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="icon" href="/images/tab-icon.png" >
    <link rel="stylesheet" href="/stylesheets/screen.css">
    <link rel="stylesheet" href="/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/stylesheets/print.css">
    <link rel="stylesheet" href="/stylesheets/media.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/main.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='//fonts.googleapis.com/css?family=PT+Serif:400' rel='stylesheet' type='text/css'><script type="text/javascript">var _jf = _jf || [];_jf.push(['p','42509']);_jf.push(['_setFont','datm7','css','.datm7']);_jf.push(['_setFont','datm7','alias','datm7']);_jf.push(['_setFont','datm7','english','PT Serif']);_jf.push(['_setFont','datm7','weight',700]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/4.9.8/id/180297678342");</script>
<meta property="og:title" content="無光晚餐 DINING IN THE DARK" />
<meta property="og:description" content="這裡黑暗無光，唯有你的舌尖，將被每道料理點亮。" />
<meta property="og:url" content="http://{{ $_SERVER['HTTP_HOST'] }}{{ $_SERVER['REQUEST_URI'] }}" />
<meta property="og:site_name" content="無光晚餐 DINING IN THE DARK" />
<meta property="og:image" content="http://surpriselab.com.tw/images/share.jpg" />
<meta property="og:type" content="website" />
<meta name="description" content="這裡黑暗無光，唯有你的舌尖，將被每道料理點亮。">
<meta name="keywords" content="無光晚餐、無光餐廳、約會餐廳、黑暗餐廳、黑暗體驗">
</head>
<body>
    <div class="wrap datm7">
        @include('frontend.menu')
       
        <!-- first cut -->
        @yield('content')
        
        <!-- footer -->
        <footer class="footer-section" style="">
            <div class="footer-zone">
                <div class="flex-row">
                    <div class="footer-container-md">
                        <h1>
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
                                   11:30-16:30 / 18:00-23:00
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
                    <div class="footer-container-md">
                        <h1>
                            地址｜Address
                        </h1>
                        <table>
                            <tr>
                                <td>
                                    {{ trans('front.contact.address') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="footer-container-md">
                        <h1>
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
                    <div class="footer-container-xs">
                        <div>
                            <ul>
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/surpriselabtw/">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.instagram.com/surpriselabtw/">
                                       <i class="fa fa-instagram"></i>   
                                   </a>
                                </li>
                            </ul>
                        </div>
                        <div class="copyright">
                            Copyright © 2016 驚喜製造
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>