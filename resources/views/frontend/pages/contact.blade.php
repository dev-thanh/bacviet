@extends('frontend.master')
@section('main')
	<!-- <section id="breadcrumbs">
		<div class="avarta">
			
		</div>
		<div class="info">
			<div class="container text-center">
				<h2 class="text-uppercase">Liên hệ</h2>
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}">Trang chủ <span>/</span></a></li>
					<li class="list-inline-item"><a title="Liên hệ" href="javascript:0">Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="contact">
		<h1 class="d-none">{{ @$dataSeo->title_h1 }}</h1>
		<?php if(!empty($dataSeo->content)){
			$content = json_decode($dataSeo->content);
		} ?>
		<div class="container">
			<div class="content">
				<div class="info-contact pt-100 pb-100">
					<div class="row" style="position: relative;">
						<div class="col-md-12">
							<div class="social">
								<ul>
									<li>
										<a title="Zalo" href="{{ @$content->info->zalo }}" target="_blank">
											<img src="{{ __BASE_URL__ }}/images/sc-1.png" class="img-fluid" alt="Zalo">
										</a>
									</li>
									<li>
										<a title="Facebook" href="{{ @$content->info->facebook }}" target="_blank">
											<img src="{{ __BASE_URL__ }}/images/sc-2.png" class="img-fluid" alt="Facebook">
										</a>
									</li>
									<li><a title="{{ @$content->info->phone }}" href="tel:{{ @$content->info->phone }}">
										<img src="{{ __BASE_URL__ }}/images/sc-3.png" class="img-fluid" alt="Phone"></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="left">
								<div class="title-contact">Liên hệ với chúng tôi</div>
								<div class="desc">
									{{ @$content->info->desc_pages }}
								</div>
								<div class="list-place">
									<ul>
										@if (!empty(@$site_info->address->list))
											@foreach (@$site_info->address->list as $key => $value)
												<li><i class="fa fa-map-marker"></i>{{ @$value->title }}</li>
											@endforeach
										@endif
										<li><i class="fa fa-phone"></i>{{ @$content->info->phone }}</li>
										<li><i class="fa fa-envelope"></i>{{ @$content->info->email }}</li>
									</ul>
								</div>
								<div class="social-md d-none"> 
									<ul class="list-inline">
										<li class="list-inline-item">
											<a title="" href="">
												<img src="{{ __BASE_URL__ }}/images/sc-1.png" class="img-fluid" alt="ICON">
											</a>
										</li>
										<li class="list-inline-item">
											<a title="" href="">
												<img src="{{ __BASE_URL__ }}/images/sc-2.png" class="img-fluid" alt="ICON">
											</a>
										</li>
										<li class="list-inline-item">
											<a title="" href="">
												<img src="{{ __BASE_URL__ }}/images/sc-3.png" class="img-fluid" alt="ICON">
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="right">
								<div class="title-contact">Nhập thông tin của bạn</div>
								<div class="form-contact">
									<form action="{{ route('home.contact.post') }}" method="POST" id="contact-form">
										@csrf

										<div class="row">
											@if (Session::has('flash_message'))
				                                <div class="col-sm-12">
				                                    <div class="item" style="margin-bottom: 15px">
				                                        <div class="alert alert-success alert-dismissible">
				                                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                                            <h4><i class="icon fa fa-ban"></i> Thông báo</h4>
				                                            {{ Session::get('flash_message') }}
				                                        </div>
				                                    </div>
				                                </div>
				                            @endif


				                            @if(count($errors) > 0)
				                                <div class="col-sm-12">
				                                    <div class="item" style="margin-bottom: 15px">
				                                        <div class="alert alert-danger alert-dismissible">
				                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                                            <h4><i class="icon fa fa-ban"></i> Thông báo</h4>
				                                            @foreach($errors->all() as $error)
				                                                <li>{!! $error !!}</li>
				                                            @endforeach
				                                        </div>
				                                    </div>
				                                </div>
				                            @endif
				                            
											<div class="col-md-12">
												<div class="form-group">
													<div class="item">
														<input type="text" placeholder="Họ & tên" name="name" value="{{ old('name') }}">
														<span class="icon-form"><img src="{{ __BASE_URL__ }}/images/ct1.png" class="img-fluid" alt="Liên hệ "></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="item">
														<input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
														<span class="icon-form"><img src="{{ __BASE_URL__ }}/images/ct2.png" class="img-fluid" alt="Liên hệ "></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="item">
														<input type="text" placeholder="Số điện thoại" name="phone" value="{{ old('phone') }}">
														<span class="icon-form"><img src="{{ __BASE_URL__ }}/images/ct3.png" class="img-fluid" alt="Liên hệ "></span>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<div class="item">
														<input type="text" placeholder="Địa chỉ" name="address" value="{{ old('address') }}">
														<span class="icon-form"><img src="{{ __BASE_URL__ }}/images/ct4.png" class="img-fluid" alt="Liên hệ "></span>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<div class="item">
														<textarea name="content" placeholder="Nội dung" cols="30" rows="10">{!! old('content') !!}</textarea>
														<span class="icon-form"><img src="{{ __BASE_URL__ }}/images/ct5.png" class="img-fluid" alt="Liên hệ "></span>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="item text-center">
													<div class="btn-submit">
														<input type="submit" class="btn-sent" value="GỬI">
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</section> -->

	<section class="contact-us">
		<div class="container">
			<div class="row">
				@if (Session::has('flash_message'))
                    <div class="col-sm-12">
                        <div class="item" style="margin-bottom: 15px">
                            <div class="alert alert-success alert-dismissible">
                            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Thông báo</h4>
                                {{ Session::get('flash_message') }}
                            </div>
                        </div>
                    </div>
                @endif


                @if(count($errors) > 0)
                    <div class="col-sm-12">
                        <div class="item" style="margin-bottom: 15px">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Thông báo</h4>
                                @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
				<div class="col-md-6">
					<div class="contact-info">
						<div class="store-map">
							<h1 class="contact-title">Liên hệ với chúng tôi</h1>
							<div class="map active" id="store-map-1">
				                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7616175989824!2d105.82076241422479!3d21.002190686012842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac869cd63f89%3A0xa2e71c273579f51b!2zMzE1IFRyxrDhu51uZyBDaGluaA!5e0!3m2!1sen!2s!4v1592405459053!5m2!1sen!2s" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				            </div>
                            <div class="map" id="store-map-2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7616175989824!2d105.82076241422479!3d21.002190686012842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac869cd63f89%3A0xa2e71c273579f51b!2zMzE1IFRyxrDhu51uZyBDaGluaA!5e0!3m2!1sen!2s!4v1592405459053!5m2!1sen!2s" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
						</div>
					</div>
					<div class="system-store">
						<div class="row">
							<div class="col-md-6">
								<div class="store-detail store-main" id="btn-st-1">
									<h2 class="store-name">Kho Bãi Miền Bắc</h2>
									<ul class="store-info">
										<li>
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<span> Km 10,5 Phú Thụy, Gia Lâm, Hà Nội</span>
										</li>
										<li>
											<i class="fa fa-phone" aria-hidden="true"></i>
											<span>0704 646 517</span>
										</li>
										<li>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>vatlieucongtrinh@gmail.com</span>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="store-detail"  id="btn-st-2">
									<h2 class="store-name">Kho Bãi Miền Nam</h2>
									<ul class="store-info">
										<li>
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<span> Km 10,5 Phú Thụy, Gia Lâm, Hà Nội</span>
										</li>
										<li>
											<i class="fa fa-phone" aria-hidden="true"></i>
											<span>0704 646 517</span>
										</li>
										<li>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>vatlieucongtrinh@gmail.com</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 flex-end">
					<div class="contact-form">
						<form class="fom-contact" action="{{ route('home.contact.post') }}" method="POST" id="contact-form">
							@csrf
							<fieldset class="fieldset">
								<legend class="title">Gửi phản hồi cho chúng tôi</legend>
								<div class="field">
                                    <input type="text" placeholder="Họ & tên" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="Số điện thoại" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="Địa chỉ" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="field">
                                	<textarea placeholder="Nội dung" name="content">{!! old('content') !!}</textarea>
                                </div>
                            
							</fieldset>
							<div class="action-toolbar">
                                <button class="action submit btn-general">Gửi</button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop
<style type="text/css" media="screen">
	.error-help-block{
		color: red;
	}
</style>
@section('script')
	<script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{!! $jsValidator->selector('#contact-form') !!}
@endsection