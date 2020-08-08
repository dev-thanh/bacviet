@extends('frontend.master')
@section('main')
	<section class="banner-top">
		<div class="banner-photo text-center">
			<img src="{{$dataSeo->banner}}" alt="">
		</div>
	</section>
    <section class="breadcrumbs">
        <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('/')}}/du-an">Dự án</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết dự án</li>
              </ol>
            </nav>
        </div>
    </section>
    <section class="project-list">
        <div class="container">
            <h1 class="d-none">hidden</h1>
            <div class="row">
                <div class="col-md-9 padd-large">
                    <h2 class="pjdetail-title">{{$data->name}}</h2>
                    <div class="investor-info">
                        <p><strong>- Chủ đầu tư: {{$data->investor}}</strong></p>
                        <p><strong>- Địa chỉ: {{$data->address}}</strong></p>
                        <p><strong>- Diện tích: {{$data->acreage}}</strong></p>
                        <p><strong>- Thời gian thi công: {{$data->time_project}}</strong></p>
                    </div>
                    <div class="pj-info">
                        <img src="{{ $data->image }}" alt="">
                        <p>{!! $data->meta !!}</p>
                        <img src="images/pj-detail2.png" alt="">
                        <p>{!! $data->content !!}</p>
                        <?php if(!empty($data->more_image)){
                            $more_image = json_decode($data->more_image);
                        } ?>
                        @if (!empty($more_image))
                            @foreach ($more_image as $item)
                                <div class="carousel-item">
                                    <img src="{{ $item }}" width="100%" alt="{{ $data->name }}">
                                </div>
                            @endforeach
                        @endif 
                        <div class="social-share"><img src="{{url('/')}}/public/images/social-share.png" alt=""></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-hot sticky-top">
                        <h2 class="news-title">Dự án liên quan</h2>
                        <div class="blog-trend">
                            @foreach($project_same_category as $item)
                            <div class="blog-trend__item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="blogtrend-photo">
                                            <a href="{{route('home.single-project',['slug'=>$item->slug])}}"><img src="{{$item->image}}" alt="{{$item->name}}"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="blogtrend-name"><a href="{{route('home.single-project',['slug'=>$item->slug])}}">{{$item->name}}</a></h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection