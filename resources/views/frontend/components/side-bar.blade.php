<div class="list-news-bar">
	@if ($type == 'news')
		<div class="item">
			<div class="avarta"><a title="{{ $item->name }}" href="{{ route('home.post.single', $item->slug) }}">
				<img src="{{ $item->image }}" class="img-fluid" alt="{{ $item->name }}"></a>
			</div>
			<div class="info">
				<h4><a title="{{ $item->name }}" href="{{ route('home.post.single', $item->slug) }}">{{ text_limit($item->name, 7) }}...</a></h4>
				<div class="date">{{ $item->created_at->format('d/m/yy') }}</div>
			</div>
		</div>
	@else
		<div class="item">
			<div class="avarta"><a title="{{ $item->name }}" href="{{ route('home.single-project', $item->slug) }}">
				<img src="{{ $item->image }}" class="img-fluid" alt="{{ $item->name }}"></a>
			</div>
			<div class="info">
				<h4><a title="{{ $item->name }}" href="{{ route('home.single-project', $item->slug) }}">{{ text_limit($item->name, 7) }}...</a></h4>
				<div class="date">{{ $item->created_at->format('d/m/yy') }}</div>
			</div>
		</div>	
	@endif
</div>