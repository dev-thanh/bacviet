<?php $language=request()->session()->get('lang');?>
@extends('frontend.master')
@section('main')
    <div class="col-md-8 flex-center-center">
        <div class="header-nav">
            
            

        </div>


        <div class="sidebar-cate">
        <!-- <h2><span>DANH MỤC SẢN PHẨM</span></h2> -->
        <div class="cate-list">
            <?php $data = showCategories_product($menuHeader, $parent_id=6,$level = '',$language,$li=0);?>
        </div>
    </div>

@endsection