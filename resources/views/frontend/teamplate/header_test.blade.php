
<header>
    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 visible-desktop">
                    <div class="header-top_left">
                        <span>Chào mừng bạn đã đến với Cho thuê máy công trình!</span>
                    </div>
                </div>
                <div class="col-md-6 flex-center-end">
                    <div class="header-top_right flex-center">
                        <div class="social">
                            <ul class="flex-center">
                                <li><a href="" title="" class="fa fa-facebook"></a> </li>
                                <li><a href="" title="" class="fa fa-youtube-play"></a> </li>
                                <li><a href="" title="" class="fa fa-twitter"></a> </li>
                                <li><a href="" title="" class="fa fa-instagram"></a> </li>
                            </ul>
                        </div>
                        <div class="flag flex-center">
                            <a href="" title="" class="vi-flg"><img src="{{url('/')}}/public/images/vnflag.png" alt=""> </a>
                            <a href="" title="" class="en-flg"><img src="{{url('/')}}/public/images/enflag.png" alt=""> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a title="{{ @$site_info->site_title }}" href="{{route('home.index')}}">
                            <img src="{{ @$site_info->logo }}" class="img-fluid" alt="{{ @$site_info->site_title }}">
                        </a>
                    </div>
                    <div class="visible-mobile btn-showSearch"><i class="fa fa-search"></i> </div>
                    <a title="" href="#menu" class="btn-menu visible-mobile"><img src="{{url('/')}}/public/images/bar.png" class="img-fluid" alt=""></a>
                </div>
                <div class="col-md-8 flex-center-center">
                    <div class="header-nav">
                        <ul class="flex-center-center">
                            @if (!empty($menuHeader))
                                @foreach ($menuHeader as $item)
                                    @if ($item->parent_id == null)
                                        <li>
                                            <a title="{{ $item->title }}" href="{{ url($item->url) }}" 
                                                class="{{ $item->class }} {{ url($item->url) == url()->current() ? 'active' : null }}">{{ $item->title }}
                                            </a>
                                            @if (count($item->get_child_cate()))
                                                <ul>
                                                    @foreach ($item->get_child_cate() as $value)
                                                        <li>
                                                            <a title="{{ $value->title }}" href="{{ url($value->url) }}">{{ $value->title }}</a>
                                                            @if (count($value->get_child_cate()))
                                                                <ul>
                                                                    @foreach ($value->get_child_cate() as $val)
                                                                        <li>
                                                                            <a title="{{ $val->title }}" href="{{ url($val->url) }}">{{ $val->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                            <!-- <li><a href="index.php" title="">Trang chủ</a> </li>
                            <li><a href="about-us.php" title="">Giới thiệu</a> </li>
                            <li>
                                <a href="" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li class="item-has-children">
                                        <a href="product-cate.php" title="">Thiết bị nâng hạ</a>
                                        <ul>
                                            <li><a href="product-list.php" title="">Cẩu xích</a> </li>
                                            <li><a href="product-list.php" title="">Cẩu lốp</a> </li>
                                            <li><a href="product-list.php" title="">Xe công trình</a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="product-list.php" title="">Thiết bị nền móng</a> </li>
                                    <li><a href="product-list.php" title="">Xe công trình</a> </li>
                                    <li><a href="product-list.php" title="">Xe nâng người</a> </li>
                                    <li><a href="product-list.php" title="">Phụ tùng</a> </li>
                                </ul>
                            </li>
                            <li><a href="service.php" title="">Dịch vụ</a> </li>
                            <li><a href="project.php" title="">Dự án</a> </li>
                            <li><a href="news.php" title="">Tin tức</a> </li>
                            <li><a href="contact.php" title="">Liên hệ</a> </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 search-mb">
                    <div class="search flex-center-center height-100">
                        <form class="flex-center-center">
                            <input type="text" placeholder="Tìm kiếm ...">
                            <button type="submit"><i  class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header-hotline">
        <div class="container">
            <?php if(!empty($site_info)){
                $phone = explode( ',', $site_info->hotline );
            } ?>
            @if (!empty($site_info))
            <div class="hotline flex-center-end">
                <span>Hotline: </span>
                @foreach ($phone as $k => $item)
                <a href="" title="">{{$item}}</a>
                @if($k+1 != count($phone))
                <i>-</i>
                @endif
                @endforeach
                <!-- <a href="" title="">0983.260.584</a> -->
            </div>
            @endif
        </div>
    </section>
    <nav id="menu">
        <ul>
            @if (!empty($menuHeader))
                @foreach ($menuHeader as $item)
                    @if ($item->parent_id == null)
                        <li>
                            <a title="{{ $item->title }}" href="{{ url($item->url) }}" 
                                class="{{ $item->class }} {{ url($item->url) == url()->current() ? 'active' : null }}">{{ $item->title }}
                            </a>
                            @if (count($item->get_child_cate()))
                                <ul>
                                    @foreach ($item->get_child_cate() as $value)
                                        <li>
                                            <a title="{{ $value->title }}" href="{{ url($value->url) }}">{{ $value->title }}</a>
                                            @if (count($value->get_child_cate()))
                                                <ul>
                                                    @foreach ($value->get_child_cate() as $val)
                                                        <li>
                                                            <a title="{{ $val->title }}" href="{{ url($val->url) }}">{{ $val->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </nav>
</header>