<?php $language=request()->session()->get('lang'); ?>
@extends('frontend.master')
@section('main')
<section class="banner-top">
		<div class="banner-photo">
			<img width="100%" src="{{$pages->banner}}" alt="">
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
                        @if($parent_name !='')
                            @if($language=='vi')
                            <h1 class="text-center title-40">{{$parent_name}}</h1>
                            @else
                            <h1 class="text-center title-40">{{$parent_name_en}}</h1>
                            @endif
                        @endif 
                        <?php if($language=='vi'){
                            $cate_parent = $cate_id;
                        }else{
                            $cate_parent = $cate_id_en;
                        } ?>

                        @foreach($cate_parent as $key =>$value)
                        <div class="cate-child">
                            <div class="child-title flex-center-between">
                                <h2><a href="{{url('/')}}/san-pham/{{$cate_slug[$value]}}" title="">{{$key}}</a> </h2>
                                @if($cate_check == '0')
                                @if(isset($product[$value]) && count($product[$value]) > 3)
                                <a href="{{url('/')}}/san-pham/{{$cate_slug[$value]}}" title="" class="view-mores inflex-center-center">{{ __('viewmore') }}</a>
                                @endif
                                @endif
                            </div>
                            <div class="child-content">
                                <div class="row">
                                    @if(isset($product[$value]))
                                        @foreach($product[$value] as $key => $item)
                                            @if($cate_check == '0')   
                                                @if($key < 3) 
                                                <div class="col-md-4">
                                                    <div class="product-item">
                                                        <a href="{{url('/')}}/san-pham/{{$item->slug}}" title="" class="zoom"><img src="{{$item->image}}" alt=""> </a>
                                                        <div class="product-text text-center">
                                                            @if($language=='vi')
                                                            <h4><a href="{{url('/')}}/san-pham/{{$item->slug}}" title="">{{$item->name}}</a> </h4>
                                                            @else
                                                            <h4><a href="{{url('/')}}/san-pham/{{$item->slug}}" title="">{{$item->name_en}}</a> </h4>
                                                            @endif
                                                            <div class="price">{{number_format($item->price, 0, '.', '.')}} VNĐ</div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                @endif 
                                            @else
                                            <div class="col-md-4">
                                                <div class="product-item">
                                                    <a href="{{url('/')}}/san-pham/{{$item->slug}}" title="" class="zoom"><img src="{{$item->image}}" alt=""> </a>
                                                    <div class="product-text text-center">
                                                        <h4><a href="product-detail.php" title="">{{$item->name}}</a> </h4>
                                                        <div class="price">{{$item->price}}</div>
                                                    </div>
                                                </div>
                                            </div>                                  
                                            @endif                                   
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function($) {
            $('.project_menu').addClass('active');
        });
    </script>

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
                    url: '{{url('/')}}/load-more-product?page='+page,
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
    </script>
    @endsection