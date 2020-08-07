<header>
   <div class="header-menu">
        <div class="container">
            <div class="content">
                <div class="row">
                    <!-- <div class="col-md-2">
                        <div class="logo"><a title="{{ @$site_info->site_title }}" href="{{ url('/') }}">
                                <img src="{{ @$site_info->logo }}" class="img-fluid" alt="{{ @$site_info->site_title }}">
                            </a> </div>
                        <div class="visible-mobile btn-showSearch"><i class="fa fa-search"></i> </div>
                        <a title="" href="#menu" class="btn-menu visible-mobile"><img src="images/bar.png" class="img-fluid" alt=""></a>
                    </div> -->
                    <div class="col-md-2">
                        <div class="logo">
                            <a title="{{ @$site_info->site_title }}" href="{{ url('/') }}">
                                <img src="{{ @$site_info->logo }}" class="img-fluid" alt="{{ @$site_info->site_title }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            @if (!empty($menuHeader))
                                @foreach ($menuHeader as $item)
                                    @if ($item->parent_id == null)
                                        <li>
                                            <a title="{{ $item->title }}" href="{{ url($item->url) }}" 
                                                class="{{ $item->class }} {{ url($item->url) == url()->current() ? 'active' : null }}">{{ $item->title }}
                                            </a>
                                            @if (count($item->get_child_cate()))
                                                <div class="submenu">
                                                    <ul>
                                                        @foreach ($item->get_child_cate() as $value)
                                                            <li>
                                                                <a title="{{ $value->title }}" href="{{ url($value->url) }}">{{ $value->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
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
        </div>
    </div>
    <div class="menu-mobile d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-6 col-sm-6">
                    <div class="logo"> 
                        <a title="{{ @$site_info->site_title }}" href="{{ url('/') }}">
                            <img src="{{ @$site_info->logo }}" class="img-fluid avarta-logo" alt="{{ @$site_info->site_title }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-6 col-sm-6">
                    <div class="right text-right">
                        <div class="header">
                            <a title="" href="#menu"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</header>