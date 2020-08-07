@extends('frontend.master')
@section('main')
	<section id="breadcrumbs">
		<div class="avarta">
			@if (\Request::route()->getName() != 'home.project')
				@if ($info->banner)
					<img src="{{ $info->banner }}" class="img-fluid" width="100%" alt="{{ $info->name }}">
				@else
					<img src="{{ __BASE_URL__ }}/images/bread.png" class="img-fluid" width="100%" alt="{{ $info->name }}">
				@endif
			@else

				@if ($dataSeo->banner)
					<img src="{{ $dataSeo->banner }}" class="img-fluid" width="100%" alt="{{ $dataSeo->meta_title }}">
				@else
					<img src="{{ __BASE_URL__ }}/images/bread.png" class="img-fluid" width="100%" alt="{{ $dataSeo->meta_title }}">
				@endif

			@endif
		</div>
		<div class="info">
			<div class="container text-center">
				<h2 class="text-uppercase">Dự án</h2>
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}">Trang chủ <span>/</span></a></li>
					@if (\Request::route()->getName() == 'home.project')
						<li class="list-inline-item"><a title="" href="javascript:0">Dự án</a></li>
					@else
						<li class="list-inline-item"><a title="Dự án" href="{{ route('home.project') }}">Dự án <span>/</span></a></li>
						<li class="list-inline-item"><a title="" href="javascript:0">{{ $info->name }}</a></li>
					@endif
				</ul>
			</div>
		</div>
	</section>

	<section id="project" class="">
		<h1 class="d-none">{{ $dataSeo->title_h1 }}</h1>
		@if (\Request::route()->getName() == 'home.project')
			<div class="desc-project pt-100 pb-100">
				<div class="content">
					<div class="container">
						<?php if(!empty($dataSeo->content)){
							$content = json_decode($dataSeo->content);
						} ?>
						{!! @$content->desc !!}
					</div>
				</div>
			</div>
		@endif
		<div class="project-child pt-100 pb-100" style="background: #fafafa">
			<div class="container">
				<div class="content">
					<div class="title text-center text-uppercase">
						@if (\Request::route()->getName() == 'home.project')
							<h2>Các dự án tiêu biểu</h2>
						@else
							<h2>{{ $info->name }}</h2>
						@endif
					</div>
					<div class="list-product">
						<div class="row list-append">
							@if (count($data))
								@foreach ($data as $item)
									<div class="col-md-6 col-sm-6">
										@if (\Request::route()->getName() == 'home.category-project')
											@component('frontend.components.project', ['item' => $item, 'info'=> $info ]) @endcomponent
										@else
											@component('frontend.components.project', ['item' => $item ]) @endcomponent
										@endif
										
									</div>
								@endforeach
							@else
								<div class="col-sm-12">
									<div class="alert alert-success" role="alert">
									  	Nội dung đang được cập nhật.
									</div>
								</div>
							@endif
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="btn-view" style="text-align: center;">
									<a href="javascript:;" class="btn-load-more">Xem thêm</a>
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

	<script>
		jQuery(document).ready(function($) {
			limit = 6;
			$('.btn-load-more').click(function(event) {
				btn = $(this);
				$('.loadingcover').show();
				$.ajax({
					url: '{{ route('home.load-more-ajax') }}',
					type: 'GET',
					data: {
						type: 'project',
						limit : limit,
						@if (!empty($info))
							id_cat : '{{ $info->id }}',
						@endif
					},
				})
				.done(function(data) {
					$('.loadingcover').hide();
					limit = limit + 6;
					$('.list-append').append(data);
					if(data.status == 0){
						$('#showrrrr').modal('show');
						btn.remove();
					}
				})
			});
		});
	</script>
@endsection