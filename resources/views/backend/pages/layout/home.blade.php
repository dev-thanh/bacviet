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
				            	<a href="#activity1" data-toggle="tab" aria-expanded="true">Tại sao chọn chúng tôi</a>
				            </li>

				            <li class="">
				            	<a href="#activity2" data-toggle="tab" aria-expanded="true">Các chỉ số</a>
				            </li>

				            <li class="">
				            	<a href="#activity3" data-toggle="tab" aria-expanded="true">Ý kiến khách hàng</a>
				            </li>

				        </ul>
				    </div>
				    <?php if(!empty($data->content)){
						$content = json_decode($data->content);

					} ?>
				    <div class="tab-content">

				    	<div class="tab-pane active" id="activity1">
				    		<div class="row">
				    			<div class="col-sm-12">
				    				<div class="form-group">
				    					<label for="">Tiêu đề khối</label>
				    					<input type="text" name="content[whychoose][title]" value="{{ @$content->whychoose->title }}" 
				    					class="form-control">
				    				</div>
				    			</div>
				    			<div class="col-sm-2">
				    				<div class="form-group">
			                           <label>Hình ảnh đại diện video</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ !empty($content->whychoose->image) ?  $content->whychoose->image : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$content->whychoose->image }}" name="content[whychoose][image]"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
				    			</div>

				    			<div class="col-sm-10">
				    				<div class="form-group">
				    					<label for="">Mô tả ngắn</label>
				    					<textarea class="form-control" name="content[whychoose][desc]" rows="5">{{ @$content->whychoose->desc }}</textarea>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Iframe video</label>
				    					<textarea class="form-control" name="content[whychoose][iframe]" rows="5">{{ @$content->whychoose->iframe }}</textarea>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-sm-12">
				    				<div class="repeater" id="repeater">
						                <table class="table table-bordered table-hover whychoose">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th width="200px">Icon</th>
							                    	<th>Nội dung</th>
							                    	{{-- <th style="width: 20px"></th> --}}
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->whychoose->list))
													@foreach ($content->whychoose->list as $id => $value)
													    <?php $index = $loop->index + 1 ; ?>
														@include('backend.repeater.row-whychoose')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						                {{-- <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'whychoose', '.whychoose')">Thêm
								            </button>
						                </div> --}}
						            </div>
				    			</div>
				    		</div>
				    	</div>

				    	<div class="tab-pane" id="activity2">
				    		<div class="row">
				    			<div class="col-sm-12">
				    				<div class="form-group">
				    					<label for="">Tiêu đề</label>
				    					<input type="text" name="content[indicators][title]" value="{{ @$content->indicators->title }}" class="form-control">
				    				</div>

				    				<div class="form-group">
				    					<label for="">Mô tả ngắn</label>
				    					<textarea class="form-control" name="content[indicators][desc]" rows="5">{{ @$content->indicators->desc }}</textarea>
				    				</div>
				    			</div>
				    			<div class="col-sm-12">
				    				<div class="repeater" id="repeater">
						                <table class="table table-bordered table-hover indicators">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th width="200px">Hình ảnh</th>
							                    	<th>Nội dung</th>
							                    	{{-- <th style="width: 20px"></th> --}}
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->indicators->list))
													@foreach ($content->indicators->list as $key => $value)
													    <?php $index = $loop->index + 1 ; ?>
														@include('backend.repeater.row-indicators')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						               	{{--  <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'indicators', '.indicators')">Thêm
								            </button>
						                </div> --}}
						            </div>
				    			</div>
				    		</div>
				    	</div>

			            <div class="tab-pane" id="activity3">
			            	<div class="row">
			            		<div class="col-sm-12">
			            			<div class="form-group">
			            				<label for="">Tiêu đề</label>
			            				<input type="text" name="content[reviews][title]" class="form-control" value="{{ @$content->reviews->title }}">
			            			</div>

			            			<div class="repeater" id="repeater">
						                <table class="table table-bordered table-hover reviews">
						                    <thead>
							                    <tr>
							                    	<th style="width: 30px;">STT</th>
							                    	<th width="200px">Hình ảnh</th>
							                    	<th>Nội dung</th>
							                    	<th style="width: 20px"></th>
							                    </tr>
						                	</thead>
						                    <tbody id="sortable">
												@if (!empty($content->reviews->list))
													@foreach ($content->reviews->list as $id => $value)
													    <?php $index = $loop->index + 1 ; ?>
														@include('backend.repeater.row-reviews')
													@endforeach
												@endif
						                    </tbody>
						                </table>
						                <div class="text-right">
						                    <button class="btn btn-primary" 
								            	onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'reviews', '.reviews')">Thêm
								            </button>
						                </div>
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