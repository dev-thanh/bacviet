@extends('backend.layouts.app')
@section('controller', 'Danh mục dự án' )
@section('controller_route', route('category.index'))
@section('action', 'Danh sách')
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <div class="btnAdd">
                    <a href="{{ route($module['module'].'.create') }}">
                        <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</fa>
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                            <th width="20px">STT</th>
                            <th>Tên danh mục</th>
                            <th>Liên kết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td><input type="checkbox" name="chkItem[]" value="{!! $item->id !!}"></td>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    {{ $item->name }}
                                    @if ($item->is_display_home == 1)
                                        <label class="label label-success">Hiển thị trang chủ</label>
                                    @endif
                                </td>
                                <td><a href="{{ route('home.category-project' , $item->slug) }}" target="_blank">{{ route('home.category-project' , $item->slug) }}</a></td>
                                <td>
                                    <div>
                                        <a href="{{ route('category.edit', ['id'=> $item->id]) }}" title="Sửa">
                                            <i class="fa fa-pencil fa-fw"></i> Sửa
                                        </a> &nbsp; &nbsp; &nbsp;
                                          <a href="javascript:void(0);" class="btn-destroy" 
                                          data-href="{{ route( 'category.destroy',  $item->id ) }}"
                                          data-toggle="modal" data-target="#confim">
                                          <i class="fa fa-trash-o fa-fw"></i> Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
