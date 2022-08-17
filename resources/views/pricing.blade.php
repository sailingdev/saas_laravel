@extends('layouts.app')
@section('specific_css')
    <style>
        .lni-question-circle {
            position: relative;
        }

        .lni-question-circle span {
            display: none;
        }

        .lni-question-circle:hover span {
            font-family: arial;
            border: 0;
            border-radius: 3px;
            padding: 15px;
            display: block;
            z-index: 100;
            background: #fff;
            box-shadow: 0 1px 6px 0 rgb(32 33 36 / 28%);
            left: 0%;
            transform: translate(-50%, 0);
            margin: 10px;
            width: 150px;
            position: absolute;
            color: #333;
            top: 10px;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')

    <!-- Breadcrumb Area-->
    <div class="breadcrumb-area bg-img bg-black-overlay section_padding_100"
         style="background-image: url('{{asset('themes/frontend/wimax/assets/img/bg-img/testimonials.jpg')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-xl-6">
                    <div class="breadcrumb-content text-center">
                        <h2>Choose your plan</h2>
                        <p>For 5 years we have been developing for providing better services</p>
                        <div class="plan-option">
                            <p>Monthly</p>
                            <label class="switch pricing-tab-switcher">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <p>Annually</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <section class="price_plan_area section_padding_130_80" id="pricing">
        <div class="container">


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
                                               data-tmp="#">Pay
                                now</a></div>
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

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="single_price_plan wow fadeInUp animated" data-wow-delay="0.2s"
                         style="visibility: visible; animation-delay: 0.2s;">
                        <div class="title">
                            <h3>Jio Mobile Reacharge</h3>
                            <p>Angular is a TypeScript-based free and open-source web application framework led by the
                                Angular Team at Google and by a community of individuals and corporations. Angular is a
                                complete rewrite from the same team that built AngularJS.</p>
                            <div class="line"></div>
                        </div>
                        <div class="price">
                            <div class="annual_price">
                                <h4 class="price">$450<span class="fw-4 fs-18">/month</span></h4>
                                <i type="button" class="lni lni-question-circle">
                                    <span>This plan is yearly</span>
                                </i>
                            </div>
                            <div class="monthly_price">
                                <h4 class="price">$400<span class="fw-4 fs-18">/month</span></h4>
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
                                               data-tmp="#">Pay
                                now</a></div>
                    </div>
                </div>

            </div>
        </div>
    </section>






    <!-- CTA Area-->
    <div class="cta-area section_padding_130_80">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm-8">
                    <div class="cta-content mb-50">
                        <h3 class="mb-0">Start your free trial. Are you ready to try service reign? ! No contract. No
                            credit card</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-4 text-sm-right"><a class="btn wimax-btn btn-4 mb-50"
                                                              href="{{url("register")}}">Start A Free Trial</a></div>
            </div>
        </div>
    </div>

@endsection
