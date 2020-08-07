@if (count($data))
    @foreach ($data as $item)
    <div class="col-md-4">
        <div class="amblog-item">
            <div class="amblog-photo"><a href="{{url('/')}}/tin-tuc/{{$item->slug}}" title="{{$item->name}}">
                <img src="{{$item->image}}" alt="">
            </a></div>
            <div class="amblog-detail">
                <p class="news-date">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>{{$item->created_at}}</span>
                </p>
                <h4 class="news-name"><a href="news-detail.php" title="">{{$item->name}}</a></h4>
                <p class="news-des">{!! $item->content !!}</p>
            </div>
        </div>
    </div>
    @endforeach
@endif