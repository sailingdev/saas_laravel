@extends('layouts.app')
@section("specific_css")
    <style>
        .welcome_text_area h2 {
            color: #383838;
            font-size: 40px;
            font-weight: 700 !important;
            margin-bottom: 0;
        }

        .welcome_text_area p {
            color: #383838;
            font-size: 20px;
            line-height: 1.4;
        }

        .animation-text {
            line-height: 1.3;
        }

        .hero-barishal.welcome_area .welcome_text_area {
            padding-top: 90px;
        }

        .pr-main {
            margin: 25px 0 0;
        }

        /* ==== Slider Style === */
        .Modern-Slider .slick-dots li button {
            display: none;
        }

        .Modern-Slider .item h5 {
            margin: 0;
            padding: 0;
            font: 15px/30px RalewayR;
            max-width: 600px;
            overflow: hidden;
            height: 60px;
            animation: fadeOutRight 1s both;
        }

        .image-Slider .slick-dots li button {
            display: none;
        }

        .image-Slider .item image {
            margin: 0;
            padding: 0;
            max-width: 600px;
            overflow: hidden;
            height: 60px;
            animation: fadeOutRight 1s both;
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

        .item img {
            width: 650px;
        }

        .round-icon {
            position: relative;
            z-index: 1;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            font-size: 3rem;
            margin: 0 auto 1rem;
            line-height: 1;
            width: 80px;
            height: 80px;
            background-color: #f5f5ff;
            border-radius: 50%;
        }

        .round-icon i {
            line-height: 80px;
            font-size: 3rem;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-color: transparent;
            background-image: -webkit-gradient(linear, left top, right top, from(#e24997), to(#2d2ed4));
            background-image: linear-gradient(90deg, #e24997, #2d2ed4);
        }

    </style>
@stop

@section('content')

    {{--    Social media Key--}}
    <section class="hero-barishal welcome_area" id="home">
        <div class="container" style="height: 90%">
            <div class="row justify-content-between align-items-center" style="height: 90%">
                <div class="col-md-6" data-aos="fade-right">
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
                            <p data-wow-delay="0.3s">Post Planner helps you schedule the best content in your
                                industry.</p>
                            <p class="" data-wow-delay="0.3s">Automatically.</p>
                            <p class="" data-wow-delay="0.3s">Every day.</p>
                            <a class="btn wimax-btn mt-30 wow fadeInUp" href="{{ url("signup") }}"
                               data-wow-delay="0.4s">{{"Get Started for free"}}</a>
                        </div>
                    </div>
                    <div class="pr-main row" style="padding: 0">
                        <div class="col-12 col-md-2" style="padding: 0;">
                                <span style="font-size: 10pt">
                                <i class="lin lni-check-mark-circle" style="font-size: 2vh"></i>
                                Free plan
                            </span>
                        </div>

                        <div class="col-12 col-md-4" style="padding: 0">
                                <span style="font-size: 10pt">
                                <i class="lin lni-check-mark-circle" style="font-size: 2vh"></i>
                                No credit card needed
                            </span>
                        </div>
                        <div class="col-12 col-md-4" style="padding: 0">
                                <span style="font-size: 10pt">
                                    <i class="lin lni-check-mark-circle" style="font-size: 2vh"></i>
                                    Setup in minutes
                                </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-left" style="padding-top: 9%">
                    <div class="welcome_area_thumb text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="image-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-1.png')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/home-hero-main.webp')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-8.jpg')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/coming-soon.png')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/thank-you.png')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div align="center">
                                            <img sizes="100vw"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/maintenence.jpg')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill">
                                    <div class="info">
                                        <div>
                                            <img width="600"
                                                 src="{{ asset('themes/frontend/wimax/assets/img/bg-img/hero-3.png')}}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--    <section>--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-12 col-sm-12 col-md-12">--}}
    {{--                    <div class="text-center" data-aos="fade-right">--}}
    {{--                        <img src="{{asset('themes/social_logo/schedule-icon.webp')}}" width="65px" height="65px" alt="schedule-icon">--}}
    {{--                        <h2 class="text-center"> Schedule posts </h2>--}}
    {{--                        <h4 class="text-center">to top networks</h4>--}}
    {{--                    </div>--}}

    {{--                    <div class="flex-box container">--}}
    {{--                        <div class="detail_box text-center" data-aos="fade-right">--}}
    {{--                            <img width="58" src="{{asset('themes/social_logo/facebook-new.svg')}}" alt="Facebook">--}}
    {{--                            <h5 class="text-center">Facebook</h5>--}}
    {{--                        </div>--}}

    {{--                        <div class="detail_box text-center" data-aos="fade-right">--}}
    {{--                            <img width="58p" src="{{asset('themes/social_logo/instagram-new.svg')}}" alt="Instagram">--}}
    {{--                            <h5 class="text-center">Instagram</h5>--}}
    {{--                        </div>--}}

    {{--                        <div class="detail_box text-center" data-aos="fade-right">--}}
    {{--                            <img width="58" src="{{asset('themes/social_logo/twitter-new.svg')}}" alt="Twitter">--}}
    {{--                            <h5 class="text-center">Twitter</h5>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}



    {{--    benifit section--}}
    <section style="padding-bottom: 40px;">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="text-center" data-aos="fade-right">
                        <h5>SOCIAL MEDIA MARKETING</h5>
                        <h3>One easy-to-use tool to schedule better posts</h3>
                        <h5>Schedule the best content in your industry.</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-4">
                    <div class="left">
                        <div class="text-center" data-aos="fade-right">

                            <div class="text-center" data-aos="fade-right">
                                <div class="round-icon">
                                    <i class="lni lni-alarm-clock" style="font-size: 7vh"></i>
                                </div>
                                <h5 class="text-center"> Schedule posts </h5>
                                <h6 class="text-center">to top networks</h6>
                            </div>


                            <div class="container mb-2">
                                <div class="row">
                                    <div class="col-md-4 text-center" data-aos="fade-right">
                                        <img width="40" src="{{asset('themes/social_logo/facebook-new.svg')}}"
                                             alt="Facebook">
                                        <span>facebook</span>
                                    </div>

                                    <div class="col-md-4 text-center" data-aos="fade-right">
                                        <img width="40" src="{{asset('themes/social_logo/instagram-new.svg')}}"
                                             alt="Instagram">
                                        <span>instagram</span>
                                    </div>

                                    <div class="col-md-4 text-center" data-aos="fade-right">
                                        <img width="40" src="{{asset('themes/social_logo/twitter-new.svg')}}"
                                             alt="Twitter">
                                        <span>twitter</span>
                                    </div>
                                </div>
                            </div>

                            {{--                            <h5 class="text-center">Strategic Social Media Planning</h5>--}}
                        </div>

                        <div class="flex-box container">
                            Social media is all about strategy. Looking at posting times, audience,
                            and what kind of content you are putting out is important in creating a
                            successful social media presence. Content scheduling allows you to get a
                            birds-eye view of the content you publish.

                            Another benefit of content scheduling is that you can plan out promotions,
                            ads, and posts in advance to make sure they all correspond and are sent
                            out in a timely manner. This will enable you to reach your specific
                            target market by scheduling all posts and social media updates during
                            selective times during your promotion. By planning out your promotions
                            in advance, you have a better chance of reaching more of your target market,
                            staying on track with posts, and creating a successful promotion for
                            your business.

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-4">
                    <div class="right">
                        <div class="text-center" data-aos="fade-left">
                            <div class="round-icon">
                                <i class="lni lni-cloud" style="font-size: 7vh"></i>
                            </div>
                            <h5 class="text-center">Stay Organized</h5>
                        </div>

                        <div class="flex-box container" data-aos="fade-left">
                            Scheduling out your content in advance also helps you to
                            stay organized. If you are working with a marketing team
                            or graphic designers, you will be able to create or request
                            graphics beforehand, and your design team will be grateful
                            to have more time to work on them. This will also allow you
                            to write down any important dates and holidays in advance so
                            you don’t forget to post for them. National Donut Day may not
                            seem important but plan a day to grab some donuts for your team,
                            take a picture, and share it on Donut Day to show off your business's
                            personality and really get in touch with your followers. People
                            will “eat it up”!
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-md-4">
                    <div class="right">
                        <div class="text-center" data-aos="fade-left">
                            <div class="round-icon">
                                <i class="lni lni-pencil" style="font-size: 7vh"></i>
                            </div>
                            <h5 class="text-center">Write While You Feel Creative</h5>
                        </div>

                        <div class="flex-box container" data-aos="fade-left">
                            It is a proven fact that certain times of the day are more conducive to creative writing.
                            The benefit of creating all of your content at once is that you can select a time when
                            you are feeling most creative to sit down and create relevant, diverse, and authentic
                            content for your business.

                            *Pro Tip: We follow the 70-20-10 Rule for content creation, meaning 70% of the content
                            should be interesting, inspiring, or entertaining, and useful for the primary base of
                            your audience. 20% of your content should be concentrated on promotional offerings,
                            whether it be an invitation to an event, a request for donation, or some other
                            call-to-action. 10% of your content should be reposted or shared from other accounts,
                            blogs, or content sources, allowing you to show that your Social Media strategy actually
                            is social; building trust and a sense of reciprocity with your followers and influencers.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-sm-12 text-center">
                    <a class="btn wimax-btn btn-2 ml-2 wow fadeInUp" href="#" data-wow-delay="0.5s">{{"Learn More"}}</a>
                </div>
            </div>

        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <picture>
                        <img src="{{asset('themes/frontend/wimax/assets/img/bg-img/instagram-reels-scheduling.webp')}}">
                    </picture>
                </div>
                <div class="col-md-4">
                    <h4 class="" style="color: #747794">It’s here! Schedule Instagram Reels on Later</h4>
                    <p>
                        Can you post Reels on Later? Yup! Visually plan
                        & schedule Reels to auto-publish whenever you want.
                        Moderate & reply to comments using the Conversations tool,
                        and get detailed Reels Analytics to optimize all of your posts.
                    </p>
                </div>
            </div>


            <div class="row" style="margin-top: 8%">
                <div class="col-md-4">
                    <h4 class="" style="color: #747794">Auto publish TikTok posts, Instagram feed posts, & more</h4>
                    <p>
                        Can you post Reels on Later? Yup! Visually plan & schedule Reels to
                        auto-publish whenever you want. Moderate & reply to comments using
                        the Conversations tool, and get detailed Reels Analytics to optimize
                        all of your posts.
                    </p>
                </div>

                <div class="col-md-8">
                    <picture>
                        <img src="{{asset('themes/frontend/wimax/assets/img/bg-img/home-auto-publish.webp')}}">
                    </picture>
                </div>
            </div>


            <div class="row" style="margin-top: 8%">
                <div class="col-md-8">
                    <picture>
                        <img src="{{asset('themes/frontend/wimax/assets/img/bg-img/Hp--UGC-d9cb0459.webp')}}">
                    </picture>
                </div>
                <div class="col-md-4">
                    <h4 class="" style="color: #747794">Find and share the right content</h4>
                    <p>
                        No time to create content? No problem. Later helps you find on-brand content, add your
                        own personal touch, and share to your Instagram, Facebook, Twitter and Pinterest
                        social channels in just a few clicks.
                    </p>
                </div>
            </div>


        </div>
    </section>


    {{--    Features section--}}
    <section class="about_area" style="padding-top: 90px" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading text-center" data-aos="fade-right">
                        <h3>Features at a glance</h3>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
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
                                    <p>Organize your teams and work in private, dedicated Workspaces. Don't get your
                                        jobs and clients mixed up.</p>
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
                                    <p>Write faster and better marketing copies, generate Hashtags among other
                                        things.</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_about_part" data-aos="fade-right">
                                    <div class="feature_icon"><i class="lni lni-bar-chart"></i></div>
                                    <h6>Analytics</h6>
                                    <p>Carefully designed trends and insights report guiding your business
                                        decisions.</p>
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





    <div class="container">
        <div class="border-top"></div>
    </div>

    {{--    Our Happy Clients--}}
    <section class="testimonial_area section_padding_130" id="rating">
        <div class="testimonial-top-thumbnail"><img
                src="{{ asset('themes/frontend/wimax/assets/img/core-img/testimonial-top.png')}}" alt=""></div>
        <div class="testimonial-bottom-thumbnail"><img
                src="{{ asset('themes/frontend/wimax/assets/img/core-img/testimonial-bottom.png')}}" alt=""></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading white text-center" data-aos="fade-left">
                        <h3>{{"Our Clients"}}</h3>
                        <p>{{"Trusted by 10,000 customers worldwide"}}</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-9 col-lg-7">
                    <div class="card border-0 p-4 p-sm-5 testimonials owl-carousel" data-aos="fade-up">
                        <div class="single_testimonial_area text-center">
                            <div class="testimonial_author_thumb"><img
                                    src="{{ asset('themes/frontend/wimax/assets/img/advisor-img/testimonial-1.jpg')}}"
                                    alt=""></div>
                            <div class="testimonial_text">
                                <p>{{"A sample set of clinical rules was identified from the relevant literature."}}</p>
                                <div class="rating"><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i
                                        class="lni-star-filled"></i><i class="lni-star-filled"></i><i
                                        class="lni-star-filled"></i></div>
                                <div class="testimonial_author_name">
                                    <h5>{{"Kodil John"}}</h5>
                                    <h6>{{"CEO & Founder, Designing World"}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="single_testimonial_area text-center">
                            <div class="testimonial_author_thumb"><img
                                    src="{{ asset('themes/frontend/wimax/assets/img/advisor-img/testimonial-2.jpg')}}"
                                    alt=""></div>
                            <div class="testimonial_text">
                                <p>{{"Easy scheduling, simple time saving and lots of features rich"}}</p>
                                <div class="rating"><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i
                                        class="lni-star-filled"></i><i class="lni-star-filled"></i><i
                                        class="lni-star-filled"></i></div>
                                <div class="testimonial_author_name">
                                    <h5>{{"Jannatun Lima"}}</h5>
                                    <h6>{{"CEO & Founder, Cigna"}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="single_testimonial_area text-center">
                            <div class="testimonial_author_thumb"><img
                                    src="{{ asset('themes/frontend/wimax/assets/img/advisor-img/testimonial-1.jpg')}}"
                                    alt=""></div>
                            <div class="testimonial_text">
                                <p>{{"Very well organized tool with stunning high quality design. Thank you so much!"}}</p>
                                <div class="rating"><i class="lni-star-filled"></i><i class="lni-star-filled"></i><i
                                        class="lni-star-filled"></i><i class="lni-star-filled"></i><i
                                        class="lni-star-filled"></i></div>
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

    {{--    Frequently Questions--}}
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
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse{{ $key }}"
                                        aria-expanded="true" aria-controls="collapse{{ $key }}">{{$faq->name}}<span
                                            class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapse{{ $key }}" aria-labelledby="headingOne"
                                     data-parent="#faqAccordion">
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


    {{--Pricing sections--}}
    <section class="download_app_area section_padding_130_80" id="pricing">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="section_heading white text-center" data-aos="fade-left">
                        <h3>{{"Pricing Plan"}}</h3>
                        <p>{{"Choose the plan that's right for your growing team!"}}</p>
                        <div class="plan-option">
                            <p>Monthly</p>
                            <label class="switch pricing-tab-switcher">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <p>Annually</p>
                        </div>
                        <span class="text-white">Save up to 20%!</span>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Single Price Plan Area-->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="single_price_plan wow fadeInUp animated" data-wow-delay="0.2s"
                         style="visibility: visible; animation-delay: 0.2s;">
                        <div class="title">
                            <h3>Google Sit Kit</h3>
                            <p>Google LLC is an American multinational technology company that focuses on artificial
                                intelligence, search engine, online advertising, cloud computing, computer software,
                                quantum computing, e-commerce, and consumer electronics.</p>
                            <div class="line"></div>
                        </div>
                        <div class="price">
                            <div class="annual_price">
                                <h4 class="price">$2000<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is yearly</span>
                                </i>
                            </div>
                            <div class="monthly_price">
                                <h4 class="price">$1500<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is monthly</span>
                                </i>
                            </div>
                        </div>
                        <div class="">

                            <div class="plan-group">
                                <div class="text-large">Add up to 0 social accounts</div>
                                <div class="small">3 social account on each platform</div>
                            </div>
                        </div>
                        <div class="description">
                            <p></p><h6>Scheduling &amp; Report</h6>
                            <p></p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Facebook scheduling &amp; report
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                                    Instagram scheduling &amp; report
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                                    Twitter scheduling &amp; report
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>


                            <p></p><h6>Advance features</h6>
                            <p></p>

                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Spintax support
                                      <i type="button" class="lni lni-question-circle">
                                                <span>this plan is free</span>
                                      </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Watermark support
                                    <i type="button" class="lni lni-question-circle">
                                            <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Image Editor support
                                     <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>

                            <p>
                                <i class="lni-close"></i>

                                <span>Cloud import: Unsupported
                                 <i type="button" class="lni lni-question-circle">
                                  <span>this plan is free</span>
                                 </i>
                                 </span>
                            </p>
                            <p class="have">
                                <i class="lni-close"></i>
                                <span>File type: Unsupported
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                             </p>
                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Storage: 0MB
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Max. file size: 0MB
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                        </div>
                        <div class="button">
                            <a class="btn wimax-btn btn-2 btn-payment" href="#" data-tmp="#">
                                Pay now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="single_price_plan wow fadeInUp animated" data-wow-delay="0.2s"
                         style="visibility: visible; animation-delay: 0.2s;">
                        <div class="title">
                            <h3>Telecom Service</h3>
                            <p>America Telecom Service</p>
                            <div class="line"></div>
                        </div>
                        <div class="price">
                            <div class="annual_price">
                                <h4 class="price">$1300<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is yearly</span>
                                </i>
                            </div>
                            <div class="monthly_price">
                                <h4 class="price">$1200<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is monthly</span>
                                </i>
                            </div>
                        </div>
                        <div class="">

                            <div class="plan-group">
                                <div class="text-large">Add up to 0 social accounts</div>
                                <div class="small">9 social account on each platform</div>
                            </div>
                        </div>
                        <div class="description">
                            <p></p><h6>Scheduling &amp; Report</h6>
                            <p></p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                                    Facebook scheduling &amp; report
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                                    Instagram scheduling &amp; report
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                                    Twitter scheduling &amp; report
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>

                            <p></p>
                            <h6>Advance features</h6>
                            <p></p>

                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Spintax support
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Watermark support
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Image Editor support
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>

                            <p>
                                <i class="lni-close"></i>
                                <span>Cloud import: Unsupported
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p class="have">
                                <i class="lni-close"></i>
                                <span>File type: Unsupported
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Storage: 0MB
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Max. file size: 0MB
                                    <i type="button" class="lni lni-question-circle">
                                        <span>this plan is free</span>
                                    </i>
                                </span>
                            </p>
                        </div>
                        <div class="button"><a class="btn wimax-btn btn-2 btn-payment" href="#" data-tmp="#">Pay now</a></div>
                    </div>
                </div>

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="single_price_plan wow fadeInUp animated" data-wow-delay="0.2s"
                         style="visibility: visible; animation-delay: 0.2s;">
                        <div class="title">
                            <h3>Microsoft Web</h3>
                            <p>Web is powerful complete solution for you</p>
                            <div class="line"></div>
                        </div>
                        <div class="price">
                            <div class="annual_price">
                                <h4 class="price">$150<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is yearly</span>
                                </i>
                            </div>
                            <div class="monthly_price">
                                <h4 class="price">$100<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is monthly</span>
                                </i>
                            </div>
                        </div>
                        <div class="">

                            <div class="plan-group">
                                <div class="text-large">Add up to 0 social accounts</div>
                                <div class="small">5 social account on each platform</div>
                            </div>
                        </div>
                        <div class="description">
                            <p></p><h6>Scheduling &amp; Report</h6>
                            <p></p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                    Facebook scheduling &amp; report
                    <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
                    </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                    Instagram scheduling &amp; report
                    <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
                    </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>
                    Twitter scheduling &amp; report
                    <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
                    </span>
                            </p>


                            <p></p><h6>Advance features</h6>
                            <p></p>

                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Spintax support
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Watermark support
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>
                            <p>
                                <i class="lni-close"></i>
                                <span>Image Editor support
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>

                            <p>
                                <i class="lni-close"></i>

                                <span>Cloud import: Unsupported
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>
                            <p class="have">
                                <i class="lni-close"></i>
                                <span>File type: Unsupported
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>
                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Storage: 0MB
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>
                            <p class="have">
                                <i class="lni-check-mark-circle"></i>
                                <span>Max. file size: 0MB
              <i type="button" class="lni lni-question-circle">
                        <span>this plan is free</span>
                    </i>
              </span>
                            </p>
                        </div>
                        <div class="button"><a class="btn wimax-btn btn-2 btn-payment"
                                               href="#"
                                               data-tmp="#">
                                Pay now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        $(document).ready(function ($) {
            $(".Modern-Slider").slick({
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 600,
                slidesToShow: 1,
                slidesToScroll: 1,
                pauseOnHover: false,
                dots: true,
                pauseOnDotsHover: true,
                cssEase: 'linear',
                // fade:true,
                draggable: false,
                prevArrow: false,
                nextArrow: false,
            });

            $(".image-Slider").slick({
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 800,
                slidesToShow: 1,
                slidesToScroll: 1,
                pauseOnHover: false,
                dots: true,
                pauseOnDotsHover: true,
                cssEase: 'linear',
                // fade:true,
                draggable: false,
                prevArrow: false,
                nextArrow: false,
                variableWidth: false,
            });
        })
    </script>
@endsection
