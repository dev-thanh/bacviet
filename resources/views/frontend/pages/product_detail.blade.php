<?php $language=request()->session()->get('lang');
$phone = explode( ',', $site_info->hotline )
?>
@extends('frontend.master')
@section('main')
	<section class="banner-top">
		<div class="banner-photo text-center">
			<img src="{{$pages->banner}}" alt="">
		</div>
	</section>
	<section class="product-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
                    @include('frontend.pages.sidebar')
                </div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
                            <div class="product-image-gallery">
                                <div class="slider-for">
                                    <div class="carousel-item">
                                        <img class="" src="{{ $data->image }}" class="img-fluid" width="100%" alt="{{ $data->name }}">
                                    </div>
                                    <?php if(!empty($data->more_image)){
                                        $more_image = json_decode($data->more_image);
                                    } ?>
                                    @if (!empty($more_image))
                                        @foreach ($more_image as $item)
                                             <div class="carousel-item">
                                                <img class="" src="{{ $item }}" class="img-fluid" width="100%" alt="{{ $data->name }}">
                                            </div>
                                        @endforeach
                                    @endif                                   
                                </div>
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
						</div>
						<div class="col-md-6">
                            @if($language=='vi')
							<div class="product-info-main">
								<h1 class="title-wrapper">{{ $data->name }}</h1>
								<div class="atrr-overview">
                                    @if($data->pr_code !='')
									   <p class="sku">Mã dự án: {{$data->pr_code}}</p>
                                    @endif
									<div class="price-wrapper">Giá: <span class="price">{{$data->price}}</span></div>
                                    @if($data->size !='')
									   <p>Kích thước: {{$data->size}}</p>
                                    @endif
									<!-- <p>Bảo hành:</p> -->
								</div>
								<div class="product-option">
									<button class="action tocart btn-general">ĐẶT HÀNG</button>
									<a href="#" class="contact-phone action btn-general">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<span>Tư vấn: 0704.646.517</span>
									</a>
								</div>
							</div>
                            @else
                            <div class="product-info-main">
                                <h1 class="title-wrapper">{{ $data->name_en }}</h1>
                                <div class="atrr-overview">
                                    @if($data->pr_code !='')
                                       <p class="sku">{{ __('codeproduct') }}: {{$data->pr_code}}</p>
                                    @endif
                                    <div class="price-wrapper">{{ __('price') }}: <span class="price">{{number_format($data->price, 0, '.', '.')}} VNĐ</span></div>
                                    @if($data->size !='')
                                       <p>{{ __('size') }}: {{$data->size}}</p>
                                    @endif
                                    <!-- <p>Bảo hành:</p> -->
                                </div>
                                <div class="product-option">
                                    <button class="action tocart btn-general">{{ __('order') }}</button>
                                    <a href="#" class="contact-phone action btn-general">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <span>{{ __('advisory') }}: {{$phone['0']}}</span>
                                    </a>
                                </div>
                            </div>
                            @endif
						</div>
					</div>
					<div class="product-tab">
						<ul class="nav nav-tabs nav-tabs-start" id="navTab" role="tabblist">
						  <li class="nav-item">
						    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">{{ __('description') }}</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification" aria-selected="false">{{ __('contentproduct') }}</a>
						  </li>
						</ul>
						<div class="tab-content" id="navTabContent">
						  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
						  	<div class="tab-detail">
                                @if($language == 'vi')
						  		{!! $data->meta !!}
                                @else
                                {!! $data->meta_en !!}
                                @endif
						  	</div>
						  </div>
						  <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">
						  	<div class="tab-detail">
						  		@if($language == 'vi')
                                {!! $data->content !!}
                                @else
                                {!! $data->content_en !!}
                                @endif
						  	</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="pro-related">
        <div class="container">
            <h2 class="title font-30">{{ __('productsame') }}</h2>
            <div class="pro-related-box">
                <div class="row">
                    @foreach($product_same_category as $item)
                        <div class="col-md-3">
                            <div class="product-item">
                                <a href="{{url('/')}}/san-pham/{{$item->slug}}" title="{{$item->title}}" class="zoom"><img src="{{$item->image}}" alt=""> </a>
                                <div class="product-text">
                                    @if($language=='vi')
                                    <h4><a href="" title="" class="text-left">{{$item->name}}</a> </h4>
                                    @else
                                    <h4><a href="" title="" class="text-left">{{$item->name_en}}</a> </h4>
                                    @endif
                                    <div class="price text-left">{{number_format($item->price, 0, '.', '.')}} VNĐ</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="pro-watched pd-60">
        <div class="container">
            <h2 class="title font-30">{{ __('productviewed') }}</h2>
            <div class="pro-watched-slider">
                @foreach($products_viewed as $item)
                <div class="col-md-12">
                    <div class="product-item">
                        <a href="{{url('/')}}/san-pham/{{$item->slug}}" title="{{$item->name}}" class="zoom"><img src="{{$item->image}}" alt=""> </a>
                        <div class="product-text">
                            @if($language=='vi')
                            <h4><a href="{{url('/')}}/san-pham/{{$item->slug}}" title="" class="text-left">{{$item->name}}</a> </h4>
                            @else
                            <h4><a href="{{url('/')}}/san-pham/{{$item->slug}}" title="" class="text-left">{{$item->name_en}}</a> </h4>
                            @endif
                            <div class="price text-left">{{number_format($item->price, 0, '.', '.')}} VNĐ</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection