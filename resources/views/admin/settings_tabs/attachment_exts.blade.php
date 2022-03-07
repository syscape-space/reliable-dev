@php
$exts = [
'audio'=>['mp3','wav','ogg'],
'archive'=>['rar','zip','zip7'],
'video'=>['mp4','wmv','avi','3gp'],
'image'=>['jpg','jpeg','png','gif','bmp',],
'file'=>['pdf','docx','doc','xlxs','csv','ppt'],
];
$i=0;



@endphp

<div class="col-md-6 col-lg-6">
	<div class="form-group">
		{!! Form::label($name,trans('admin.'.$name),['class'=>'control-label']) !!}
		<div  style="max-height: 400px; overflow: auto;">
			<table class="table table-bordered table-hover table-striped">
				@foreach($exts as $key=>$val)
				@if($i == 0)
				<thead>
					<td><small>{{ trans('admin.ext') }}</small></td>
					<td>{{ trans('admin.enable') }}</td>
					<td><small>{{ trans('admin.size') }}</small></td>
					<td><small>{{ trans('admin.size_type') }}</small></td>
				</thead>
				@php $i++ @endphp
				@endif
				@foreach($val as $ext)
@php
$checkExt = AdminPanelCheckExt($name,$ext);
@endphp
@push('js')
<script type="text/javascript">
$(document).ready(function(){
 $(document).on('click','#{{ $name.'_'.$ext }}',function(){
  if($('#{{ $name.'_'.$ext }}').is(':checked')){
  	$('.{{ $name.'_'.$ext }}_size_type,.{{ $name.'_'.$ext }}_size').prop('disabled',false).prop('readonly',false);
  	$('.{{ $name.'_'.$ext }}_size').val(0);
  }else{
  	$('.{{ $name.'_'.$ext }}_size_type,.{{ $name.'_'.$ext }}_size').prop('disabled',true).prop('readonly',true);
  }
 });

 @if(!empty($checkExt['ext']))
  	$('.{{ $name.'_'.$ext }}_size_type,.{{ $name.'_'.$ext }}_size').prop('disabled',false).prop('readonly',false);
  	$('.{{ $name.'_'.$ext }}_size').val(0);
 @else
  	$('.{{ $name.'_'.$ext }}_size_type,.{{ $name.'_'.$ext }}_size').prop('disabled',true).prop('readonly',true);
 @endif
});
</script>
@endpush
				<tbody>
					<tr>
						<td><i class="fa fa-{{ $key }} fa-file-{{ $key }}"></i> {{ $ext }} </td>
						<td>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input checkinput" name="{{ $name }}[]"
									{{ !empty($checkExt['ext'])?'checked':'' }}
									value="{{ $ext }}" id="{{ $name.'_'.$ext }}">
									<label class="custom-control-label" for="{{ $name.'_'.$ext }}"></label>
								</div>
							</div>
						</td>

						<td>
							<input type="text" class="form-control {{ $name.'_'.$ext }}_size" style="width:100px" name="{{ $name.'_size' }}[]" value="{{ $checkExt['size'] }}" {{ empty($checkExt['size'])?'readonly disabled':'' }} >
						</td>
						<td>
							{!! Form::select($name.'_size_type[]',[
							'kb'=>trans('admin.kb'),
							'mb'=>trans('admin.mb'),
							'gb'=>trans('admin.gb')
							],$checkExt['size_type'],[
								'class'=>'form-control '.$name.'_'.$ext.'_size_type'
							]) !!}
						</td>
					</tr>
				</tbody>
				@endforeach
				@endforeach
			</table>
		</div>
	</div>
</div>