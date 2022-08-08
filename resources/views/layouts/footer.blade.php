<!-- Footer Area-->
<footer class="footer_area section_padding_130_0">
    <div class="container">
        <div class="row">
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Footer Logo-->
                    <div class="footer-logo mb-3"><a href="<?php __( asset("") )?>"><img src="<?php __( Helper::get_option('website_black', asset("inc/themes/backend/default/assets/img/logo-black.png")) )?>" alt=""></a></div>
                    <p><?php __( Helper::get_option('website_desc', '#1 Marketing Platform for Social Network') )?></p>
                    <!-- Copywrite Text-->
                    <div class="copywrite-text mb-5">
                        <p class="mb-0"><?php __("&copy; 2020-2021. All rights reserved.")?></p>
                    </div>

                </div>
            </div>
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Widget Title-->
                    <h5 class="widget-title"><?php __("Useful Links")?></h5>
                    <!-- Footer Menu-->
                    <div class="footer_menu">
                        <ul>
                            <li><a href="<?php __( asset("") )?>#home"><?php __("Home")?></a></li>
                            <li><a href="<?php __( asset("") )?>#features"><?php __("Features")?></a></li>
                            <li><a href="<?php __( asset("login") )?>"><?php __("Login")?></a></li>
                            <li><a href="<?php __( asset("signup") )?>"><?php __("Signup")?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Widget Title-->
                    <h5 class="widget-title"><?php __("Support")?></h5>
                    <!-- Footer Menu-->
                    <div class="footer_menu">
                        <ul>
                            <li><a href="<?php __( asset("") )?>#faq"><?php __("FAQs")?></a></li>
                            <li><a href="<?php __( asset('privacy_policy') )?>"><?php __("Privacy Policy")?></a></li>
                            <li><a href="<?php __( asset('terms_and_policies') )?>"><?php __("Terms of Services")?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Widget-->
            <div class="col-12 col-sm-6 col-lg">
                <div class="single-footer-widget section_padding_0_130">
                    <!-- Widget Title-->
                    <h5 class="widget-title"><?php __("Our Social Networks")?></h5>
                    <!-- Footer Menu-->
                    <div>
                        <p><?php __("Another way you can also search for us on social networks")?></p>
                    </div>
                    <!-- Footer Social Area-->
                    <div class="footer_social_area">
                        <?php if( Helper::get_option('social_page_facebook', '') ){?>
                        <a href="<?php __( Helper::get_option('social_page_facebook', '') )?>" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_instagram', '') ){?>
                        <a href="<?php __( Helper::get_option('social_page_instagram', '') )?>" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_twitter', '') ){?>
                        <a href="<?php __( Helper::get_option('social_page_twitter', '') )?>" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_youtube', '') ){?>
                        <a href="<?php __( Helper::get_option('social_page_youtube', '') )?>" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <?php }?>
                        <?php if( Helper::get_option('social_page_pinterest', '') ){?>
                        <a href="<?php __( Helper::get_option('social_page_pinterest', '') )?>" target="_blank">
                            <i class="fa fa-pinterest"></i>
                        </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
