@extends('layouts.app')
@section("specific_css")
    <style>
        .welcome_text_area h2 {
            color: #383838;
            font-size: 40px;
            font-weight: 700 !important;
            margin-bottom: 0;
        }

        .welcome_text_area p{
            color: #383838;
            font-size: 20px;
            line-height: 1.4;
        }

        .animation-text{
            line-height: 1.3;
        }

        .hero-barishal.welcome_area .welcome_text_area {
            padding-top: 90px;
        }

        .pr-main{
            margin: 25px 0 0;
        }

        /* ==== Slider Style === */
        .Modern-Slider .slick-dots li button{display:none;}
        .Modern-Slider .item h5{
            margin:0;
            padding:0;
            font:15px/30px RalewayR;
            max-width:600px;
            overflow:hidden;
            height:60px;
            animation:fadeOutRight 1s both;
        }

        .image-Slider .slick-dots li button{display:none;}
        .image-Slider .item image{
            margin:0;
            padding:0;
            max-width:600px;
            overflow:hidden;
            height:60px;
            animation:fadeOutRight 1s both;
        }

        /*end slider*/

        .flex-box {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-bottom: 10px;
        }

        .detail_box {
            flex: 0 0 30%;
            padding: 50px 0 0;
        }
    </style>
@endsection

@section('content')
    {{--Social media Key--}}
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
                        <div class="image-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-1.png')}}" alt=""  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/home-hero-main.webp')}}" alt=""  />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-8.jpg')}}" alt=""  />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/coming-soon.png')}}" alt=""  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/thank-you.png')}}" alt=""  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/maintenence.jpg')}}" alt=""  />
                                        </div>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="item">--}}
{{--                                <div class="img-fill">--}}
{{--                                    <div class="info">--}}
{{--                                        <div>--}}
{{--                                            <img width="600" src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-3.png')}}" alt=""  />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--Social--}}
    <section style="padding-bottom: 40px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6"  style="border-right: 1px solid rgba(0,0,0,.2);">
                    <div class="left">
                        <div class="text-center" data-aos="fade-right">
                            <img src="{{asset('themes/social_logo/schedule-icon.webp')}}" width="65px" height="65px" alt="schedule-icon">
                            <h2 class="text-center"> Schedule posts </h2>
                            <h4 class="text-center">to top networks</h4>
                        </div>

                        <div class="flex-box container">
                            <div class="detail_box text-center" data-aos="fade-right">
                                <img width="58" src="{{asset('themes/social_logo/facebook-new.svg')}}" alt="Facebook">
                                <h5 class="text-center">Facebook</h5>
                            </div>

                            <div class="detail_box text-center" data-aos="fade-right">
                                <img width="58p" src="{{asset('themes/social_logo/instagram-new.svg')}}" alt="Instagram">
                                <h5 class="text-center">Instagram</h5>
                            </div>

                            <div class="detail_box text-center" data-aos="fade-right">
                                <img width="58" src="{{asset('themes/social_logo/twitter-new.svg')}}" alt="Twitter">
                                <h5 class="text-center">Twitter</h5>
                            </div>

                            <div class="detail_box text-center" data-aos="fade-right">
                                <img width="58" src="{{asset('themes/social_logo/linkedin-new.svg')}}" alt="LinkedIn">
                                <h5 class="text-center">LinkedIn</h5>
                            </div>

                            <div class="detail_box text-center" data-aos="fade-right">
                                <img width="58" src="{{asset('themes/social_logo/pinterest-new.svg')}}" alt="Pinterest">
                                <h5 class="text-center">Pinterest</h5>
                            </div>

                            <div class="detail_box text-center" data-aos="fade-right">
                                <img width="58" src="{{asset('themes/social_logo/TikTok.svg')}}" alt="TikTok">
                                <h5 class="text-center">TikTok</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="right">
                        <div class="text-center" data-aos="fade-left">
{{--                            <img src="{{asset('themes/social_logo/curate-icon.webp')}}" width="48px" height="65px" alt="schedule-icon">--}}
                            <h2 class="text-center"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </h2>
                            <h4 class="text-center">Etiam ultricies nisi vel augue.</h4>
                        </div>

                        <div class="flex-box text-center container" data-aos="fade-left">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                            pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec
                            pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                            rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                            mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
                            Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat
                            vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                            tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean
                            imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                            Nam eget dui.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--Features section--}}
    <section class="about_area" style="padding-top: 90px" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading text-center" data-aos="fade-right">
                        <h3>Features at a glance</h3>
                        {{--<div class="line"></div>--}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-sm-8 col-md-4 col-lg-4">
                    <div class="about_product_discription">
                        <div class="row">
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-left">
                                    <div class="feature_icon">
                                        <i class="lni lni-calendar"></i>
                                    </div>
                                    <h6>Content Planner</h6>
                                    <p>
                                        Stay ahead of the competition. Visually design your Content,
                                        weeks and months in advance.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-left">
                                    <div class="feature_icon">
                                        <i class="lni lni-users"></i>
                                    </div>
                                    <h6>Team Collaboration</h6>
                                    <p>Organize your teams and work in private, dedicated Workspaces. Don't get your jobs and clients mixed up.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-4 col-lg-4">
                    <div class="about_product_discription">
                        <div class="row">
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon"><i class="lni lni-pencil"></i></div>
                                    <h6>Content publisher</h6>
                                    <p>Publish your social media content at scale. Write once, publish everywhere.</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon">
                                        <i class="lni lni-bubble"></i>
                                    </div>
                                    <h6>Audience Engagement</h6>
                                    <p>
                                        Postly inbox empowers you to view customer comments and reactions and respond
                                        on platforms from a single view.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-4 col-lg-4">
                    <div class="about_product_discription">
                        <div class="row">
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-left">
                                    <div class="feature_icon">
                                        <i class="lni lni-text-format"></i>
                                    </div>
                                    <h6>Al Writer</h6>
                                    <p>Write faster and better marketing copies, generate Hashtags among other things.</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon"><i class="lni lni-bar-chart"></i></div>
                                    <h6>Analytics</h6>
                                    <p>Carefully designed trends and insights report guiding your business decisions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_heading text-center mt-50" data-aos="fade-right">
            <a class="btn wimax-btn btn-2" href="">See All Features</a>
        </div>
    </section>

    {{--get started for free section--}}
    <section class="using_benefits_area section_padding_130" id="benefits">
        <div class="benefit-top-thumbnail"><img height="100" src="{{ asset('themes/frontend/wimax/assets/img/core-img/video-bottom.png')}}" alt=""></div>
        <div class="benefit-bottom-thumbnail"><img height="100" src="{{ asset('themes/frontend/wimax/assets/img/core-img/benefit-bottom.png')}}" alt=""></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="white text-center" data-aos="fade-right">
                        <h5 class="text-white">SOCIAL MEDIA MARKETING</h5>
                        <h3 class="text-white">One easy-to-use tool to schedule better posts</h3>
                        <h5 class="text-white">Schedule the best content in your industry.</h5>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="text-center" data-aos="fade-left">
                        <a class="btn wimax-btn btn-4">GET STARTED</a>
                        <p class="text-white">get started for free section, go to signup.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--Extra Performance--}}
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

    {{--Our Happy Clients--}}
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

    {{--Frequently Questions--}}
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
                        @foreach($faqs as $key => $faq)
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="card-header" id="heading{{ $key }}">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">{{$faq->name}}<span class="lni-chevron-up"></span></h6>
                            </div>
                            <div class="collapse" id="collapse{{ $key }}" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body">
                                    {!! htmlspecialchars_decode( $faq->content , ENT_QUOTES) , false !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Sed ut perspiciatis--}}
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

@section('specific_js')
<script type="text/javascript" src="{{asset("plugins/slick.js")}}"></script>
<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 2000
    });
</script>
<script>
    $(document).ready(function ($){
        $(".Modern-Slider").slick({
            autoplay:true,
            autoplaySpeed:3000,
            speed:600,
            slidesToShow:1,
            slidesToScroll:1,
            pauseOnHover:false,
            dots:true,
            pauseOnDotsHover:true,
            cssEase:'linear',
            // fade:true,
            draggable:false,
            prevArrow: false,
            nextArrow: false,
        });

        $(".image-Slider").slick({
            autoplay:true,
            autoplaySpeed:6000,
            speed:800,
            slidesToShow:1,
            slidesToScroll: 1,
            pauseOnHover:false,
            dots:true,
            pauseOnDotsHover:true,
            cssEase:'linear',
            // fade:true,
            draggable:false,
            prevArrow: false,
            nextArrow: false,
            variableWidth: false,

        });
    })
</script>
@endsection
