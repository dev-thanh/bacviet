<?php $language=request()->session()->get('lang'); ?>
@extends('frontend.master')
@section('main')
	<section id="breadcrumbs">
		<!-- <div class="avarta">
			
			
		</div> -->
		<div class="info">
			<div class="container text-center">
				<h2 class="text-uppercase">{{ __('service') }}</h2>
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}/trang-chu">{{ __('home') }} <span>/</span></a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">{{ __('service') }}</a></li>
				</ul>
			</div>
		</div>
	</section>
	<h1 class="d-none">{{ @$dataSeo->title_h1 }}</h1>
	<?php if(!empty($dataSeo->content)){
		$content = json_decode($dataSeo->content);
	} ?>

	<section class="breadcrumbs">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item">
			    	<a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
			    </li>
			    <li class="breadcrumb-item active" aria-current="page">{{ __('service') }}</li>
			  </ol>
			</nav>
		</div>
	</section>
	<section class="service-us">
		<div class="container">
			<h1 class="d-none">hidden</h1>
			<div class="service-list">
				@if (!empty($content->services))
				@foreach ($content->services as $key => $value)
				<div class="service-item">
					<div class="row no-margin">
						<div class="col-md-6 no-padd">
							<div class="service-content">
								<div class="content-inner">
									<div class="content">
										@if($language=='vi')
										<h2 class="service-name"><a href="" title="">{{ @$value->title }}</a></h2>
										<p class="service-des">{!! @$value->content !!}</p>
										@else
										<h2 class="service-name"><a href="" title="">{{ @$value->title_en }}</a></h2>
										<p class="service-des">{!! @$value->content_en !!}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padd">
							<div class="service-img"><a href="" title="">
								<img src="{{ @$value->background }}" alt="">
								<span class="border-inner"></span>
							</a></div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</section>
@stop