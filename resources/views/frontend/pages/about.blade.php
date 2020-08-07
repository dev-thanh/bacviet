@extends('frontend.master')
@section('main')
	<section id="breadcrumbs">
		<div class="avarta">
			@if ($dataSeo->banner)
				<img src="{{ $dataSeo->banner }}" class="img-fluid" width="100%" alt="{{ $dataSeo->meta_title }}">
			@else
				<img src="{{ __BASE_URL__ }}/images/bread.png" class="img-fluid" width="100%" alt="{{ $dataSeo->meta_title }}">
			@endif
		</div>
		<div class="info">
			<div class="container text-center">
				<h2 class="text-uppercase">Giới thiệu</h2>
				<ul class="list-inline">
					<li class="list-inline-item"><a title="Trang chủ" href="{{ url('/') }}">Trang chủ <span>/</span></a></li>
					<li class="list-inline-item"><a title="" href="javascript:0">Giới thiệu</a></li>
				</ul>
			</div>
		</div>
	</section>

	<?php if(!empty($dataSeo->content)){
		$content = json_decode($dataSeo->content);
	} ?>

	<section id="about">
		<div class="container">
			<div class="content">
				<div class="info-about pt-100 pb-100">
					<div class="row">
						<div class="col-md-7">
							<div class="avarta avarta-ab-cate">
								<img src="{{ @$content->about->image }}" class="img-fluid" width="100%" alt="{{ @$content->about->title }}">
							</div>
						</div>
						<div class="col-md-5">
							<div class="right">
								<h1>{{ @$content->about->title }}</h1>
								<div class="info-right">
									{!! @$content->about->desc !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="history" style="background: #fafafa" class="pt-100 pb-100">
		<div class="container">
			<div class="content">
				<div class="title-history text-uppercase"><h2 class="mont-semi blue">{{ @$content->history->title }}</h2></div>
				<div class="info-hist">
					<div class="slide-tab">
						<ul class="tabs">
							@if (!empty(@$content->history->content))
								@foreach (@$content->history->content as $key => $value)
									<li>
										<a title="" href="javascript:0" data-tab="tab-{{ $loop->index + 1 }}" 
											class="{{ $loop->index == 0 ? 'active' : null }}">
											<span>{{ @$value->title }}</span>
											<span class="aft text-center">
												<span>Năm</span>
												<span class="sans-bold">{{ @$value->title }}</span>
											</span>
										</a>
									</li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="tab-content-his">
						@if (!empty(@$content->history->content))
							@foreach (@$content->history->content as $key => $value)
								<div class="tab-content {{ $loop->index == 0 ? 'active' : null }}" id="tab-{{ $loop->index + 1 }}">
									<div class="info">
										{!! @$value->content !!}
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="tamnhin" class="pt-100 pb-100">
		<div class="container">
			<div class="content">
				<div class="lis-tamnhin">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="item text-center">
								<h3>{{ @$content->vision->title }}</h3>
								<div class="desc">
									{!! @$content->vision->content !!}
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="item text-center">
								<h3>{{ @$content->mission->title }}</h3>
								<div class="desc">
									{!! @$content->mission->content !!}
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="item-giatri">
								<div class="content-gt">
									<div class="title text-center text-uppercase">
										<h2>{{ @$content->core_values->title }}</h2>
										<div class="line"></div>
									</div>
									<div class="desc text-center">
										{!! @$content->core_values->content !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="box-service" class="pb-100">
		<div class="tab-content">
			<div class="tab-pane active" id="tabs-1" role="tabpanel">
				<div class="list-srv">
					@if (!empty($projects))
						@foreach ($projects as $item)
							@component('frontend.components.project-style-2', ['item' => $item]) @endcomponent
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>

	<section id="box-contact">
		<div class="container">
			<div class="content">
				<div class="info-price text-center">
					<h2 class="text-uppercase">Liên hệ tư vấn và báo giá</h2>
					<div class="hotline">
						<a title="{{ $site_info->hotline }}" href="tel: {{ $site_info->hotline }}">
							GỌI NGAY: {{ $site_info->hotline }}
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop