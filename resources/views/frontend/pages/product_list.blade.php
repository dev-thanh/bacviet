<?php $language=request()->session()->get('lang'); 
    $data_url = request()->order ? request()->order : '' ;
?>
@extends('frontend.master')
@section('main')
<section class="banner-top">
		<div class="banner-photo text-center">
			<img src="{{$pages->banner}}" alt="">
		</div>
	</section>
    <section class="product-cate pd-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include('frontend.pages.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="cate-content">
                        <div class="product-list">
                            <div class="pro-title flex-center-between">
                                @if (\Request::route()->getName() == 'home.product')
                                    <h1>{{ __('products') }}</h1>
                                @else
                                    <h2>{{ $info->name }}</h2>
                                @endif
                                <div class="sort flex-center-end">
                                    <span>{{ __('productsorder') }}:</span>
                                    <div class="sidebar-dropdown">
                                        <select id="get_order_product">
                                          <option value="newest" @if($data_url=='newest') selected @endif><li><a href="" title="">{{ __('productsnewest') }}</a></li></option>

                                          <option value="oldest" @if($data_url=='oldest') selected @endif><li><a href="" title="">{{ __('productsold') }}</a></li></option>

                                          <option value="pricehight" @if($data_url=='pricehight') selected @endif><li><a href="" title="">{{ __('productspricelow') }}</a></li></option>
                                          <option value="pricelow" @if($data_url=='pricelow') selected @endif><li><a href="" title="">{{ __('productspricehight') }}</a></li></option>
                                        </select>

                                        <!-- <div class="current-select">{{ __('productsnew') }}</div>
                                        <div class="dropdown-select">
                                            <ul>
                                                <li data-value="newest"><a href="" title="">{{ __('productsnewest') }}</a></li>
                                                <li data-value="oldest"><a href="" title="">{{ __('productsold') }}</a></li>
                                                <li data-value="pricelow"><a href="" title="">{{ __('productspricelow') }}</a></li>
                                                <li data-value="pricehight"><a href="" title="">{{ __('productspricehight') }}</a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="list-content">
                                <div class="row append-project">
                                    @if (count($data))
                                        @foreach ($data as $item)
                                        <div class="col-md-4">
                                            <div class="product-item">
                                                <a href="{{url('/')}}/san-pham/{{$item->slug}}" title="" class="zoom"><img src="{{$item->image}}" alt=""> </a>
                                                <div class="product-text text-left">
                                                    @if($language == 'vi')
                                                    <h4><a href="product-detail.php" title="">{{$item->name}}</a> </h4>
                                                    @else
                                                    <h4><a href="product-detail.php" title="">{{$item->name_en}}</a> </h4>
                                                    @endif
                                                    <div class="price">{{ __('price') }}: @if($item->price=='') {{ __('contact') }} @else {{number_format($item->price, 0, '.', '.')}} VNĐ @endif</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                
                                </div>
                                @if($data->lastpage() > 1)
                                <div class="col-md-12">
                                    <div class="text-center"><a href="" title="" class="view-mores btn-load-more inflex-center-center">Xem thêm</a> </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function($) {
            limit = 6;
            var page = 1;
            $('.btn-load-more').click(function(event) {
                event.preventDefault();
                page+=1;
                // btn = $(this);
                $('.loadingcover').show();
                $.ajax({
                    url: '{{url('/')}}/load-more-product?order={{$data_url}}&page='+page,
                    type: 'GET',
                    // data: {
                    //     type: 'project',
                    //     limit : limit,
                    //     @if (!empty($info))
                    //         id_cat : '{{ $info->id }}',
                    //     @endif
                    // },
                })
                .done(function(data) {
                    console.log(data);
                    if(page==data.lastpage){
                        $('.btn-load-more').remove();
                    }
                    $('.loadingcover').hide();
                    $('.append-project').append(data.respon);
                    if(data.status == 0){
                        $('#showrrrr').modal('show');
                        btn.remove();
                    }
                })
            });
        });

        $('.project_menu').addClass('active');
        $('#get_order_product').on('change', function() {
            var value = $(this).val();
            // console.log(value);
            window.location.href = '{{url('/')}}/san-pham?order='+value;
        });
    </script>
    @endsection