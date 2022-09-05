<div class="subheader {{Helper::class_main(1)}}">
    <div class="wrap">
        <div class="subheader-main wrap-m w-100 p-r-0">
            <div class="wrap-c">
                <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                </button>
                <h3 class="title"><i class="far fa-user text-info" style="color: #1ac958"></i> My Account</h3>
            </div>

            <div class="wrap-c">
                <div class="menu">
                    <div class="menu-item">
                        <a class="{{Request::is('my_account/profile')? 'menu-item-active':''}}" href="{{url('my_account/profile')}}" >Profile</a>
                        <a class="{{Request::is('my_account/pricing_bill')? 'menu-item-active':''}}" href="{{url('my_account/pricing_bill')}}" >Pricing & billing</a>
                        <a class="{{Request::is('my_account/redeem_code')? 'menu-item-active':''}}" href="{{url('my_account/redeem_code')}}" >Redeem Code</a>
{{--                        <a class="{{Request::is('my_account/invoice_history')? 'menu-item-active':''}}" href="{{url('my_account/invoice_history')}}" >Invoice History</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
