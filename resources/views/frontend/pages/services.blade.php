@extends('frontend.master')
@section('main')
	<section id="breadcrumbs">
		<!-- <div class="avarta">
			
			
		</div> -->
		<div class="info">
			<div class="container text-center">
				<h2 class="text-uppercase">Dịch vụ</h2>
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}">Trang chủ <span>/</span></a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">Dịch vụ</a></li>
				</ul>
			</div>
		</div>
	</section>
	<h1 class="d-none">{{ @$dataSeo->title_h1 }}</h1>
	<?php if(!empty($dataSeo->content)){
		$content = json_decode($dataSeo->content);
	} ?>
	<!-- <section id="service">
		<div class="list-icon-srv pt-100 pb-100">
			<div class="container">
				<div class="content">
					<div class="row">
						@if (!empty($content->criteria))
						    @foreach ($content->criteria as $key => $value)
						    	<div class="col-md-3 col-sm-6">
									<div class="item">
										<div class="avarta">
											<img src="{{ @$value->background }}" class="img-fluid" width="100%" alt="{{ @$value->title }}">
										</div>
										<div class="info text-center">
											<div class="info-icon">
												<div class="icon">
													<img src="{{ @$value->icon }}" class="img-fluid" alt="{{ @$value->title }}">
												</div>
												<h3>
													<a title="" href="javascript:0">{{ @$value->title }}</a>
												</h3>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="slide-srv-cate" style="background: #f4f7ff;">
			<div class="container">
				<div class="content">
					<div class="list-item-cate">
						@if (!empty($content->services))
						    @foreach ($content->services as $key => $value)
								<div class="item">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="left">
												<img src="{{ @$value->background }}" class="img-fluid" width="100%" alt="{{ @$value->title }}">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="right">
												<h2><a title="{{ @$value->title }}" href="{!! @$value->link !!}">{{ @$value->title }}</a></h2>
												<div class="desc">
													{!! @$value->content !!}
												</div>
												<div class="btn-view">
													<a title="Xem chi tiết" href="{!! @$value->link !!}">XEM CHI TIẾT</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="transform" class="pt-100">
		<div class="container list-trans pb-80">
			<div class="conten">
				<div class="title text-center text-uppercase"> <h2>{{ @$content->gallery->title }}</h2></div>
				<div class="list-transt" style="background: #f9f9f9">
					<div class="item">
						<div class="row">
							<div class="col-md-6">
								<div class="box-img slide-img">
									
									@if (!empty($content->gallery_1->list_image))
	                            		@foreach ($content->gallery_1->list_image as $item)
	                            			<div class="item">
	                            				<a title="" href="{{ @$item }}" data-fancybox="group" class ="lightbox" data-fancybox="lib-1">
	                            					<img src="{{ @$item }}" class="img-fluid" width="100%" alt="{{ @$content->gallery->title }}">
	                            				</a>
	                            			</div>
										@endforeach
									@endif

								</div>
							</div>
							<div class="col-md-6">
								<div class="box-text">
									{!! @$content->gallery_1->content !!}
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-6">
								<div class="box-img slide-img">
									@if (!empty($content->gallery_2->list_image))
	                            		@foreach ($content->gallery_2->list_image as $item)
	                            			<div class="item">
	                            				<a title="" href="{{ @$item }}" data-fancybox="group" class ="lightbox" data-fancybox="lib-2">
	                            					<img src="{{ @$item }}" class="img-fluid" width="100%" alt="{{ @$content->gallery->title }}">
	                            				</a>
	                            			</div>
										@endforeach
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="box-text">
									{!! @$content->gallery_1->content !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->


	<section class="breadcrumbs">
		<div class="container">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item">
			    	<a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
			    </li>
			    <li class="breadcrumb-item active" aria-current="page">Dịch vụ</li>
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
										<h2 class="service-name"><a href="" title="">{{ @$value->title }}</a></h2>
										<p class="service-des">{!! @$value->content !!}</p>
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