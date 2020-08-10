<?php $language=request()->session()->get('lang'); ?>
@extends('frontend.master')
@section('main')
	<section class="breadcrumbs">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item">
			    	<a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
			    </li>
			    <li class="breadcrumb-item">
			    	<a href="{{url('/')}}/tin-tuc">{{ __('news') }}</a>
			    </li>
			    <li class="breadcrumb-item active" aria-current="page">{{ __('newsdetails') }}</li>
			  </ol>
			</nav>
		</div>
	</section>
	<section class="project-list">
		<div class="container">
			<h1 class="d-none">hidden</h1>
			<div class="row">
				<div class="col-md-9 padd-large">
					@if($language=='vi')
					<h2 class="pjdetail-title">{{$data->name}}</h2>
					<p class="amblog-date">Tin tức  —  {{$data->created_at}}</p>
					<div class="pj-info">
						<img src="{{$data->image}}" alt="">
						<p>{!! $data->content !!}</p>
					</div>
					@else
					<h2 class="pjdetail-title">{{$data->name_en}}</h2>
					<p class="amblog-date">{{ __('news') }}  —  {{$data->created_at}}</p>
					<div class="pj-info">
						<img src="{{$data->image}}" alt="">
						<p>{!! $data->content_en !!}</p>
					</div>
					@endif
				</div>
				<div class="col-md-3">
					<div class="news-hot sticky-top">
						<h2 class="news-title">{{ __('latestnews') }}</h2>
						<div class="blog-trend">
							@if (!empty($post_news))
							@foreach ($post_news as $item)
							<div class="blog-trend__item">
								<div class="row">
									<div class="col-md-6">
										<div class="blogtrend-photo">
											<a href="{{url('/')}}/tin-tuc/{{$item->slug}}"><img src="{{$item->image}}" alt=""></a>
										</div>
									</div>
									<div class="col-md-6">
										@if($language=='vi')
										<h6 class="blogtrend-name"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}">{{$item->name}}</a></h6>
										@else
										<h6 class="blogtrend-name"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}">{{$item->name_en}}</a></h6>
										@endif
									</div>
								</div>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>			
		</div>
	</section>
	@if(count($related_posts) > 0)
	<section class="blog-related">
		<div class="container">
			<h2 class="block-title">{{ __('relatednews') }}</h2>
			<div class="block-content">
				<div class="row">
					@foreach($related_posts as $item)
					<div class="col-md-3 col-md-custom">
						<div class="post-item">
							<div class="post-photo">
								<a href="{{url('/')}}/tin-tuc/{{$item->slug}}"><img src="{{$item->image}}" alt=""></a>
							</div>
							@if($language=='vi')
							<h3 class="amblog-headline"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}">{{$item->name}}</a></h3>
							@else
							<h3 class="amblog-headline"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}">{{$item->name_en}}</a></h3>
							@endif
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	@endif
@stop
@section('script')
	<script>
		jQuery(document).ready(function($) {
			$('.news_menu').addClass('active');
		});
	</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1620283888101801&autoLogAppEvents=1"></script>
@endsection