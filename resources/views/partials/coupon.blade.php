    <div class="col-lg-4 col-md-6 coupon-card">
        <img src="{{asset('frontend')}}/assets/img/coupons-bg.png" class="img-fluid coupon-bg" alt="coupon">
        <div class="coupon-content">
            <div class="coupon-header d-flex justify-content-between align-items-center">
                <div><img src="{{asset('frontend')}}/assets/img/coin.png" alt="coin"></div>
            </div>
            <div class="coupon-body">
                <h5>Get Coupon in</h5>
                <h2>${{$coupon->price}}</h2>
                <li>{{$coupon->number_of_video}} Videos</li>
                <li>{{$coupon->number_of_images}} Photos</li>
                <li>{{$coupon->number_of_documents}} Documents</li>
            </div>
            <div class="coupon-footer">
                <a class="btn" data-bs-toggle="modal" data-bs-target="#signup">Buy Coupon <span><img
                            src="{{asset('frontend')}}/assets/img/ArrowRight.png" alt=""></span></a>
            </div>
        </div>
    </div>
