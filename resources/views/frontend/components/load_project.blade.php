@if (count($data))
    @foreach ($data as $item)
    <div class="col-md-4">
        <div class="product-item">
            <a href="{{url('/')}}/du-an/{{$item->slug}}" title="" class="zoom"><img src="{{url('/')}}/{{$item->image}}" alt=""> </a>
            <div class="product-text text-left">
                <h4><a href="product-detail.php" title="">{{$item->name}}</a> </h4>
                <div class="price">Giá: @if($item->price=='') Liên hệ @else {{$item->price}} @endif</div>
            </div>
        </div>
    </div>
    @endforeach
@endif