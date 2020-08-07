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
			    	<a href="{{url('/')}}/tin-tuc">Tin tức</a>
			    </li>
			    <li class="breadcrumb-item active" aria-current="page">Chi tiết tin tức</li>
			  </ol>
			</nav>
		</div>
	</section>
	<section class="project-list">
		<div class="container">
			<h1 class="d-none">hidden</h1>
			<div class="row">
				<div class="col-md-9 padd-large">
					<h2 class="pjdetail-title">{{$data->name}}</h2>
					<p class="amblog-date">Tin tức  —  {{$data->created_at}}</p>
					<!-- <p class="ablog-shot">Our customers have the right to access, correct and delete personal data relating to them, and to object to the processing of such data, by addressing a written request, at any time. The Company makes every effort to put in place suitable precautions to safeguard the security and privacy of personal data, and to prevent it from being altered, corrupted, </p> -->
					<div class="pj-info">
						<img src="{{$data->image}}" alt="">
						<p>{!! $data->content !!}</p>
						<!-- <img src="public/images/news-detail2.png" alt="">
						<p>You can view or edit your personal data online for many of our services. You can also make choices about our collection and use of your data. How you can access or control your personal data will depend on which services you use. You can choose whether you wish to receive promotional communications from our web site by email, SMS, physical mail, and telephone. If you receive promotional email or SMS messages from us and would like to opt out, you can do so by following the directions in that message. You can also make choices about the receipt of promotional email, telephone calls, and postal mail by visiting and signing into Company Promotional Communications Manager, which allows you to update contact information, manage contact preferences, opt out of email subscriptions, and choose whether to share your contact information with our partners. </p>
						<img src="public/images/news-detail3.png" alt="">
						<div class="social-share"><img src="public/images/social-share.png" alt=""></div> -->
					</div>
				</div>
				<div class="col-md-3">
					<div class="news-hot sticky-top">
						<h2 class="news-title">Tin tức mới nhất</h2>
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
										<h6 class="blogtrend-name"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}">{{$item->name}}</a></h6>
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
			<h2 class="block-title">Tin tức liên quan</h2>
			<div class="block-content">
				<div class="row">
					@foreach($related_posts as $item)
					<div class="col-md-3 col-md-custom">
						<div class="post-item">
							<div class="post-photo">
								<a href="{{url('/')}}/tin-tuc/{{$item->slug}}"><img src="{{$item->image}}" alt=""></a>
							</div>
							<h3 class="amblog-headline"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}">{{$item->name}}</a></h3>
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