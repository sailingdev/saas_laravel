<!-- Footer Area-->
<footer class="footer_area section_padding_130_0">
    <div class="container">
        <div class="row">
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Footer Logo-->
                    <div class="footer-logo mb-3">
                        <a href="{{url("/")}}">
                            <img src="{{asset("themes/backend/default/assets/img/logo12.png")}}" alt="">
                        </a>
                    </div>
                    <p>{{Helper::get_option('website_desc', '#1 Marketing Platform for Social Network')}}</p>
                    <!-- Copywrite Text-->
                    <div class="copywrite-text mb-5">
                        <p class="mb-0">&copy; 2020-2021. All rights reserved.</p>
                    </div>

                </div>
            </div>
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Widget Title-->
                    <h5 class="widget-title">Useful Links</h5>
                    <!-- Footer Menu-->
                    <div class="footer_menu">
                        <ul>
                            <li><a href="{{url('/')}}#home">Home</a></li>
                            <li><a href="{{url('/')}}#features">Features</a></li>
                            <li><a href="{{url("login")}}">Login</a></li>
                            <li><a href="{{url("signup")}}">Signup</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Widget Title-->
                    <h5 class="widget-title">Support</h5>
                    <!-- Footer Menu-->
                    <div class="footer_menu">
                        <ul>
                            <li><a href="{{url('/')}}#faq">FAQs</a></li>
                            <li><a href="{{url('privacy_policy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('terms_and_policies')}}">Terms of Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Widget Title-->
                    <h5 class="widget-title">Our Social Networks</h5>
                    <!-- Footer Menu-->
                    <div>
                        <p>Another way you can also search for us on social networks</p>
                    </div>
                    <!-- Footer Social Area-->
                    <div class="footer_social_area">
                        <?php if( Helper::get_option('social_page_facebook', '') ){?>
                        <a href="{{url(__( Helper::get_option('social_page_facebook', '')))}}" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_instagram', '') ){?>
                        <a href="{{url(Helper::get_option('social_page_instagram', ''))}}" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_twitter', '') ){?>
                        <a href="{{url(Helper::get_option('social_page_twitter', '') )}}" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_youtube', '') ){?>
                        <a href="{{url(Helper::get_option('social_page_youtube', ''))}}" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_pinterest', '') ){?>
                        <a href="{{url(Helper::get_option('social_page_pinterest', ''))}}" target="_blank">
                            <i class="fa fa-pinterest"></i>
                        </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
