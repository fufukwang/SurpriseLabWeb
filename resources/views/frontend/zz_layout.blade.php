<!DOCTYPE html>
<head>
    <title>Dinner In The Dark</title>
    <meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
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
</head>
<body>
    <div class="wrap">
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
                                   18:30-20:30 / 21:00-23:00
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   Sat-Sun
                               </td>
                               <td>
                                   11:30-13:30 / 14:00-16:00
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   
                               </td>
                               <td>
                                   18:30-20:30 / 21:00-23:00
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   Monday
                               </td>
                               <td>
                                   Close
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
                                    台北市大安區延吉街261號1樓
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="footer-container-md">
                        <h1>
                            聯絡信箱 / E-mail
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