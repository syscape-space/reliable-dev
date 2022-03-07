<div class="alert alert-info">

<div class="input_case_against">
    	@if(!empty($orders))
    	 @foreach($orders->order_case_againsts()->get() as $against)
    	  <div class="row">
	    	<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	    		<div class="form-group">
						{!! Form::label('name',trans('admin.name'),['class'=>' control-label']) !!}
						{!! Form::text('name[]',$against->name,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
				</div>
	    	</div>
	    	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	    		<div class="form-group">
						{!! Form::label('id_number',trans('admin.id_number'),['class'=>' control-label']) !!}
						{!! Form::text('id_number[]',$against->id_number,['class'=>'form-control','placeholder'=>trans('admin.id_number')]) !!}
				</div>
	    	</div>
	    	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	    		<div class="form-group">
						{!! Form::label('nationality',trans('admin.nationality'),['class'=>' control-label']) !!}
						{!! Form::text('nationality[]',$against->nationality,['class'=>'form-control','placeholder'=>trans('admin.nationality')]) !!}
				</div>
	    	</div>
	    	<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">

	    	</div>
	    </div>
    	 @endforeach
    	@else
	    <div class="row">
	    	<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
	    		<div class="form-group">
						{!! Form::label('name',trans('admin.name'),['class'=>' control-label']) !!}
						{!! Form::text('name[]',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
				</div>
	    	</div>
	    	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	    		<div class="form-group">
						{!! Form::label('id_number',trans('admin.id_number'),['class'=>' control-label']) !!}
						{!! Form::text('id_number[]',old('id_number'),['class'=>'form-control','placeholder'=>trans('admin.id_number')]) !!}
				</div>
	    	</div>
	    	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
	    		<div class="form-group">
						{!! Form::label('nationality',trans('admin.nationality'),['class'=>' control-label']) !!}
						{!! Form::text('nationality[]',old('nationality'),['class'=>'form-control','placeholder'=>trans('admin.nationality')]) !!}
				</div>
	    	</div>
	    	<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
	    		<a href="#" class="remove_case_against btn btn-danger btn-sm mt-4"><i class="fa fa-trash"></i></a>
	    	</div>
	    </div>
    	@endif


</div>
 <button class="add_field_case_against btn btn-success btn-sm"><i class="fa fa-plus"></i></button>
@push('js')
<script type="text/javascript">
$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_case_against"); //Fields wrapper
	var add_button      = $(".add_field_case_against"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(`
<div class="row">
    	<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
    		<div class="form-group">
					{!! Form::label('name',trans('admin.name'),['class'=>' control-label']) !!}
					{!! Form::text('name[]',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
			</div>
    	</div>
    	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    		<div class="form-group">
					{!! Form::label('id_number',trans('admin.id_number'),['class'=>' control-label']) !!}
					{!! Form::text('id_number[]',old('id_number'),['class'=>'form-control','placeholder'=>trans('admin.id_number')]) !!}
			</div>
    	</div>
    	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
    		<div class="form-group">
					{!! Form::label('nationality',trans('admin.nationality'),['class'=>' control-label']) !!}
					{!! Form::text('nationality[]',old('nationality'),['class'=>'form-control','placeholder'=>trans('admin.nationality')]) !!}
			</div>
    	</div>
    	<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
    		<a href="#" class="remove_case_against btn btn-danger btn-sm mt-4"><i class="fa fa-trash"></i></a>
    	</div>
    </div>
				`); //add input box
		}
	});

	$(wrapper).on("click",".remove_case_against", function(e){ //user click on remove text
		e.preventDefault();
 $(this).parent('div').parent('div').remove();
 x--;
	})
});
</script>
@endpush
@if(!empty($case_against) && count($case_against))
@else
{{-- <center>{{ trans('admin.no_vendor_found') }}</center> --}}
@endif
</div>
