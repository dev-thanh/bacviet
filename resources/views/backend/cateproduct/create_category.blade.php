@extends('backend.layouts.app')
@section('controller', 'Danh mục sản phẩm' )
@section('controller_route', route('cateproduct.index'))
@section('action', renderAction(@$module['action']))
@section('content')

	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{{route('cateproduct.store')}}" method="POST">
					@csrf
               		<!-- @method('PUT') -->
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
		                    <li class="active">
		                        <a href="#activity" data-toggle="tab" aria-expanded="true">Danh mục sản phẩm</a>
		                    </li>
		                    <li class="">
		                    	<a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
		                    </li>
		                </ul>
		                <div class="tab-content">
		                    <div class="tab-pane active" id="activity">
								<div class="form-group">
									<label for="">Danh mục cha</label>
									<select name="parent_id" id="inputSltCate" class="form-control">
						      			<option value="0">- Danh mục cha --</option>
						      			<?php menuaddcategoryproduct($data,0,$str='',old('parent_id')); ?>   		
						      		</select>
								</div>
								<div class="form-group">
									<label for="">Tên danh mục</label>
									<input type="text" class="form-control" name="name" id="name" value="">
								</div>
								<div class="form-group">
									<label for="">Tên danh mục(tiếng anh)</label>
									<input type="text" class="form-control" name="name_en" id="name_en" value="">
								</div>
								<div class="form-group">
									<label for="">Đường dẫn tĩnh</label>
									<input type="text" class="form-control" name="slug" {{ isUpdate(@$module['action']) ? 'id="slug"' : null }} value="">
								</div>
								@if(isUpdate(@$module['action']))
									
									<div class="form-group">
										<label class="custom-checkbox">
		                                    <input type="checkbox" class="category" name="is_display_home" value="1" {{ @$data->is_display_home == 1 ? 'checked' : null  }}> Hiển thị trên trang chủ
		                                </label>
									</div>
								@else
									<div class="form-group">
										<label class="custom-checkbox">
		                                    <input type="checkbox" class="category" name="is_display_home" value="1" checked=""> Hiển thị trên trang chủ
		                                </label>
									</div>

								@endif


		                    </div>
		                    <div class="tab-pane" id="setting">
		                    	<div class="row">
		                    		<div class="col-sm-2">
		                    			<div class="form-group">
		                    				<label for="">Hình ảnh</label>
		                    				 <div class="image">
					                            <div class="image__thumbnail">
					                                <img src="{{__IMAGE_DEFAULT__}}"
					                                     data-init="{{ __IMAGE_DEFAULT__ }}">
					                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
					                                    <i class="fa fa-times"></i></a>
					                                <input type="hidden" value="" name="image"/>
					                                <div class="image__button" onclick="fileSelect(this)">
					                                	<i class="fa fa-upload"></i>
					                                    Upload
					                                </div>
					                            </div>
					                        </div>
		                    			</div>
		                    		</div>
		                    		<div class="col-sm-2">
		                    			<div class="form-group">
		                    				<label for="">Banner</label>
		                    				 <div class="image">
					                            <div class="image__thumbnail">
					                                <img src="{{__IMAGE_DEFAULT__}}"
					                                     data-init="{{ __IMAGE_DEFAULT__ }}">
					                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
					                                    <i class="fa fa-times"></i></a>
					                                <input type="hidden" value="" name="banner"/>
					                                <div class="image__button" onclick="fileSelect(this)">
					                                	<i class="fa fa-upload"></i>
					                                    Upload
					                                </div>
					                            </div>
					                        </div>
		                    			</div>
		                    		</div>
		                    		<div class="col-sm-8">
		                    			 <div class="form-group">
				                            <label>Title SEO</label>
				                            <input type="text" class="form-control" name="meta_title" value="">
				                        </div>

				                        <div class="form-group">
				                            <label>Meta Description</label>
				                            <textarea name="meta_description" id="" class="form-control" rows="5"></textarea>
				                        </div>

				                        <div class="form-group">
				                            <label>Meta Keyword</label>
				                            <input type="text" class="form-control" name="meta_keyword" value="">
				                        </div>
		                    		</div>
		                    	</div>
		                    </div>
		                    <button type="submit" class="btn btn-primary">Lưu lại</button>
		                </div>
		            </div>
				</form>
			</div>
		</div>
	</div>
@stop