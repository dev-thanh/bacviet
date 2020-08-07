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
				        		<a href="#criteria" data-toggle="tab" aria-expanded="true">Tiêu chí</a>
				        	</li>
				        	<li class="">
				        		<a href="#services" data-toggle="tab" aria-expanded="true">Dịch vụ</a>
				        	</li>
				        	<li class="">
				        		<a href="#gallery" data-toggle="tab" aria-expanded="true">Thư viện ảnh</a>
				        	</li>
				            <li class="">
				            	<a href="#seo" data-toggle="tab" aria-expanded="true">Cấu hình trang</a>
				            </li>
				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
				    	$content = json_decode($data->content);
				    }?>
				    <div class="tab-content">

						<div class="tab-pane active" id="criteria">
							<div class="row">
								<div class="col-sm-12">
									<div class="repeater" id="repeater">
						                <table class="table table-bordered table-hover criteria">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th width="200px">Ảnh nền</th>
							                    	<th width="200px">Icon</th>
							                    	<th>Tiêu đề</th>
							                    	<th width="20px" style="display: none;"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
						                    	@if (!empty($content->criteria))
						                    		@foreach ($content->criteria as $key => $value)
						                    			<tr>
															<td class="index">{{ $loop->index + 1 }}</td>
															<td>
														       <div class="image">
														           <div class="image__thumbnail">
														               <img src="{{ !empty($value->background) ? $value->background : __IMAGE_DEFAULT__ }}"
														               data-init="{{ __IMAGE_DEFAULT__ }}">
														               <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
														                <i class="fa fa-times"></i></a>
														               <input type="hidden" value="{{ @$value->background }}" name="content[criteria][{{ $key }}][background]"  />
														               <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
														           </div>
														       </div>
															</td>
															<td>
														       <div class="image">
														           <div class="image__thumbnail">
														               <img src="{{ !empty($value->icon) ? $value->icon : __IMAGE_DEFAULT__ }}"
														               data-init="{{ __IMAGE_DEFAULT__ }}">
														               <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
														                <i class="fa fa-times"></i></a>
														               <input type="hidden" value="{{ @$value->icon }}" name="content[criteria][{{ $key }}][icon]"  />
														               <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
														           </div>
														       </div>
															</td>
															<td>
																<input type="text" name="content[criteria][{{ $key }}][title]" class="form-control"
																value="{{ @$value->title }}">
															</td>
															<td style="text-align: center; display: none;">
														        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
														            <i class="fa fa-minus"></i>
														        </a>
														    </td>
														</tr>
						                    		@endforeach
						                    	@endif
											</tbody>
						                </table>
						                <div class="text-right">
						                  {{--   <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'criteria', '.criteria')">Thêm
								            </button> --}}
						                </div>
						            </div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="services">
							<div class="row">
								<div class="col-sm-12">
									<div class="repeater" id="repeater">
						                <table class="table table-bordered table-hover services">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th width="200px">Hình ảnh</th>
							                    	<th>Nội dung</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->services))
													@foreach ($content->services as $key => $value)
													    <?php $index = $loop->index + 1 ; ?>
														@include('backend.repeater.row-services')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'services', '.services')">Thêm
								            </button>
						                </div>
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

			            <div class="tab-pane" id="gallery">
			            	<div class="row">
			            		<div class="col-sm-12">
			            			<div class="form-group">
			            				<label for="">Tiêu đề</label>
			            				<input type="text" name="content[gallery][title]" value="{{ @$content->gallery->title }}" class="form-control">
			            			</div>
			            		</div>

			            		<div class="col-sm-12 image" style="margin-bottom: 20px">
		                            <button type="button" class="btn btn-success" onclick="fileMultiSelectCustom(this,'content[gallery_1][list_image]')"><i class="fa fa-upload"></i>  
		                                Chọn hình ảnh thư viện 1
		                            </button>
		                            <br><br>
		                            <div class="image__gallery">
		                            	@if (!empty($content->gallery_1->list_image))
		                            		@foreach ($content->gallery_1->list_image as $item)
		                            			<div class="image__thumbnail image__thumbnail--style-1">
		                            				<img src="{{ @$item }}">
	                            					<a href="javascript:void(0)" class="image__delete" onclick="urlFileMultiDelete(this)">
	                            						<i class="fa fa-times"></i>
	                            					</a>
	                            					<input type="hidden" name="content[gallery_1][list_image][]" value="{{ @$item }}">
		                            			</div>
		                            		@endforeach
		                            	@endif
		                            </div>
		                        </div>

		                        <div class="col-sm-12">
		                        	<div class="form-group">
		                        		<label for="">Nội dung mô tả thư viện ảnh 1</label>
		                        		<textarea class="content" name="content[gallery_1][content]">{!! @$content->gallery_1->content !!}</textarea>
									</div>
		                        </div>



								<div class="col-sm-12 image" style="margin-bottom: 20px">
		                            <button type="button" class="btn btn-success" onclick="fileMultiSelectCustom(this,'content[gallery_2][list_image]')"><i class="fa fa-upload"></i>  
		                                Chọn hình ảnh thư viện 2
		                            </button>
		                            <br><br>
		                            <div class="image__gallery">
		                            	@if (!empty($content->gallery_2->list_image))
		                            		@foreach ($content->gallery_2->list_image as $item)
		                            			<div class="image__thumbnail image__thumbnail--style-1">
		                            				<img src="{{ @$item }}">
	                            					<a href="javascript:void(0)" class="image__delete" onclick="urlFileMultiDelete(this)">
	                            						<i class="fa fa-times"></i>
	                            					</a>
	                            					<input type="hidden" name="content[gallery_2][list_image][]" value="{{ @$item }}">
		                            			</div>
		                            		@endforeach
		                            	@endif
		                            </div>
		                        </div>

		                        <div class="col-sm-12">
		                        	<div class="form-group">
		                        		<label for="">Nội dung mô tả thư viện ảnh 2</label>
		                        		<textarea class="content" name="content[gallery_2][content]">{!! @$content->gallery_2->content !!}</textarea>
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