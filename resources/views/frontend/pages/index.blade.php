@extends('frontend.master')
@section('main')
    <main>
        <section class="banner-slider">
            @if (!empty($slider))
                @foreach ($slider as $item)
                    <div class="item">
                        <a title="{{ $item->name }}" href="{{ $item->link }}">
                            <img src="{{ $item->image }}" class="img-fluid" width="100%" alt="{{ $item->name }}">
                        </a>
                    </div>
                @endforeach
            @endif
        </section>
        <section class="about-index pd-60 block-gray">
            <?php if(!empty($about_us->content)){
                $content = json_decode($about_us->content);
            } ?>
            <div class="container">
                <h2 class="title">Về chúng tôi</h2>
                <div class="row">
                    <div class="col-md-6">
                        <a href="about-us.php" title="" class="zoom"><img src="{{$content->about->image}}" alt=""> </a>
                    </div>
                    <div class="col-md-6">
                        <div class="about-text">
                            <h3>{{$content->about->title}}</h3>
                            <p>{!! $content->about->desc !!}</p>
                            <a href="{{url('/')}}/gioi-thieu" title="" class="link-plus">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="block-group pd-60">
            <div class="container">
                <h2 class="title">sản phẩm nổi bật</h2>
                <div class="product-slider">
                    @if (!empty($product_hot))
                        @foreach ($product_hot as $item)
                            <div class="col-md-12">
                                <div class="product-item">
                                    <a href="{{route('home.index')}}/san-pham/{{$item->slug}}" title="" class="zoom"><img src="{{$item->image}}" alt=""> </a>
                                    <div class="product-text">
                                        <h4><a href="product-detail.php" title="">{{ $item->name }}</a> </h4>
                                        <div class="price">{{$item->price}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="text-center mgt-50"><a href="{{route('home.product')}}" title="" class="view-mores inflex-center-center">Xem tất cả</a> </div>
            </div>
        </section>
        <section class="service-index">
            <div class="container">
                <h2 class="title title-white">Dịch vụ</h2>
                <div class="service-slider">
                    <?php if(!empty($dataSeo->content)){
                        $content = json_decode($dataSeo->content);
                    } ?>
                    @if (!empty($content->services))
                    @foreach ($content->services as $key => $value)
                    <div class="col-md-12">
                        <div class="ser-item">
                            <a href="" title="{{ @$value->title }}" class="ser-image zoom"><img src="{{ @$value->background }}" alt=""> </a>
                            <h4><a href="" title="">{{ @$value->title }}</a></h4>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>
        <section class="why-choose pd-60">
            <div class="container">
                <h2 class="title">Vì sao chọn chúng tôi</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="why-item">
                            <div class="why-image">
                                <span class="inflex-center-center"><img src="public/images/vs1.png" title=""> </span>
                            </div>
                            <h4>Uy tín, chất lượng</h4>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="why-item">
                            <div class="why-image">
                                <span class="inflex-center-center"><img src="public/images/vs2.png" title=""> </span>
                            </div>
                            <h4>Phục vụ 24/24</h4>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="why-item">
                            <div class="why-image">
                                <span class="inflex-center-center"><img src="public/images/vs3.png" title=""> </span>
                            </div>
                            <h4>Nhiều ưu đãi</h4>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="why-item">
                            <div class="why-image">
                                <span class="inflex-center-center"><img src="public/images/vs4.png" title=""> </span>
                            </div>
                            <h4>Uy tín, chất lượng</h4>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="project-index">
            <div class="container">
                <h2 class="title">Dự án của chúng tôi</h2>
                <div class="row">
                    @if (count($projects_all))
                        @foreach ($projects_all as $item)
                            <div class="col-md-6">
                                <div class="pjs-item">
                                    <a href="{{route('home.index')}}/du-an/{{$item->slug}}" title="" class="zoom"><img src="{{$item->image}}" alt="{{$item->slug}}"> </a>
                                    <div class="pj-name">{{$item->name}}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <section class="news-index pd-60">
            <div class="container">
                <h2 class="title">Tin tức nổi bật</h2>
                <div class="row">
                    @if (count($postHots))
                        @foreach ($postHots as $item)
                            <div class="col-md-3">
                                <div class="amblog-item">
                                    <div class="amblog-photo"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}" class="zoom">
                                            <img src="{{$item->image}}" alt="">
                                        </a></div>
                                    <div class="amblog-detail">
                                        <p class="news-date">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span>{{$item->created_at}}</span>
                                        </p>
                                        <h4 class="news-name"><a href="news-detail.php">{{$item->name}}</a></h4>
                                        <p class="news-des">{!!$item->content!!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <section class="partner pd-60">
            <div class="container">
                <h2 class="title">Khách hàng của chúng tôi</h2>
                <div class="partner-slider">
                    @if (!empty($partner))
                        @foreach ($partner as $item)
                            <div class="part-item"><a href="{{ $item->link }}" target="_blank" title="{{ $item->name }}" class="zoom-2"><img src="{{$item->image}}" alt="{{ $item->name }}"> </a>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </section>
    <!-- </main> -->
@endsection