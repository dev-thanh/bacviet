<?php $language=request()->session()->get('lang');
    if(!empty($site_info)){
        $phone = explode( ',', $site_info->hotline );
    }
?>
<footer>
    <section class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h4>{{ __('contactinfo') }}</h4>
                    <h5 class="com-name">{{ __('company') }} CP MA-SBTC</h5>
                    <ul class="com-info">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <div>
                                <p class="mgb-10">Kho Nam: Đường Võ Nguyên Giáp, khu phố Vườn Dừa, Phường Phước Tân, TP Biên Hòa, Tỉnh Đồng Nai.</p>
                                <p>Kho Bắc: Thôn Hòa Trung, Xã Vân Hòa, Huyện Ba Vì, TP Hà Nội</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="" title="">{{$phone['0']}}</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="" title="">vatlieucongtrinh@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 visible-desktop">
                    <h4>{{ __('category') }}</h4>
                    <ul class="ft-nav">
                        @if (!empty($menuHeader))
                            @foreach ($menuHeader as $item)
                                @if ($item->parent_id == null)
                                <li>
                                    <a title="{{ $item->title }}" href="{{ url($item->url) }}" 
                                        class="{{ $item->class }} {{ url($item->url) == url()->current() ? 'active' : null }}"><i class="fa fa-angle-right"></i>@if($language=='vi'){{ $item->title }} @else {{$item->title_en}} @endif
                                    </a>
                                    <!-- <a href="" title=""><i class="fa fa-angle-right"></i> Trang chủ</a> -->
                                </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>{{ __('policy') }}</h4>
                    <ul class="ft-nav">
                        <li><a href="" title=""><i class="fa fa-angle-right"></i> {{ __('privacypolicy') }}</a> </li>
                        <li><a href="" title=""><i class="fa fa-angle-right"></i> {{ __('shippingpolicy') }}</a> </li>
                        <li><a href="" title=""><i class="fa fa-angle-right"></i> {{ __('returnpolicy') }}</a> </li>
                        <li><a href="" title=""><i class="fa fa-angle-right"></i> {{ __('termsofservice') }}</a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>{{ __('troubleshooting') }}</h4>
                    <div class="support suppor-1">
                        <h6>{{ __('freeconsultation') }} (24/7)</h6>
                        <p><a href="" title="">{{$phone['0']}}</a> </p>
                    </div>
                    <div class="support suppor-2">
                        <h6>{{ __('suggestionsreflection') }} (8h00 - 20h00)</h6>
                        <p><a href="" title="">{{$phone['1']}}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>© GCO GROUP 2019. All rights reserved</span>
                </div>
                <div class="col-md-6">
                    <div class="social flex-center-end">
                        <ul class="flex-center">
                            <li><a href="" title="" class="fa fa-facebook"></a> </li>
                            <li><a href="" title="" class="fa fa-youtube-play"></a> </li>
                            <li><a href="" title="" class="fa fa-twitter"></a> </li>
                            <li><a href="" title="" class="fa fa-instagram"></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<section class="popups popups-order">
    <div class="popup-box">
        <div class="content">
            <div class="popup-title">
                <h3>Nhập thông tin của bạn</h3>
            </div>
            <form class="popup-form">                   
                <div class="form-group">
                    <i class="fa fa-user icon name-icon" aria-hidden="true"></i>
                    <input class="name-input form-control" type="text" name="name" value="" placeholder="Họ tên">
                </div>                  
                <div class="form-group">
                    <i class="fa fa-phone icon phone-icon" aria-hidden="true"></i>
                    <input class="phone-input form-control" type="text" name="phone" value="" placeholder="Số điện thoại">
                </div>                  
                <div class="form-group">
                    <i class="fa fa-envelope icon email-icon" aria-hidden="true"></i>
                    <input class="email-input form-control" type="text" name="email" value="" placeholder="Email">
                </div>                  
                <div class="form-group">
                    <i class="fa fa-pencil icon content-icon" aria-hidden="true"></i>
                    <textarea class="content-input form-control" type="text" name="content" rows="3" value="" placeholder="Nội dung"></textarea>
                </div>
                <button type="submit" name="submit-send" class="btn send-btn">
                    <span class="text">Gửi</span>
                </button>
            </form>
        </div>
    </div>    
</section>
<a id="back-to-top" class=""><i class="fa fa-chevron-up"></i> </a>
<div id="callnow" class="">
    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring" id="call-now-1">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a class="pps-btn-img"> <img src="{{url('/')}}/public/images/quick.png" alt="Gọi điện thoại" width="50" data-lazy-src="" data-pin-no-hover="true" class="lazyloaded" data-was-processed="true">
                </a>
            </div>
        </div>
        
        @if($phone['0'])
        <div class="hotline-bar">
            <a> <span class="text-hotline" id="call-now-1">{{$phone['0']}}</span> </a>
        </div>
        @endif
    </div>
</div>