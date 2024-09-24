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
                <a href="/index.html" class="js-logo-white surpri-logo style-white"></a>
                <a href="/index.html" class="js-logo-dark surpri-logo style-dark"></a>
            </div>
            <ul class="menu-wrap">
                <li class="menu-item @if(Request::segment(2) == 'index.html' || Request::segment(2) == '')active @endif"><a href="/index.html">HOME</a></li>
                <li class="menu-item @if(Request::segment(2) == 'team.html')active @endif"><a href="/team.html">TEAM</a></li>
                <li class="menu-item @if(Request::segment(2) == 'project.html' || Request::segment(2) == 'project')active @endif"><a href="/project.html">PROJECT</a></li>
                <li class="menu-item @if(Request::segment(2) == 'ticket.html')active @endif"><a href="/ticket.html">ON-GOING</a></li>
<<<<<<< HEAD
=======
                <li class="menu-item"><a class="sign-up-link" href="#">SIGN UP</a></li>
>>>>>>> tk-login
            </ul>
        </div>

        <div class="nav-mobile-wrap">
            <div class="mobile-bar-wrap">
                <div class="logo-wrap">
                    <a href="/index.html" class="js-logo-white surpri-logo style-white"></a>
                    <a href="/index.html" class="js-logo-dark surpri-logo style-dark"></a>
                </div>
                <div id="js-mobile-menu-btn" class="menu-btn-wrap"><span></span><span></span></div>
            </div>
            <div id="js-mobile-content" class="mobile-content-wrap">
                <ul class="menu-wrap">
                    <li class="menu-item  @if(Request::segment(2) == 'index.html' || Request::segment(2) == '')active @endif"><a href="/index.html">HOME</a></li>
                    <li class="menu-item  @if(Request::segment(2) == 'team.html')active @endif"><a href="/team.html">TEAM</a></li>
                    <li class="menu-item  @if(Request::segment(2) == 'project.html' || Request::segment(2) == 'project')active @endif"><a href="/project.html">PROJECT</a></li>
                    <li class="menu-item  @if(Request::segment(2) == 'ticket.html')active @endif"><a href="/ticket.html">ON-GOING</a></li>
<<<<<<< HEAD
=======
                    <li class="menu-item"><a class="sign-up-link" href="#">SIGN UP</a></li>
>>>>>>> tk-login
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
                                            <li class="list-item"><a href="/team.html" class="footer-link-regular">團隊介紹</a></li>
                                            <li class="list-item"><a href="#" target="_blank" class="footer-link-regular">新聞報導</a></li>
                                            <li class="list-item"><a href="https://www.yourator.co/companies/Surprise-Lab" target="_blank" class="footer-link-regular">夥伴招募</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer-item">
                                        <div class="footer-title">Project</div>
                                        <ul class="list-wrap">
                                            <li class="list-item"><a href="/ticket.html" class="footer-link-regular">最新計畫</a></li>
                                            <li class="list-item"><a href="/project.html" class="footer-link-regular">過往計畫</a></li>
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
                                    <a href="/index.html" class="js-logo-footer surpri-logo style-white"></a>
                                </div>
                                <div class="patent-wrap">
                                    <span class="footer-copyright">© 2022 驚喜製造 Surprise Lab.</span>
                                    <a href="/terms.html" target="_blank" class="footer-link-regular size-small">隱私權政策</a>
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
                                    <a href="/index.html" class="js-logo-footer surpri-logo style-white"></a>
                                </div>
                                <ul class="list-wrap">
                                    <li class="list-item"><a href="#" target="_blank" class="footer-link-mobile">新聞報導</a></li>
                                    <li class="list-item"><a href="#" target="_blank" class="footer-link-mobile">夥伴招募</a></li>
                                    <li class="list-item"><a href="/terms.html" target="_blank" class="footer-link-mobile">隱私權政策</a></li>
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
        <a href="/ticket.html" class="surpri-cta-btn pc-style">
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
        <a href="/ticket.html" class="surpri-cta-btn mobile-style">
            <div class="upper-image-wrap">
                <img src="/SurpriseLabHome/assets/images/general/img_ticket-1.png" alt="cta">
            </div>
            <div class="lower-image-wrap">
                <img src="/SurpriseLabHome/assets/images/general/img_ticket-2.png" alt="cta">
            </div>
        </a>
    </aside>

    <!-- sign up modal -->
    <div class="modal fade cus-modal" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 mb-4 border-0">
                    <h5 class="modal-title" id="exampleModalLabel"><b>登入</b></h5>
                    <div class="google-login"><b>快速登入</b></div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <form action="">
                        <div class="input-group">
                            <span class="input-group-text p-0 me-3 bg-transparent border-0"><b>帳號</b></span>
                            <input type="text" class="form-control border-0 bg-transparent">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text p-0 me-3 bg-transparent border-0"><b>密碼</b></span>
                            <input type="text" class="form-control border-0 bg-transparent">
                        </div>
                        <div class="d-flex flex-wrap justify-content-center align-items-start text-center mt-5">
                            <button type="button" class="btn btn-primary mx-2 mb-2 rounded-pill"><b>註冊</b></button>
                            <div class="mx-2 mb-2">
                                <button type="submit" class="btn btn-secondary rounded-pill"><b>登入</b></button>
                                <div><span class="signup-forget">忘記密碼</span></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cus-modal" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 mb-4 border-0">
                    <h5 class="modal-title" id="exampleModalLabel"><b>註冊</b></h5>
                    <div class="google-login"><b>快速登入</b></div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <form action="">
                        <div class="input-group">
                            <span class="input-group-text p-0 me-3 bg-transparent border-0"><b>帳號</b></span>
                            <input type="text" class="form-control border-0 bg-transparent" placeholder="輸入可用信箱，請避免使用Yahoo、Hotmail信箱">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text p-0 me-3 bg-transparent border-0"><b>密碼</b></span>
                            <input type="text" class="form-control border-0 bg-transparent" placeholder="6位以上英數混合">
                        </div>
                        <div class="d-flex flex-wrap justify-content-center align-items-start text-center mt-5">
                            <button type="button" class="btn btn-primary mx-2 mb-2 rounded-pill"><b>已有帳號，登入</b></button>
                            <div class="mx-2 mb-2">
                                <button type="submit" class="btn btn-secondary rounded-pill"><b>註冊</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @yield('script')
    
</body>
</html>