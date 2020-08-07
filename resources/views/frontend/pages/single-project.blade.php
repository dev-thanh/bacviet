@extends('frontend.master')
@section('main')
	<section id="breadcrumbs">
		<div class="avarta"><img src="{{ __BASE_URL__ }}/images/bread.png" class="img-fluid" width="100%" alt="{{ $data->name }}"></div>
		<div class="info">
			<div class="container text-center">
				<h2 class="text-uppercase">Dự án</h2>
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}">Trang chủ <span>/</span></a></li>
					<li class="list-inline-item"><a title="Dự án" href="{{ route('home.project') }}">Dự án <span>/</span></a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">{{ $data->name }}</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section id="detail-content" class="pt-100 pb-100">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-9">
						<div class="detail">
							<?php if(!empty($data->more_image)){
								$more_image = json_decode($data->more_image);
							} ?>
							<div class="preview-pr">
								<div class="slider-for">

                                    <div class="carousel-item">
                                        <img class="" src="{{ $data->image }}" class="img-fluid" width="100%" alt="{{ $data->name }}">
                                    </div>

                                    @if (!empty($more_image))
                                    	@foreach ($more_image as $item)
                                    		 <div class="carousel-item">
		                                        <img class="" src="{{ $item }}" class="img-fluid" width="100%" alt="{{ $data->name }}">
		                                    </div>
                                    	@endforeach
                                    @endif
									

                                </div>
                                <!--/.Slides-->
                                <div class="slider-nav">

                                    <div class="clc">
                                     	<img class="" src="{{ $data->image }}" width="100%" alt="{{ $data->name }}">
                                    </div>

                                    @if (!empty($more_image))
										@foreach ($more_image as $item)
											<div class="clc">
												<img class="" src="{{ $item }}" width="100%" alt="{{ $data->name }}">
											</div>
										@endforeach
                                    @endif
                                </div>
							</div>
							<div class="title-detail">
								<h1 style="font-size: 30px;">{{ $data->name }}</h1>
								<div class="info-prject">
									{!! $data->meta !!}
								</div>
							</div>
							<div class="info-detail">
								{!! $data->content !!}
							</div>
							<div class="comment">
								<div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
							</div>
							<div class="other-news pt-100">
								<div class="title text-uppercase"><h2>dự án liên quan</h2></div>
								<div class="list-product slide-project-other">
									<div class="row">
										@if (!empty($project_same_category))
											@foreach ($project_same_category as $item)
												<div class="col-md-6">
													@component('frontend.components.project', ['item' => $item, 'class'=>'item-other']) @endcomponent
												</div>
											@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="side-bar">
							<div class="box-bar">
								<div class="title-bar" style="font-size: 20px;">Dự án cùng chuyên mục</div>
								@if (!empty($project_same_category))
									@foreach ($project_same_category as $item)
										@if ($loop->index < 5)
											@component('frontend.components.side-bar', ['item' => $item, 'type' => 'project' ]) @endcomponent
										@endif
									@endforeach
								@endif
							</div>
							<div class="box-bar">
								<div class="time-work">
									<div class="title-bar">GIỜ LÀM VIỆC</div>
									{!! @$site_info->side_bar->project->content !!}
								</div>
							</div>
							<div class="box-bar">
								<div class="fanpage">
									<div class="title-bar">FANPAGES</div>
									<div class="fan">
										{!! @$site_info->code_facebook !!}
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
@section('script')
	<script>
		jQuery(document).ready(function($) {
			$('.project_menu').addClass('active');
		});
	</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1620283888101801&autoLogAppEvents=1"></script>
@endsection