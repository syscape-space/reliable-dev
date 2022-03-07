@if(!empty($file_name))
@push('js')
<script type="text/javascript">
$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap_{{ $file_name }}"); //Fields wrapper
	var add_button      = $(".add_field_button_{{ $file_name }}"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(
`
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
<div class="row">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
	<div class="form-group">
		<label for="{{ $file_name }}">{{ trans('admin.upload_'.$file_name) }}</label>
		<div class="input-group">
			<div class="custom-file">
				{!! Form::file($file_name.'[]',['class'=>'custom-file-input','placeholder'=>trans('admin.upload_'.$file_name),"accept"=>it()->acceptedMimeTypes("image"),"id"=>"".$file_name]) !!}
				{!! Form::label($file_name,trans('admin.upload_'.$file_name),['class'=>'custom-file-label']) !!}
			</div>
			<div class="input-group-append">

			</div>
		</div>
	</div>
</div>
@if($file_name == 'commercial_records')
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('commercial_id',trans('admin.commercial_id'),['class'=>' control-label']) !!}
            {!! Form::text('commercial_id[]',old('commercial_id'),['class'=>'form-control','placeholder'=>trans('admin.commercial_id')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('commercial_end_at',trans('admin.commercial_end_at')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('commercial_end_at[]','',['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.commercial_end_at'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>'control-label']) !!}
            {!! Form::textarea('commercial_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@elseif($file_name == 'qualifications')
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('qualification_name',trans('admin.qualification_name'),['class'=>' control-label']) !!}
            {!! Form::text('qualification_name[]','',['class'=>'form-control','placeholder'=>trans('admin.qualification_name')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>' control-label']) !!}
            {!! Form::textarea('qualifications_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@elseif($file_name == 'experiences')
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('experience_name',trans('admin.experience_name'),['class'=>' control-label']) !!}
            {!! Form::text('experience_name[]','',['class'=>'form-control','placeholder'=>trans('admin.experience_name')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>' control-label']) !!}
            {!! Form::textarea('experience_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@elseif($file_name == 'licenses')
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('license_name',trans('admin.license_name'),['class'=>' control-label']) !!}
            {!! Form::text('license_name[]','',['class'=>'form-control','placeholder'=>trans('admin.license_name')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('license_end_at',trans('admin.license_end_at')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('license_end_at[]','',['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.license_end_at'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>'control-label']) !!}
            {!! Form::textarea('license_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@endif
<a href="#" class="btn btn-danger remove_field"><i class="fa fa-trash"></i></a>
</div>
</div>
    	`); //add input box
		}
	});

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault();
 $(this).parent('div').parent('div').remove();
 x--;
	})
});
</script>
@endpush

<div class="row input_fields_wrap_{{ $file_name }} ">
    	<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
	    <div class="form-group">
	        <label for="{{ $file_name }}">{{ trans('admin.upload_'.$file_name) }}</label>
	        <div class="input-group">
	            <div class="custom-file">
	                {!! Form::file($file_name.'[]',['class'=>'custom-file-input','placeholder'=>trans('admin.upload_'.$file_name),"accept"=>it()->acceptedMimeTypes("image|pdf"),"id"=>"".$file_name]) !!}
	                {!! Form::label($file_name,trans('admin.upload_'.$file_name),['class'=>'custom-file-label']) !!}
	            </div>
	            <div class="input-group-append">
	                {{-- <span class="input-group-text" id="">{{ trans('admin.upload') }}</span> --}}
	            </div>
	        </div>
	    </div>
    	</div>
@if($file_name == 'commercial_records')
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('commercial_id',trans('admin.commercial_id'),['class'=>' control-label']) !!}
            {!! Form::text('commercial_id[]',old('commercial_id'),['class'=>'form-control','placeholder'=>trans('admin.commercial_id')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('commercial_end_at',trans('admin.commercial_end_at')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('commercial_end_at[]','',['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.commercial_end_at'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>'control-label']) !!}
            {!! Form::textarea('commercial_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@elseif($file_name == 'qualifications')
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('qualification_name',trans('admin.qualification_name'),['class'=>' control-label']) !!}
            {!! Form::text('qualification_name[]','',['class'=>'form-control','placeholder'=>trans('admin.qualification_name')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>' control-label']) !!}
            {!! Form::textarea('qualifications_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@elseif($file_name == 'experiences')
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('experience_name',trans('admin.experience_name'),['class'=>' control-label']) !!}
            {!! Form::text('experience_name[]','',['class'=>'form-control','placeholder'=>trans('admin.experience_name')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>' control-label']) !!}
            {!! Form::textarea('experience_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@elseif($file_name == 'licenses')
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <div class="form-group">
        {!! Form::label('license_name',trans('admin.license_name'),['class'=>' control-label']) !!}
            {!! Form::text('license_name[]','',['class'=>'form-control','placeholder'=>trans('admin.license_name')]) !!}
    </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('license_end_at',trans('admin.license_end_at')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('license_end_at[]','',['class'=>'form-control float-right datepicker','placeholder'=>trans('admin.license_end_at'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('comment',trans('admin.comment'),['class'=>'control-label']) !!}
            {!! Form::textarea('license_comment[]','',['class'=>'form-control','placeholder'=>trans('admin.comment'),'style'=>'height:70px']) !!}
    </div>
</div>
@endif
</div>

<button class="float-right btn btn-success add_field_button_{{ $file_name }}"><i class="fa fa-plus-square"></i></button>

@endif