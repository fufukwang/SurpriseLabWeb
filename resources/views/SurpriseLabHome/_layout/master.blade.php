<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')

    @yield('style')
    

</head>
<body class="loading">

    <!-- nav -->
    <nav id="js-surpri-nav" class="surpri-nav theme-default">
        <div id="js-nav-pc" class="nav-pc-wrap">
            <div class="logo-wrap">
                <a href="/tw/index.html" class="js-logo-white surpri-logo style-white"></a>
                <a href="/tw/index.html" class="js-logo-dark surpri-logo style-dark"></a>
            </div>
            <ul class="menu-wrap">
                <li class="menu-item @if(Request::segment(2) == 'index.html' || Request::segment(2) == '')active @endif"><a href="/tw/index.html">HOME</a></li>
                <li class="menu-item @if(Request::segment(2) == 'team.html')active @endif"><a href="/tw/team.html">TEAM</a></li>
                <li class="menu-item @if(Request::segment(2) == 'project.html' || Request::segment(2) == 'project')active @endif"><a href="/tw/project.html">PROJECT</a></li>
                <li class="menu-item @if(Request::segment(2) == 'ticket.html')active @endif"><a href="/tw/ticket.html">ON-GOING</a></li>
            </ul>
        </div>

        <div class="nav-mobile-wrap">
            <div class="mobile-bar-wrap">
                <div class="logo-wrap">
                    <a href="/tw/index.html" class="js-logo-white surpri-logo style-white"></a>
                    <a href="/tw/index.html" class="js-logo-dark surpri-logo style-dark"></a>
                </div>
                <div id="js-mobile-menu-btn" class="menu-btn-wrap"><span></span><span></span></div>
            </div>
            <div id="js-mobile-content" class="mobile-content-wrap">
                <ul class="menu-wrap">
                    <li class="menu-item  @if(Request::segment(2) == 'index.html' || Request::segment(2) == '')active @endif"><a href="/tw/index.html">HOME</a></li>
                    <li class="menu-item  @if(Request::segment(2) == 'team.html')active @endif"><a href="/tw/team.html">TEAM</a></li>
                    <li class="menu-item  @if(Request::segment(2) == 'project.html' || Request::segment(2) == 'project')active @endif"><a href="/tw/project.html">PROJECT</a></li>
                    <li class="menu-item  @if(Request::segment(2) == 'ticket.html')active @endif"><a href="/tw/ticket.html">ON-GOING</a></li>
                </ul>

                <!-- footer -->
                <div class="surpri-footer-wrap">
                    <div class="nav-footer-wrap">
                        <div class="footer-item">
                            <div class="footer-title">Get in Touch</div>
                                <a href="mailto:service@surpriselab.com.tw" target="_blank" class="footer-link-url">service@surpriselab.com.tw</a>
                            </div>
                        <div class="footer-item">
                            <div class="footer-title">Follow Us</div>
                            <div class="social-wrap">
                                <a href="https://www.facebook.com/surpriselabtw?utm_source=officialwebsite&utm_medium=SocialFollow" target="_blank" title="Facebook" class="footer-link-icon">
                                    <i class="icon-fb"></i>
                                </a>
                                <a href="https://www.instagram.com/surpriselabtw/?utm_source=officialwebsite&utm_medium=SocialFollow" target="_blank" title="Instagram" class="footer-link-icon">
                                    <i class="icon-ig"></i>
                                </a>
                            </div>
                        </div>
                        <div class="footer-item">
                            <div class="footer-title">Language</div>
                            <ul class="list-wrap">
                                <li class="list-item"><a href="#" class="footer-link-lang active">繁中</a></li>
                                <li class="list-item"><a href="#" class="footer-link-lang">EN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('main')

    <!-- Footer -->
    <footer class="surpri-footer-wrap js-surpri-footer">
        <!-- pc -->
        <div class="footer-pc">

            <div class="footer-upper-outter-wrap">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-upper-wrap">
                                <address class="contact-wrap">
                                    <div class="footer-item">
                                        <div class="footer-title">Get in Touch</div>
                                        <a href="mailto:service@surpriselab.com.tw" target="_blank" class="footer-link-url">service@surpriselab.com.tw</a>
                                    </div>
                                    <div class="footer-item">
                                        <div class="footer-title">Follow Us</div>
                                        <div class="social-wrap">
                                            <a href="https://www.facebook.com/surpriselabtw?utm_source=officialwebsite&utm_medium=SocialFollow" target="_blank" title="Facebook" class="footer-link-icon">
                                                <i class="icon-fb"></i>
                                            </a>
                                            <a href="https://www.instagram.com/surpriselabtw/?utm_source=officialwebsite&utm_medium=SocialFollow" target="_blank" title="Instagram" class="footer-link-icon">
                                                <i class="icon-ig"></i>
                                            </a>
                                        </div>
                                    </div>
                                </address>
                                <div class="about-wrap">
                                    <div class="footer-item">
                                        <div class="footer-title">Team</div>
                                        <ul class="list-wrap">
                                            <li class="list-item"><a href="/tw/team.html" class="footer-link-regular">團隊介紹</a></li>
                                            <li class="list-item"><a href="#" target="_blank" class="footer-link-regular">新聞報導</a></li>
                                            <li class="list-item"><a href="https://www.yourator.co/companies/Surprise-Lab" target="_blank" class="footer-link-regular">夥伴招募</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-item">
                                        <div class="footer-title">Project</div>
                                        <ul class="list-wrap">
                                            <li class="list-item"><a href="/tw/ticket.html" class="footer-link-regular">最新計畫</a></li>
                                            <li class="list-item"><a href="/tw/project.html" class="footer-link-regular">過往計畫</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-item">
                                        <div class="footer-title">Language</div>
                                        <ul class="list-wrap">
                                            <li class="list-item"><a href="javascript://" class="footer-link-lang active">繁體中文</a></li>
                                            <li class="list-item"><a href="#" class="footer-link-lang">English</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-lower-outter-wrap">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-lower-wrap">
                                <div class="logo-wrap">
                                    <a href="/tw/index.html" class="js-logo-footer surpri-logo style-white"></a>
                                </div>
                                <div class="patent-wrap">
                                    <span class="footer-copyright">© 2022 驚喜製造 Surprise Lab.</span>
                                    <a href="/tw/terms.html" target="_blank" class="footer-link-regular size-small">隱私權政策</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- mobile -->
        <div class="footer-mobile">

            <div class="footer-upper-outter-wrap">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-upper-wrap">
                                <div class="logo-wrap">
                                    <a href="/tw/index.html" class="js-logo-footer surpri-logo style-white"></a>
                                </div>
                                <ul class="list-wrap">
                                    <li class="list-item"><a href="#" target="_blank" class="footer-link-mobile">新聞報導</a></li>
                                    <li class="list-item"><a href="#" target="_blank" class="footer-link-mobile">夥伴招募</a></li>
                                    <li class="list-item"><a href="/tw/terms.html" target="_blank" class="footer-link-mobile">隱私權政策</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-lower-outter-wrap">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-lower-wrap">
                                <span class="footer-copyright">© 2022 驚喜製造 Surprise Lab.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>

    <!-- left bottom - button -->
    <aside class="fixed-left-bottom js-hint-btn">
        <a href="#" class="surpri-info-btn" data-bs-toggle="modal" data-bs-target="#NoticeModal"><i class="icon-info"></i></a>
    </aside>

    <!-- right bottom - pc button -->
    <aside class="fixed-right-bottom pc-fixed js-pc-cta-btn">
        <a href="/tw/ticket.html" class="surpri-cta-btn pc-style">
            <div class="upper-image-wrap">
                <img src="/SurpriseLabHome/assets/images/general/img_ticket-1.png" alt="cta">
            </div>
            <div class="lower-image-wrap">
                <img src="/SurpriseLabHome/assets/images/general/img_ticket-2.png" alt="cta">
            </div>
        </a>
    </aside>
    <!-- right bottom - mobile button -->
    <aside class="fixed-right-bottom mobile-fixed js-mobile-cta-btn">
        <a href="/tw/ticket.html" class="surpri-cta-btn mobile-style">
            <div class="upper-image-wrap">
                <img src="/SurpriseLabHome/assets/images/general/img_ticket-1.png" alt="cta">
            </div>
            <div class="lower-image-wrap">
                <img src="/SurpriseLabHome/assets/images/general/img_ticket-2.png" alt="cta">
            </div>
        </a>
    </aside>

    @yield('script')
    
</body>
</html>