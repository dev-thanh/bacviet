<?php $language=request()->session()->get('lang'); ?>
@extends('frontend.master')
@section('main')
	<?php if(!empty($about_us->content)){
		$content = json_decode($about_us->content);
	} ?>	
	<section class="banner-top">
		<div class="banner-photo">
			<img src="{{$about_us->banner}}" alt="">
		</div>
		<div class="banner-content">
			<div class="container">
				<h1 class="page-title">Giới Thiệu</h1>
			</div>
		</div>
	</section>
	<section class="about-us">
		<div class="container">
			<ul class="nav nav-tabs" id="navTab" role="tabblist">
			  <li class="nav-item">
			    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">{{ __('generalintroduction') }}</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="vision-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="false">{{ __('vision') }}</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="false">{{ __('mission') }}</a>
			  </li>
			</ul>
			<div class="tab-content" id="navTabContent">
			  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
			  	<div class="tab-detail">
			  		<h2 class="page-sub">{{ __('aboutus') }}</h2>
			  		<div class="tab-main">
			  			<div class="row">
			  				<div class="col-md-5">
			  					<div class="tab-photo">
			  						<img src="{{$content->about->image}}" alt="">
			  					</div>
			  				</div>
			  				<div class="col-md-7">
			  					
			  					<div class="content mw-470">
									@if($language=='vi')
				  					{!! $content->about->desc !!}
				  					@else
				  					{!! $content->about->desc_en !!}
				  					@endif
								</div>
			  				</div>
			  			</div>
			  		</div>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
			  	<div class="tab-detail">
			  		@if($language=='vi')
			  		<h2 class="page-sub">{{$content->vision->title}}</h2>
			  		@else
			  		<h2 class="page-sub">{{$content->vision->title_en}}</h2>
			  		@endif
			  		<div class="tab-main">
			  			<div class="row">
			  				<div class="col-md-5">
			  					<div class="tab-photo">
			  						<img src="{{$content->about->image}}" alt="">
			  					</div>
			  				</div>
			  				<div class="col-md-7">			  					
			  					<div class="content mw-470">
			  						@if($language=='vi')
				  					{!! $content->vision->content !!}
				  					@else
				  					{!! $content->vision->content_en !!}
				  					@endif
								</div>
			  				</div>
			  			</div>
			  		</div>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
			  	<div class="tab-detail">
			  		@if($language=='vi')
			  		<h2 class="page-sub">{{$content->mission->title}}</h2>
			  		@else
			  		<h2 class="page-sub">{{$content->mission->title_en}}</h2>
			  		@endif
			  		<div class="tab-main">
			  			<div class="row">
			  				<div class="col-md-5">
			  					<div class="tab-photo">
			  						<img src="{{$content->about->image}}" alt="">
			  					</div>
			  				</div>
			  				<div class="col-md-7">
			  					
			  					<div class="content mw-470">
			  						@if($language=='vi')
				  					{!! $content->mission->content !!}
				  					@else
				  					{!! $content->mission->content_en !!}
				  					@endif
								</div>
			  				</div>
			  			</div>
			  		</div>
			  	</div>
			  </div>
			</div>
		</div>
	</section>
@stop