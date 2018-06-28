            <!-- mobile header -->
            <div class="visible-xs mobile-header clearfix">
                <a href="index.html"><img src="/dark2/images/logo2.png" alt=""></a>
                <a class="mobile-menu-btn" href="#"><i class="fa fa-bars"></i></a>
            </div>
            
           
            <!-- desktop header -->
            <div class="nav-logo hidden-xs">
               <a href="index.html">
                   <img src="/dark2/images/cut1-intro/logo.png" alt="">       
               </a>
            </div>
            <div class="nav-bar hidden-xs">
               
                <ul class="page-list">
                    <a href="about.html">
                        <li @if($key == 'about')class="active"@endif>
                            About
                        </li>
                    </a>
                    <!--a href="pre-order.html">
                        <li @if($key == 'pre-order')class="active"@endif>
                            Pre-sale
                        </li>
                    </a-->
                    <a href="rules.html">
                        <li @if($key == 'rules')class="active"@endif>
                            Rules
                        </li>
                    </a>
                    <!-- <a href="reservation.html">
                        <li @if($key == 'reservation')class="active"@endif>
                            Reservation
                        </li>
                    </a> -->
                    <a href="food.html">
                        <li @if($key == 'food')class="active"@endif>
                            Food
                        </li>
                    </a>
                    <a href="experience.html">
                        <li @if($key == 'experience')class="active"@endif>
                            Experience
                        </li>
                    </a>
                    <a href="press.html">
                        <li @if($key == 'press')class="active"@endif>
                            Press
                        </li>
                    </a>
                 
                    <a href="contact.html">
                        <li @if($key == 'contact')class="active"@endif>
                            Contact
                        </li>
                    </a>
                </ul>
            </div>