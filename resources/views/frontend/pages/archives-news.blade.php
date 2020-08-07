@extends('frontend.master')
@section('main')
	<section class="breadcrumbs">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item">
			    	<a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
			    </li>
			    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
			  </ol>
			</nav>
		</div>
	</section>
	<section class="news-list">
		<div class="container">
			<h1 class="d-none">hidden</h1>
			<div class="row">
				<div class="col-md-9">
					<!-- <ul class="amblog-nav">
						<li class="active amblog-nav-item">
							<a href="" title="">Tin tức công ty</a>
						</li>
						<li class="amblog-nav-item">
							<a href="" title="">Tin tức chuyên ngành</a>
						</li>
					</ul> -->
					<div class="amblog-content">
						<div class="row append-post">
							@if (count($data))
							@foreach ($data as $item)
							<div class="col-md-4">
								<div class="amblog-item">
									<div class="amblog-photo"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}" title="{{$item->name}}">
										<img src="{{$item->image}}" alt="">
									</a></div>
									<div class="amblog-detail">
										<p class="news-date">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span>{{$item->created_at}}</span>
										</p>
										<h4 class="news-name"><a href="news-detail.php" title="">{{$item->name}}</a></h4>
										<p class="news-des">{!! $item->content !!}</p>
									</div>
								</div>
							</div>
							@endforeach
							@endif
						</div>
						@if($data->lastpage() > 1)
						<div class="view-more">
							<a href="" class="view-link btn-load-more">Xem thêm</a>
						</div>
						@endif
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
@stop

@section('script')
	<script>
        jQuery(document).ready(function($) {
            var page = 1;
            $('.btn-load-more').click(function(event) {
                event.preventDefault();
                page+=1;
                // btn = $(this);
                $('.loadingcover').show();
                $.ajax({
                    url: '{{url('/')}}/load-more-post?page='+page,
                    type: 'GET',
                })
                .done(function(data) {
                    if(page==data.lastpage){
                        $('.btn-load-more').remove();
                    }
                    $('.loadingcover').hide();
                    $('.append-post').append(data.respon);
                    if(data.status == 0){
                        $('#showrrrr').modal('show');
                        btn.remove();
                    }
                })
            });
        });
    </script>
@endsection