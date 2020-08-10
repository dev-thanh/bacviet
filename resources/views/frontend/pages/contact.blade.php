@extends('frontend.master')
@section('main')
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
                                <h4><i class="icon fa fa-ban"></i> {{ __('notification') }}</h4>
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
							<h1 class="contact-title">{{ __('contactus') }}</h1>
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
								<legend class="title">{{ __('feedback') }}</legend>
								<div class="field">
                                    <input type="text" placeholder="{{ __('fullname') }}" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="{{ __('phone') }}" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="{{ __('address') }}" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="field">
                                	<textarea placeholder="{{ __('content') }}" name="content">{!! old('content') !!}</textarea>
                                </div>
                            
							</fieldset>
							<div class="action-toolbar">
                                <button class="action submit btn-general">{{ __('send') }}</button>
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