@extends('frontend.master')
@section('main')
	<section id="banner">
		<div class="slide-banner">
			@if (!empty($slider))
				@foreach ($slider as $item)
					<div class="item">
						<a title="{{ $item->name }}" href="{{ $item->link }}">
							<img src="{{ $item->image }}" class="img-fluid" width="100%" alt="{{ $item->name }}">
						</a>
					</div>
				@endforeach
			@endif
		</div>
	</section>

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
	} ?>
 
	<section id="box-about" class="pt-100 pb-100">
		<div class="container">
			<div class="content">
				<div class="info-about">
					<div class="row">
						<div class="col-md-5">
							<div class="video-left">
								<div class="avarta">
									<img src="{{ @$content->whychoose->image }}" class="img-fluid" width="100%" 
									alt="{{ @$content->whychoose->title }}">
								</div>
								<!-- <div class="btn-play">
									<a title="" href="javascript:0" data-toggle="modal" data-target="#myModal">
										<img src="{{ __BASE_URL__ }}/images/play.png" class="img-fluid" alt="{{ @$content->whychoose->title }}">
									</a>
								</div> -->
							</div>
						</div>
						<div class="col-md-7">
							<div class="right">
								<h1>{{ @$content->whychoose->title }}</h1>
								<div class="desc">
									<p>{!! @$content->whychoose->desc !!}</p>
								</div>
								<div class="list-icon-ab">
									<div class="row">
										@if (!empty($content->whychoose->list))
											@foreach ($content->whychoose->list as $key => $value)
												<div class="col-md-6 col-sm-6">
													<div class="item text-center">
														<div class="icon">
															<img src="{{ @$value->icon }}" class="img-fluid" alt="{{ @$value->title }}">
														</div>
														<div class="info">
															<h3>{{ @$value->title }}</h3>
															<p>{{ @$value->content }}</p>
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
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			    </div>
		      <div class="modal-body">
		        <div class="popup-video">
		        	{!! @$content->whychoose->iframe !!}
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</section>
	
	<section id="highlight">
		<div class="container">
			<div class="content">
				<div class="title text-center text-uppercase">
					<h2>{{ @$content->indicators->title }}</h2>
					<div class="line"></div>
				</div>
				<div class="desc-title">
					<p>{!! @$content->indicators->desc !!}</p>
				</div>
				<div class="list-hight">
					<div class="row">
						@if (!empty($content->indicators->list))
							@foreach ($content->indicators->list as $key => $value)
								<div class="col-md-3 col-6 col-sm-3">
									<div class="item text-center">
										<div class="icon">
											<img src="{{ @$value->image }}" class="img-fluid" alt="{{  @$content->indicators->title }}">
										</div>
										<div class="info">
											<div class="number"><span>{!! @$value->number !!}</span></div>
											<p>{!! @$value->content !!}</p>
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

	<section id="box-service" class="pt-100 pb-100">
		<div class="container">
			<div class="content">
				<div class="title text-center text-uppercase">
					<h2>Dự án nổi bật</h2>
					<div class="line"></div>
				</div>
			</div>
		</div>
		<div class="tab-service">
			<ul class="nav nav-tabs" role="tablist">
				<li class="">
					<a class="active" data-toggle="tab" href="#tabs-1" role="tab">All</a>
				</li>
				@if (!empty($categories))
					@foreach ($categories as $item)
						<li class="">
							<a class="" data-toggle="tab" href="#tabs-{{ $loop->index + 2 }}" role="tab">{{ $item->name }}</a>
						</li>
					@endforeach
				@endif

			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="tabs-1" role="tabpanel">
				<div class="list-srv slide-srv">
					@if (!empty($projects_all))
						@foreach ($projects_all as $value)
							@component('frontend.components.project-style-2', ['item' => $value]) @endcomponent
						@endforeach
					@endif
				</div>
			</div>
			
			@if (!empty($categories))
				@foreach ($categories as $item)
					<div class="tab-pane " id="tabs-{{ $loop->index + 2 }}" role="tabpanel">
						<div class="list-srv slide-srv">
							<?php $projects = $item->Projects()->where('status', 1)->orderBy('created_at', 'DESC')->paginate(6); ?>
							@if (!empty($projects))
								@foreach ($projects as $value)
									@component('frontend.components.project-style-2', ['item' => $value]) @endcomponent
								@endforeach
							@endif
						</div>
					</div>
				@endforeach
			@endif
			
		</div>
	</section>

	<section id="box-news" class="pb-100">
		<div class="container">
			<div class="content">
				<div class="title text-center text-uppercase">
					<h2>Tin tức nổi bật</h2>
					<div class="line"></div>
				</div>
				<div class="list-news slide-new">
					<div class="row">
						@if (count($postHots))
							@foreach ($postHots as $item)
								<div class="col-md-3">
									@component('frontend.components.post', ['item' => $item]) @endcomponent
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="feedback">
		<div class="container">
			<div class="content">
				<div class="title text-center text-uppercase">
					<h2>{{ @$content->reviews->title }}</h2>
					<div class="line"></div>
				</div>
				<div class="slide-feed">
					@if (!empty($content->reviews->list))
						@foreach ($content->reviews->list as $key => $value)
							<div class="item">
								<div class="avarta">
									<img src="{{ $value->image }}" class="img-fluid" alt="{{ $value->name }}">
								</div>
								<div class="info">
									<div class="desc">{{ $value->content }}</div>
									<h4>{{ $value->name }}</h4>
									<h5>{{ $value->position }}</h5>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	
	<section id="partner" class="pt-100 pb-100">
		<div class="container">
			<div class="content">
				<div class="title text-center text-uppercase">
					<h2>Khách hàng của chúng tôi</h2>
					<div class="line"></div>
				</div>
				<div class="slide-part text-center">
					@if (!empty($partner))
						@foreach ($partner as $item)
							<div class="item">
								<a title="{{ $item->name }}" href="{{ $item->link }}" target="_blank">
									<img src="{{ $item->image }}" class="img-fluid" alt="{{ $item->name }}">
								</a>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	
@endsection