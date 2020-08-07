<div class="item {{ @$class }}">
	<div class="avarta">
		<a title="{{ $item->name }}" href="{{ route('home.single-project', $item->slug) }}">
			<img src="{{ $item->image }}" class="img-fluid" width="100%" alt="{{ $item->name }}">
		</a>
	</div>
	<div class="info">
		<h3>
			<a title="{{ $item->name }}" href="{{ route('home.single-project', $item->slug) }}">
				{{ $item->name }}
			</a>
		</h3>
		<ul>
			<li>
				<div class="date">{{ $item->created_at->format('d/m/yy') }}</div>
			</li>
			<li>
				@if (\Request::route()->getName() == 'home.category-project')
					<div class="cate">{{ $info->name }}</div>
				@else
					@if (!empty($info))
						<div class="cate">{{ $info->name }}</div>
					@else
						<div class="cate">{{ @$item->category()->first()->name }}</div>
					@endif
					
				@endif
			</li>
		</ul>
	</div>
</div>