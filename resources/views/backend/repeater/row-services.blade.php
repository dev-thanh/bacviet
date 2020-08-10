<?php $key  = isset($key) ? $key : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index">{{ $index }}</td>
	<td>
		<div class="form-group">
			<label for="">Hình ảnh</label>
			<div class="image">
	           	<div class="image__thumbnail">
	               <img src="{{ !empty($value->background) ? $value->background : __IMAGE_DEFAULT__ }}"  
	               data-init="{{ __IMAGE_DEFAULT__ }}">
	               <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
	                <i class="fa fa-times"></i></a>
	               <input type="hidden" value="{{ @$value->background }}" name="content[services][{{ $key }}][background]"  />
	               <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
	           	</div>
	       	</div>
		</div>
	</td>
	<td>
		<div class="form-group">
			<label for="">Tiêu đề</label>
			<input type="text" name="content[services][{{ $key }}][title]" class="form-control" value="{{ @$value->title }}">
		</div>
		<div class="form-group">
			<label for="">Tiêu đề(tiếng anh)</label>
			<input type="text" name="content[services][{{ $key }}][title_en]" class="form-control" value="{{ @$value->title_en }}">
		</div>
		<div class="form-group">
			<label for="">Đường dẫn tĩnh</label>
			<input type="text" name="content[services][{{ $key }}][slug]" class="form-control" value="{{ @$value->slug }}" required="">
		</div>
		<div class="form-group">
			<label for="">Mô tả</label>
			<textarea id="content{{ $key }}" name="content[services][{{ $key }}][content]">{!! @$value->content !!}</textarea>
		</div>
		<div class="form-group">
			<label for="">Mô tả(tiếng anh)</label>
			<textarea id="content_en{{ $key }}" name="content[services][{{ $key }}][content_en]">{!! @$value->content_en !!}</textarea>
		</div>
		<div class="form-group">
			<label for="">Liên kết</label>
			<input type="text" name="content[services][{{ $key }}][link]" class="form-control" value="{{ @$value->link }}">
		</div>
	</td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>

<script>
	CKEDITOR.replace( 'content{{ $key }}' );
	CKEDITOR.replace( 'content_en{{ $key }}' );
</script>