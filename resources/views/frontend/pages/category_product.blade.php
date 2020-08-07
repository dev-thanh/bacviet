@extends('frontend.master')
@section('main')
<section class="banner-top">
		<div class="banner-photo">
			<img src="{{url('/')}}/public/images/bn-pj.png" alt="">
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
                                    <h1>CÁC DỰ ÁN</h1>
                                @else
                                    <h2>{{ $info->name }}</h2>
                                @endif
                                <div class="sort flex-center-end">
                                    <span>Sắp xếp:</span>
                                    <div class="sidebar-dropdown">
                                        <div class="current-select">Mới nhất</div>
                                        <div class="dropdown-select">
                                            <ul>
                                                <li><a href="" title="">Cũ nhất</a></li>
                                                <li><a href="" title="">Chiều cao từ thấp tới cao</a></li>
                                                <li><a href="" title="">Tải trọng từ thấp tới cao</a></li>
                                            </ul>
                                        </div>
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
                                                    <h4><a href="product-detail.php" title="">{{$item->name}}</a> </h4>
                                                    <div class="price">Giá: @if($item->price=='') Liên hệ @else {{$item->price}} @endif</div>
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