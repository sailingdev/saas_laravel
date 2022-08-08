@extends('layouts.app')
@section('content')
    <section class="hero-barishal welcome_area" id="home">
        <div class="container" style="height: 90%">
            <div class="row justify-content-between align-items-center" style="height: 90%">
                <div class="col-md-5" data-aos="fade-right">
                    <div class="welcome_text_area">
                        <h2 class="" data-wow-delay="0.2s">
                            Is your
                            <br>
                            Social media
                        </h2>
                        <div class="Modern-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div>
                                            <h2 class="animation-text">easy to manage?</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div>
                                            <h2 class="animation-text">driving traffic?</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div>
                                            <h2 class="animation-text">reaching people?</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div>
                                            <h2 class="animation-text">getting Likes?</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->

                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div>
                                            <h2 class="animation-text">generating sales?</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->

                        </div>

                        <div class="pr-main">
                            <p data-wow-delay="0.3s">Post Planner helps you schedule the best content in your industry.</p>
                            <p class="" data-wow-delay="0.3s">Automatically.</p>
                            <p class="" data-wow-delay="0.3s">Every day.</p>
                            <a class="btn wimax-btn mt-30 wow fadeInUp" href="{{ url("signup") }}" data-wow-delay="0.4s">{{"Start A Free Trial"}}</a>
                            <a class="btn wimax-btn btn-2 mt-30 ml-2 wow fadeInUp" href="#features" data-wow-delay="0.5s">{{"Learn More"}}</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <div class="welcome_area_thumb text-center wow fadeInUp" data-wow-delay="0.2s">
                        <img src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-1.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="welcome-border"></div>
        </div>
    </section>

    <section class="section_padding_0_130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6"  style="border-right: 1px solid rgba(0,0,0,.2);">
                    <div class="left">
                        <div class="text-center">
                            <img src="{{asset('themes/social_logo/schedule-icon.webp')}}" width="65px" height="65px" alt="schedule-icon">
                        </div>
                        <h2 class="text-center"> Schedule posts </h2>
                        <h4 class="text-center">to top networks</h4>

                        <div class="flex-box">
                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/facebook-new.svg')}}" alt="Facebook">
                                <h5 class="text-center">Facebook</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58p" src="{{asset('themes/social_logo/instagram-new.svg')}}" alt="Instagram">
                                <h5 class="text-center">Instagram</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/twitter-new.svg')}}" alt="Twitter">
                                <h5 class="text-center">Twitter</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/linkedin-new.svg')}}" alt="LinkedIn">
                                <h5 class="text-center">LinkedIn</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/pinterest-new.svg')}}" alt="Pinterest">
                                <h5 class="text-center">Pinterest</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/TikTok.svg')}}" alt="TikTok">
                                <h5 class="text-center">TikTok</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="right">
                        <div class="text-center">
                            <img src="{{asset('themes/social_logo/curate-icon.webp')}}" width="48px" height="65px" alt="schedule-icon">
                        </div>
                        <h2 class="text-center"> Curate content </h2>
                        <h4 class="text-center">from top sources</h4>

                        <div class="flex-box">
                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/facebook-new.svg')}}" alt="Facebook">
                                <h5 class="text-center">Facebook</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58p" src="{{asset('themes/social_logo/google.svg')}}" alt="Instagram">
                                <h5 class="text-center">Google</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/twitter-new.svg')}}" alt="Twitter">
                                <h5 class="text-center">Twitter</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/rss.svg')}}" alt="LinkedIn">
                                <h5 class="text-center">RSS</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/Reddit_new.svg')}}" alt="Pinterest">
                                <h5 class="text-center">Reddit</h5>
                            </div>

                            <div class="detail_box text-center">
                                <img width="58" src="{{asset('themes/social_logo/Giphy.webp')}}" alt="TikTok">
                                <h5 class="text-center">Giphy</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_area section_padding_130" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading text-center" data-aos="fade-right">
                        <h6>{{"Using Benefits"}}</h6>
                        <h3>{{"It is a long established fact that a reader will be distracted."}}</h3>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="about_product_discription">
                        <div class="row">
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-left">
                                    <div class="feature_icon"><i class="lni lni-cloud-download"></i></div>
                                    <h6>{{"No downloads"}}</h6>
                                    <p>{{"Contrary to popular belief, Lorem Ipsum is not simply random text Lorem Ipsum comes from sections. totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo."}}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-left">
                                    <div class="feature_icon"><i class="lni lni-alarm-clock"></i></div>
                                    <h6>{{"Saving Time"}}</h6>
                                    <p>{{"There are many variations of passages of Lorem Ipsum available, but the majority. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione."}}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-left">
                                    <div class="feature_icon"><i class="lni lni-save"></i></div>
                                    <h6>{{"Schedule posts"}}</h6>
                                    <p>{{"This book is a treatise on the theory of ethics, very popular during the Renaissance. but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful."}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="about_product_thumb text-center my-5 my-lg-0" data-aos="zoom-in-up"><img src="{{ asset('themes/frontend/wimax/assets/img/bg-img/features-img.png')}}" alt=""></div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="about_product_discription">
                        <div class="row">
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon"><i class="lni lni-bar-chart"></i></div>
                                    <h6>{{"Analytics performance"}}</h6>
                                    <p>{{"The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those. hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."}}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon"><i class="lni lni-users"></i></div>
                                    <h6>{{"Influencer Marketing"}}</h6>
                                    <p>{{"The generated Lorem Ipsum is therefore always free from repetition, injected humour etc. On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms."}}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon"><i class="lni lni-lock"></i></div>
                                    <h6>{{"Safe and Secure"}}</h6>
                                    <p>{{"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque. necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente."}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="using_benefits_area section_padding_130" id="benefits">
        <div class="benefit-top-thumbnail"><img src="{{ asset('themes/frontend/wimax/assets/img/core-img/video-bottom.png')}}" alt=""></div>
        <div class="benefit-bottom-thumbnail"><img src="{{ asset('themes/frontend/wimax/assets/img/core-img/benefit-bottom.png')}}" alt=""></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading white text-center" data-aos="fade-right">
                        <h6>{{"The Bright Feature"}}</h6>
                        <h3>{{"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled."}}</h3>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single_benifits d-flex" data-aos="fade-left">
                        <div class="icon_box"><i class="lni lni-heart-filled"></i></div>
                        <div class="benifits_text">
                            <h5>{{"Visually plan and schedule your social media campaigns"}}</h5>
                            <p>{{"Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur."}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single_benifits d-flex" data-aos="fade-left">
                        <div class="icon_box"><i class="lni lni-blackboard"></i></div>
                        <div class="benifits_text">
                            <h5>{{"Measure and report on the performance of your content"}}</h5>
                            <p>{{"denouncing pleasure and praising pain was born and I will give you a complete account of the system."}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single_benifits d-flex" data-aos="fade-left">
                        <div class="icon_box"><i class="lni lni-network"></i></div>
                        <div class="benifits_text">
                            <h5>{{"Monitor engagement across all your social channels"}}</h5>
                            <p>{{"cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus"}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_app_area section_padding_130">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="about_image mb-5 mb-md-0">
                        <div class="big_thumb" data-aos="fade-left"><img src="{{ asset('themes/frontend/wimax/assets/img/bg-img/googleAds.svg')}}" alt=""></div>
                        <!--<div class="small_thumb wow fadeInLeft" data-wow-delay="0.4s"><img src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-3.png')}}" alt=""></div>-->
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="about_us_text_area" data-aos="fade-right">
                        <h3>{{"Finibus Bonorum Malorum"}}</h3>
                        <p>{{"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident"}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="border-top"></div>
    </div>
    <section class="get-started-area section_padding_130_0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading text-center" data-aos="fade-left">
                        <h3>{{"The standard Lorem Ipsum passage"}}</h3>
                        <p>{{"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore."}}</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="total_subscriber_text text-center" data-aos="fade-right">
                        <h4 class="mb-0">{{"Features of Liberalized Exchange Rate Management System"}}</h4><a class="btn wimax-btn mt-5" href="{{ url("signup") }}">{{"Try it now"}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cta-thumbnail section_padding_130_0" data-aos="zoom-in-up"><img class="w-100" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/cta.jpg')}}" alt=""></div>
                </div>
            </div>
        </div>
    </section>

    <section class="work_process_area section_padding_130_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading text-center" data-aos="fade-left">
                        <h3>{{"Extra Performance"}}</span></h3>
                        <p>{{"Some extra core features available"}}</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-sm-4 col-md-3">
                    <div class="single_work_step" data-aos="fade-right">
                        <div class="step-icon"><i class="lni lni-bookmark-alt"></i></div>
                        <h5>{{"Watermark"}}</h5>
                        <p>{{"Easily add watermark to your images with intuitive interface"}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                    <div class="single_work_step" data-aos="fade-left">
                        <div class="step-icon"><i class="lni lni-files"></i></div>
                        <h5>{{"File manager"}}</h5>
                        <p>{{"Authorized dealers are free to surrendered to them for sale."}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                    <div class="single_work_step" data-aos="fade-right">
                        <div class="step-icon"><i class="lni lni-network"></i></div>
                        <h5>{{"Group manager"}}</h5>
                        <p>{{"Managing all of your accounts in groups saves you time"}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="border-top"></div>
    </div>
    <section class="testimonial_area section_padding_130" id="rating">
        <div class="testimonial-top-thumbnail"><img src="{{ asset('themes/frontend/wimax/assets/img/core-img/testimonial-top.png')}}" alt=""></div>
        <div class="testimonial-bottom-thumbnail"><img src="{{ asset('themes/frontend/wimax/assets/img/core-img/testimonial-bottom.png')}}" alt=""></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading white text-center" data-aos="fade-left">
                        <h3>{{"Our Happy Clients"}}</h3>
                        <p>{{"Which one of the following groups of items is included in India’s foreign-exchange reserves."}}</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-9 col-lg-7">
                    <div class="card border-0 p-4 p-sm-5 testimonials owl-carousel" data-aos="fade-up">
                        <div class="single_testimonial_area text-center">
                            <div class="testimonial_author_thumb"><img src="{{ asset('themes/frontend/wimax/assets/img/advisor-img/testimonial-1.jpg')}}" alt=""></div>
                            <div class="testimonial_text">
                                <p>{{"A sample set of clinical rules was identified from the relevant literature."}}</p>
                                <div class="rating"><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i></div>
                                <div class="testimonial_author_name">
                                    <h5>{{"Kodil John"}}</h5>
                                    <h6>{{"CEO & Founder, Designing World"}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="single_testimonial_area text-center">
                            <div class="testimonial_author_thumb"><img src="{{ asset('themes/frontend/wimax/assets/img/advisor-img/testimonial-2.jpg')}}" alt=""></div>
                            <div class="testimonial_text">
                                <p>{{"Easy scheduling, simple time saving and lots of features rich"}}</p>
                                <div class="rating"><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i></div>
                                <div class="testimonial_author_name">
                                    <h5>{{"Jannatun Lima"}}</h5>
                                    <h6>{{"CEO & Founder, Cigna"}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="single_testimonial_area text-center">
                            <div class="testimonial_author_thumb"><img src="{{ asset('themes/frontend/wimax/assets/img/advisor-img/testimonial-1.jpg')}}" alt=""></div>
                            <div class="testimonial_text">
                                <p>{{"Very well organized tool with stunning high quality design. Thank you so much!"}}</p>
                                <div class="rating"><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i class="lni-star-filled"></i></div>
                                <div class="testimonial_author_name">
                                    <h5>{{"Jerry Terry"}}</h5>
                                    <h6>{{"The resulting method, called the Logical Elements Rule Method, consists of 7 steps"}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if( !empty($faqs) ){?>
    <div class="faq_area section_padding_130" id="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s">
                        <h3>{{"Frequently Questions"}}</h3>
                        <p>{{"A method is presented to assist in assessing clinical rules for their amenability to decision support, and formalizing the rules for implementation"}}</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-lg-8">
                    <div class="accordion faq-accordian" id="faqAccordion">

                        {{--                        <?php foreach ($faqs as $key => $faq):?>--}}
                        {{--                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s">--}}
                        {{--                            <div class="card-header" id="heading{{ $key }}">--}}
                        {{--                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">{{$faq->name}}<span class="lni-chevron-up"></span></h6>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="collapse" id="collapse{{ $key }}" aria-labelledby="headingOne" data-parent="#faqAccordion">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    {{ htmlspecialchars_decode( $faq->content , ENT_QUOTES) , false}}--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <?php endforeach?>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <div class="download_app_area section_padding_130_80" id="download">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading white text-center" data-aos="fade-left">
                        <h3>{{"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium"}}</h3>
                        <div class="line bg-white"></div>
                        <a class="btn wimax-btn mt-30" href="{{ url("signup") }}">{{"Start A Free Trial"}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
