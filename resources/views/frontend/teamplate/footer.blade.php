<footer>
	<div class="container">
		<div class="content">
			<div class="info-footer">
				<div class="row">
					<div class="col-md-4">
						<div class="left">
							<div class="logo">
								 <a title="{{ @$site_info->site_title }}" href="{{ url('/') }}">
		                            <img src="{{ @$site_info->footer_logo }}" class="img-fluid" alt="{{ @$site_info->site_title }}">
		                        </a>
							</div>
							<h2>{{ @$site_info->name_company }}</h2>
							<ul>
								 @if (!empty(@$site_info->address->list))
									@foreach (@$site_info->address->list as $key => $value)
										<li><i class="fa fa-map-marker"></i>{{ @$value->title }}</li>
									@endforeach
								@endif
								
								<li><i class="fa fa-envelope"></i>Email:  {{ @$site_info->email }}</li>
								<li><i class="fa fa-phone"></i>Hotline:   {{ @$site_info->hotline }}</li>
								<li><i class="fa fa-internet-explorer"></i>Website:   {{ @$site_info->website }}</li>
							</ul>
						</div>
					</div>
					<div class="col-md-8">
						<div class="right">
							<div class="row">
								<div class="col-md-4">
									<div class="item">
										<div class="title-ft">danh mục</div>
										<div class="menu-ft">
											<ul>
												@if (!empty($menuFooter))
													@foreach ($menuFooter as $item)
														@if ($item->parent_id == null)
															<li><a title="{{ $item->title }}" href="{{ url($item->url) }}">{{ $item->title }}</a></li>
														@endif
													@endforeach
												@endif
											</ul>
										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-6">
									<div class="item">
										<div class="title-ft">liên kết mxh</div>
										<div class="social">
											<ul>
												 @if (!empty(@$site_info->social))
				                                    @foreach (@$site_info->social as $key => $value)
				                                        <li class="">
				                                            <a title="{{ $value->name }}" href="{{ $value->link }}" target="_blank">
				                                                <i class="{{ $value->icon }}"></i> {{ $value->name }}
				                                            </a>
				                                        </li>
				                                    @endforeach
				                                @endif
											</ul>
										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-6">
									<div class="item">
										<div class="title-ft">google map</div>
										<div class="maps-ft">
											{!! @$site_info->google_maps !!}
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="ct text-center">{!! @$site_info->copyright !!}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="showrrrr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered bd-example-modal-sm" role="document" style="max-width: 400px ">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel" style="color: black">Thông báo</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body" style="color: black">
	                Dữ liệu đang được cập nhật
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	    </div>
	</div>


	<div id="callnow" class="hotline">
	    <div class="hotline-phone-ring-wrap">
	        <div class="hotline-phone-ring" id="call-now-1">
	            <div class="hotline-phone-ring-circle"></div>
	            <div class="hotline-phone-ring-circle-fill"></div>
	            <div class="hotline-phone-ring-img-circle">
	                <a href="tel:{{ @$site_info->hotline }}" class="pps-btn-img"> <img src="{{__BASE_URL__}}/images/quick.png" alt="Gọi điện thoại" width="50" data-lazy-src="" data-pin-no-hover="true" class="lazyloaded" data-was-processed="true">
	                </a>
	            </div>
	        </div>
	        <div class="hotline-bar">
	            <a href="tel:{{ @$site_info->hotline }}"> <span class="text-hotline" id="call-now-1">{{ @$site_info->hotline }}</span> </a>
	        </div>
	    </div>
	</div>
</footer>
<style>
.mobile-hotline{display:none}@media (max-width:767px){.mobile-hotline{display:block;bottom:0;width:100%;background:rgba(0,0,0,.5);height:60px;position:fixed;z-index:9999999}.mobile-hotline .mobile-hotline-left{width:45%;float:left;text-align:center;background:#00a502;margin-left:10px;margin-right:5px;margin-top:7px;height:45px;border-radius:4px}.mobile-hotline .mobile-hotline-left a{color:#fff;line-height:46px;font-size:16px;font-weight:700}.mobile-hotline .mobile-hotline-right{width:45%;float:right;text-align:center;background:#fac100;margin-left:5px;margin-right:10px;margin-top:7px;height:45px;border-radius:4px}.mobile-hotline .mobile-hotline-right a{color:red;line-height:46px;font-size:16px;font-weight:700}}.hotline-phone-ring-wrap{position:fixed;bottom:0;left:0;z-index:999999}@media screen (max-width:768px){.hotline-phone-ring-wrap{bottom:30%;right:0}}.hotline-phone-ring{position:relative;visibility:visible;background-color:transparent;width:110px;height:110px;cursor:pointer;z-index:11;-webkit-backface-visibility:hidden;-webkit-transform:translateZ(0);transition:visibility .5s;left:0;bottom:0;display:block}.hotline-phone-ring-circle{width:85px;height:85px;top:10px;left:10px;position:absolute;background-color:transparent;border-radius:100%;border:2px solid #e60808;-webkit-animation:phonering-alo-circle-anim 1.2s infinite ease-in-out;animation:phonering-alo-circle-anim 1.2s infinite ease-in-out;transition:all .5s;-webkit-transform-origin:50% 50%;-ms-transform-origin:50% 50%;transform-origin:50% 50%;opacity:.5}.hotline-phone-ring-circle-fill{width:55px;height:55px;top:25px;left:25px;position:absolute;background-color:rgba(230,8,8,.7);border-radius:100%;border:2px solid transparent;-webkit-animation:phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;animation:phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;transition:all .5s;-webkit-transform-origin:50% 50%;-ms-transform-origin:50% 50%;transform-origin:50% 50%}.hotline-phone-ring-img-circle{background-color:#e60808;width:33px;height:33px;top:37px;left:37px;position:absolute;background-size:20px;border-radius:100%;border:2px solid transparent;-webkit-animation:phonering-alo-circle-img-anim 1s infinite ease-in-out;animation:phonering-alo-circle-img-anim 1s infinite ease-in-out;-webkit-transform-origin:50% 50%;-ms-transform-origin:50% 50%;transform-origin:50% 50%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;align-items:center;justify-content:center}.hotline-phone-ring-img-circle .pps-btn-img{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.hotline-phone-ring-img-circle .pps-btn-img img{width:20px;height:20px}.hotline-bar{position:absolute;background:rgba(230,8,8,.75);height:40px;width:160px;line-height:40px;border-radius:3px;padding:0;background-size:100%;cursor:pointer;transition:all .8s;-webkit-transition:all .8s;z-index:9;box-shadow:0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.1);border-radius:50px!important;left:33px;bottom:37px}.hotline-bar>a{color:#fff;text-decoration:none;font-size:15px;font-weight:700;text-indent:42px;display:block;letter-spacing:1px;line-height:40px;font-family:Arial}.hotline-bar>a:active,.hotline-bar>a:hover{color:#fff}@-webkit-keyframes phonering-alo-circle-anim{0%{-webkit-transform:rotate(0) scale(.5) skew(1deg);-webkit-opacity:.1}30%{-webkit-transform:rotate(0) scale(.7) skew(1deg);-webkit-opacity:.5}100%{-webkit-transform:rotate(0) scale(1) skew(1deg);-webkit-opacity:.1}}@-webkit-keyframes phonering-alo-circle-fill-anim{0%{-webkit-transform:rotate(0) scale(.7) skew(1deg);opacity:.6}50%{-webkit-transform:rotate(0) scale(1) skew(1deg);opacity:.6}100%{-webkit-transform:rotate(0) scale(.7) skew(1deg);opacity:.6}}@-webkit-keyframes phonering-alo-circle-img-anim{0%{-webkit-transform:rotate(0) scale(1) skew(1deg)}10%{-webkit-transform:rotate(-25deg) scale(1) skew(1deg)}20%{-webkit-transform:rotate(25deg) scale(1) skew(1deg)}30%{-webkit-transform:rotate(-25deg) scale(1) skew(1deg)}40%{-webkit-transform:rotate(25deg) scale(1) skew(1deg)}50%{-webkit-transform:rotate(0) scale(1) skew(1deg)}100%{-webkit-transform:rotate(0) scale(1) skew(1deg)}}@media (max-width:768px){.hotline-bar{display:none}}
</style>