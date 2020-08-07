@extends('backend.layouts.app')
@section('controller','Trang')
@section('controller_route',route('pages.list'))
@section('action','Danh sách')
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{{ route('pages.build.post') }}" method="POST">
					{{ csrf_field() }}
					<input name="type" value="{{ $data->type }}" type="hidden">

	               	<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Trang</label>
								<input type="text" class="form-control" value="{{ $data->name_page }}" disabled="">
				 				
								@if (\Route::has($data->route))
									<h5>
										<a href="{{ route($data->route) }}" target="_blank">
					                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					                        Link: {{ route($data->route) }}
					                    </a>
									</h5>
				                @endif
							</div>
							
						</div>
					</div>
					<div class="nav-tabs-custom">
				        <ul class="nav nav-tabs">
				        	<li class="active">
				            	<a href="#about" data-toggle="tab" aria-expanded="true">Về chúng tôi</a>
				            </li>
				            <li class="">
				            	<a href="#histrory" data-toggle="tab" aria-expanded="true">Lịch sử phát triển</a>
				            </li>
				            <li class="">
				            	<a href="#tamnhin" data-toggle="tab" aria-expanded="true">Tầm nhìn - sứ mệnh - giá trị cốt lõi</a>
				            </li>
				            <li class="">
				            	<a href="#seo" data-toggle="tab" aria-expanded="true">Cấu hình trang</a>
				            </li>
				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
				    	$content = json_decode($data->content);

				    } ?>
				    <div class="tab-content">
						
						<div class="tab-pane active" id="about">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
			                           <label>Hình ảnh</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ !empty($content->about->image) ?  $content->about->image : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$content->about->image }}" name="content[about][image]"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[about][title]" value="{{ @$content->about->title }}" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea class="content" name="content[about][desc]">{!! @$content->about->desc !!}</textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="histrory">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[history][title]" value="{{ @$content->history->title }}" class="form-control">
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="repeater" id="repeater">
						                <table class="table table-bordered table-hover histrory">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th>Nội dung</th>
							                    	<th width="20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
						                    	@if (!empty($content->history->content))
													@foreach ($content->history->content as $key => $value)
													    <?php $index = $loop->index + 1 ; ?>
														@include('backend.repeater.row-histrory')
													@endforeach
												@endif
											</tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'histrory', '.histrory')">Thêm
								            </button>
						                </div>
						            </div>
								</div>

							</div>
						</div>

						<div class="tab-pane" id="tamnhin">
							<div class="row">
								<div class="col-sm-4">
									<label for="" class="text-center text-uppercase" style="display: block;">Tầm nhìn</label>
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[vision][title]" value="{{ @$content->vision->title }}" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea class="content" name="content[vision][content]">{!! @$content->vision->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-4">
									<label for="" class="text-center text-uppercase" style="display: block;">Sứ mệnh</label>
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[mission][title]" value="{{ @$content->mission->title }}" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea class="content" name="content[mission][content]">{!! @$content->mission->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-4">
									<label for="" class="text-center text-uppercase" style="display: block;">Giá trị cốt lõi</label>
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[core_values][title]" value="{{ @$content->core_values->title }}" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea class="content" name="content[core_values][content]">{!! @$content->core_values->content !!}</textarea>
									</div>
								</div>
							</div>
						</div>

			            <div class="tab-pane" id="seo">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
			                           <label>Hình ảnh</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ $data->image ?  $data->image : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$data->image }}" name="image"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
			                           <label>Banner</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ $data->banner ?  $data->banner : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$data->banner }}" name="banner"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<label for="">Tiêu đề trang</label>
										<input type="text" name="meta_title" class="form-control" value="{{ @$data->meta_title }}">
									</div>
									<div class="form-group">
										<label for="">Mô tả trang</label>
										<textarea name="meta_description" 
										class="form-control" rows="5">{!! @$data->meta_description !!}</textarea>
									</div>
									<div class="form-group">
										<label for="">Từ khóa</label>
										<input type="text" name="meta_keyword" class="form-control" value="{!! @$data->meta_keyword !!}">
									</div>
									
									<div class="form-group">
										<label for="">Tiêu đề thẻ H1 ẩn</label>
										<input type="text" name="title_h1" class="form-control" value="{!! @$data->title_h1 !!}">
									</div>

								</div>
							</div>
			            </div>
			           <button type="submit" class="btn btn-primary">Lưu lại</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
@stop