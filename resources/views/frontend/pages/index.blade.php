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
            <div class="container">
                <h2 class="title">Về chúng tôi</h2>
                <div class="row">
                    <div class="col-md-6">
                        <a href="about-us.php" title="" class="zoom"><img src="public/images/about-1.png" alt=""> </a>
                    </div>
                    <div class="col-md-6">
                        <div class="about-text">
                            <h3>Chào mừng bạn đã đến với Cho thuê máy công trình!</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset ...</p>
                            <a href="about-us.php" title="" class="link-plus">Xem thêm</a>
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
                <div class="text-center mgt-50"><a href="{{route('home.project')}}" title="" class="view-mores inflex-center-center">Xem tất cả</a> </div>
            </div>
        </section>
        <section class="service-index">
            <div class="container">
                <h2 class="title title-white">Dịch vụ</h2>
                <div class="service-slider">
                    <div class="col-md-12">
                        <div class="ser-item">
                            <a href="service-detail.php" title="" class="ser-image zoom"><img src="public/images/dv-1.png" alt=""> </a>
                            <h4><a href="service-detail.php" title="">cho thuê Máy công trình</a></h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ser-item">
                            <a href="service-detail.php" title="" class="ser-image zoom"><img src="public/images/dv-2.png" alt=""> </a>
                            <h4><a href="service-detail.php" title="">cho thuê Máy công trình</a></h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ser-item">
                            <a href="service-detail.php" title="" class="ser-image zoom"><img src="public/images/dv-3.png" alt=""> </a>
                            <h4><a href="service-detail.php" title="">cho thuê Máy công trình</a></h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ser-item">
                            <a href="service-detail.php" title="" class="ser-image zoom"><img src="public/images/dv-4.png" alt=""> </a>
                            <h4><a href="service-detail.php" title="">cho thuê Máy công trình</a></h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ser-item">
                            <a href="service-detail.php" title="" class="ser-image zoom"><img src="public/images/dv-2.png" alt=""> </a>
                            <h4><a href="service-detail.php" title="">cho thuê Máy công trình</a></h4>
                        </div>
                    </div>
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
                    <!-- <div class="col-md-6">
                        <div class="pjs-item">
                            <a href="project-detail.php" title="" class="zoom"><img src="public/images/pj-2.png" alt=""> </a>
                            <div class="pj-name">Dự án khu biệt thự liền kề vinhome</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pjs-item">
                            <a href="project-detail.php" title="" class="zoom"><img src="public/images/pj3.png" alt=""> </a>
                            <div class="pj-name">Dự án khu biệt thự liền kề vinhome</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pjs-item">
                            <a href="project-detail.php" title="" class="zoom"><img src="public/images/pj-4.png" alt=""> </a>
                            <div class="pj-name">Dự án khu biệt thự liền kề vinhome</div>
                        </div>
                    </div> -->
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
                    <!-- <div class="part-item"><a href="" title="" class="zoom-2"><img src="public/images/client1.png" alt="" title=""> </a></div>
                    <div class="part-item"><a href="" title="" class="zoom-2"><img src="public/images/client2.png" alt="" title=""> </a></div>
                    <div class="part-item"><a href="" title="" class="zoom-2"><img src="public/images/client8.png" alt="" title=""> </a></div>
                    <div class="part-item"><a href="" title="" class="zoom-2"><img src="public/images/client7.png" alt="" title=""> </a></div>
                    <div class="part-item"><a href="" title="" class="zoom-2"><img src="public/images/client5.png" alt="" title=""> </a></div>
                    <div class="part-item"><a href="" title="" class="zoom-2"><img src="public/images/client2.png" alt="" title=""> </a></div> -->
                </div>
            </div>
        </section>
    <!-- </main> -->
@endsection