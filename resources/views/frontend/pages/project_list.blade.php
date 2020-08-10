<?php $curent_page = request()->get('page') ? request()->get('page') : '1';
    $language=request()->session()->get('lang');
 ?>
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
                <li class="breadcrumb-item active" aria-current="page">{{ __('project') }}</li>
              </ol>
            </nav>
        </div>
    </section>
    <section class="project-list">
        <div class="container">
            <h1 class="d-none">hidden</h1>
            <div class="row">
                @if (count($data))
                    @foreach ($data as $item)
                    <div class="col-md-4">
                        <div class="pj-item">
                            <div class="pj-photo">
                                <a href="{{route('home.single-project',['slug'=>$item->slug])}}" class="pj-item-photo" title="">
                                    <img src="{{$item->image}}" alt="">
                                    <span class="pj-view"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                            <div class="pj-detail">
                                @if($language=='vi')
                                <h4 class="pj-name"><a href="project-detail.php" title="">{{$item->name}}</a></h4>
                                <p class="pj-des">{!!$item->content!!}</p>
                                @else
                                <h4 class="pj-name"><a href="project-detail.php" title="">{{$item->name_en}}</a></h4>
                                <p class="pj-des">{!!$item->content_en!!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="paginations">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <!-- {{$data->links()}} -->
            <li class="page-item @if($curent_page==1) disabled @endif">
              <a class="page-link" href="{{route('home.project')}}?page={{$curent_page-1}}" tabindex="-1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            </li>
            @for($i = 0; $i < $data->lastpage(); $i++)
            <li class="page-item" data-page="{{$i+1}}"><a @if($curent_page == $i+1) onclick="return false;" @endif class="page-link" href="{{route('home.project')}}?page={{$i+1}}">{{$i+1}}</a></li>
            @endfor
            <li class="page-item @if($curent_page==$data->lastpage()) disabled @endif">
              <a class="page-link" href="{{route('home.project')}}?page={{$curent_page+1}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li>
          </ul>
        </nav>
    </section>
    <script>
        jQuery(document).ready(function($) {
            $('[data-page="{{$curent_page}}"]').addClass('active');
        });
    </script>
    @endsection