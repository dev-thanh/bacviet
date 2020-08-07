<div class="sidebar-left sticky-top">
    <div class="sidebar-cate">
        <h2><span>DANH MỤC SẢN PHẨM</span></h2>
        <div class="cate-list">
            @foreach($menu_pro as $item)
            <div class="cate-item">
                <div class="cate-cap"><a href="{{url('/')}}/san-pham/{{$item->slug}}" title="">{{$item->name}}</a></div>
                @if(count($item->menu_child($item->id))>0)
                <div class="cate-dropdown">
                    <ul>
                        @foreach($item->menu_child($item->id) as $val)
                        <li><a href="{{url('/')}}/san-pham/{{$val->slug}}" title="">- {{$val->name}}</a> </li>
                        @endforeach
                        <!-- <li><a href="product-list.php" title="">- Cẩu lốp</a> </li>
                        <li><a href="product-list.php" title="">- Cẩu tháp</a> </li> -->
                    </ul>
                </div>
                @endif
            </div>
            @endforeach
            <!-- <div class="cate-item">
                <div class="cate-cap">Thiết bị nền móng (5)</div>
                <div class="cate-dropdown">
                    <ul>
                        <li><a href="product-list.php" title="">- Cẩu xích</a> </li>
                        <li><a href="product-list.php" title="">- Cẩu lốp</a> </li>
                        <li><a href="product-list.php" title="">- Cẩu tháp</a> </li>
                    </ul>
                </div>
            </div>
            <div class="cate-item">
                <div class="cate-cap">Xe công trình (4)</div>
                <div class="cate-dropdown">
                    <ul>
                        <li><a href="product-list.php" title="">- Cẩu xích</a> </li>
                        <li><a href="product-list.php" title="">- Cẩu lốp</a> </li>
                        <li><a href="product-list.php" title="">- Cẩu tháp</a> </li>
                    </ul>
                </div>
            </div>
            <div class="cate-item">
                <div class="cate-cap">Xe nâng người (6)</div>
                <div class="cate-dropdown">
                    <ul>
                        <li><a href="" title="">- Cẩu xích</a> </li>
                        <li><a href="" title="">- Cẩu lốp</a> </li>
                        <li><a href="" title="">- Cẩu tháp</a> </li>
                    </ul>
                </div>
            </div>
            <div class="cate-item">
                <div class="cate-cap">Phụ tùng (10)</div>
                <div class="cate-dropdown">
                    <ul>
                        <li><a href="" title="">- Cẩu xích</a> </li>
                        <li><a href="" title="">- Cẩu lốp</a> </li>
                        <li><a href="" title="">- Cẩu tháp</a> </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <!-- <form>
        <div class="sidebar-dropdown">
            <div class="current-select">Thương hiệu</div>
            <div class="dropdown-select">
                <ul>
                    <li><a href="" title="">Hitachi</a></li>
                    <li><a href="" title="">Klieamt</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-dropdown">
            <div class="current-select">Nhà sản xuất</div>
            <div class="dropdown-select">
                <ul>
                    <li><a href="" title="">Hitachi</a></li>
                    <li><a href="" title="">Klieamt</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-dropdown">
            <div class="current-select">Xuất xứ</div>
            <div class="dropdown-select">
                <ul>
                    <li><a href="" title="">Hitachi</a></li>
                    <li><a href="" title="">Klieamt</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-dropdown">
            <div class="current-select">Chiều cao</div>
            <div class="dropdown-select">
                <ul>
                    <li><a href="" title="">Hitachi</a></li>
                    <li><a href="" title="">Klieamt</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-dropdown">
            <div class="current-select">Model</div>
            <div class="dropdown-select">
                <ul>
                    <li><a href="" title="">Hitachi</a></li>
                    <li><a href="" title="">Klieamt</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-dropdown">
            <div class="current-select">Nguồn năng lượng</div>
            <div class="dropdown-select">
                <ul>
                    <li><a href="" title="">Hitachi</a></li>
                    <li><a href="" title="">Klieamt</a></li>
                </ul>
            </div>
        </div>
        <div class="text-right">
            <a href="" title="" class="view-mores frm-view-mores inflex-center-center">Tìm kiếm</a>
        </div>
    </form> -->
</div>