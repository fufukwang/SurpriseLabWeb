	       <div class="season-2-footer">
            <div class="footer-box">
                <div class="contact-box">
                    <h4>Contact</h4>
                    <p>
                        02-27192960<br>
                        <a href="mailto:service@surpriselab.com.tw">service@surpriselab.com.tw</a>
                    </p>
                </div>
                <div class="hyper-link">
                    <ul>
                        <a href="https://www.facebook.com/surpriselabtw/">
                            <li><i class="fa fa-facebook"></i></li>
                        </a>
                        <a href="https://www.instagram.com/surpriselabtw/">
                            <li><i class="fa fa-instagram"></i></li>
                        </a>
                    </ul>
                    <ul>
                        <a href="#">
                            <li>Team</li>
                        </a>
                        <a href="http://pse.im/5LS4G">
                            <li>Join Mailing List</li>
                        </a>
                    </ul>
                </div>
                <div class="copyright">Copyright © 2018 驚喜製造</div>
            </div>
        </div>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
                             n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
                             t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
                                                                                                    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '167708867243869');
    fbq('track', 'PageView');


$(function(){
    $('a').each(function(){
        var href = $(this).attr('href');
        if(typeof href !== 'undefined' && href != '#'){
            if(href == 'about.html'){
                $(this).click(function(){
                    fbq('track', 'ViewContent', { 
                        content_name: 'About'
                    });
                });
                
            } else if(href == 'pre-order.html' ){
                $(this).click(function(){ fbq('track', 'AddToCart'); });
            } else if(href.indexOf('backme')>0){
                if(href.indexOf('4380')>0){
                    $(this).click(function(){ fbq('trackCustom', 'normal2'); });
                } else if(href.indexOf('4386')>0){
                    $(this).click(function(){ fbq('trackCustom', 'limit2'); });
                } else if(href.indexOf('4385')>0){
                    $(this).click(function(){ fbq('trackCustom', 'normal4'); });
                } else if(href.indexOf('4387')>0){
                    $(this).click(function(){ fbq('trackCustom', 'limit4'); });
                } else if(href.indexOf('4388')>0){
                    $(this).click(function(){ fbq('trackCustom', 'limit6'); });
                }
            }
        }
    });
});

</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=167708867243869&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->