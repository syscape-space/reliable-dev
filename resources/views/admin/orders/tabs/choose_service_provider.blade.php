<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 by_city hidden">
	<div class="form-group">
		{!! Form::label('country_id',trans('admin.country_id')) !!}
		{!! Form::select('country_id',App\Models\Country::pluck('country_name_ar','id'),
		!empty($orders)?$orders->country_id:old('country_id')
		,['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 by_city hidden">
	<div class="form-group">
		{!! Form::label('city_id',trans('admin.city_id')) !!}
		<span class="city_id"></span>
	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12  vendor_list_box hidden">
	<div class="form-group">
		{!! Form::label('vendors',trans('admin.vendors'),['class'=>'col-md-3 control-label']) !!}
	<select class="form-control vendor_list"  multiple="multiple" style="width:100%" name="vendors[]">
		{{-- @if(!empty($orders))
		@foreach($orders->order_vendors()->get() as $order_vendor)
		 <option value="{{ $order_vendor->user_id }}" selected>{{ $order_vendor->user_id()->first()->name??'not found vendor' }}</option>
		@endforeach
		@endif --}}
	</select>
</div>
</div>
@push('js')
<script type="text/javascript">
$(document).ready(function(){

$(document).on('change','#choose_service_provider',function(){
 var choose_service_provider = $('#choose_service_provider option:selected').val();
 if(choose_service_provider == 'by_city'){
 	$('.by_city').removeClass('hidden');
 	$('.by_filter').addClass('hidden');
 }else if(choose_service_provider == 'by_filter'){
 	$('.by_city').addClass('hidden');
 	$('.by_filter').removeClass('hidden');
 	$('.city_id').html('');
	$('#country_id').val(null).trigger('change');
 	loadVendorList({_token:'{{ csrf_token() }}',get_by:'filter'});
 }else{
 	$('.by_city').addClass('hidden');
 	$('.by_filter').addClass('hidden');
 }
});

@if(!empty($orders))
var choose_service_provider = '{{ $orders->choose_service_provider }}';
 if(choose_service_provider == 'by_city'){
 	$('.by_city').removeClass('hidden');
 	$('.by_filter').addClass('hidden');
 }else if(choose_service_provider == 'by_filter'){
 	$('.by_city').addClass('hidden');
 	$('.by_filter').removeClass('hidden');
 	$('.city_id').html('');
	$('#country_id').val(null).trigger('change');
 	loadVendorList({_token:'{{ csrf_token() }}',get_by:'filter'});
 }else{
 	$('.by_city').addClass('hidden');
 	$('.by_filter').addClass('hidden');
 }


 if('{{ $orders->city_id }}' > 0){
		loadVendorList({_token:'{{ csrf_token() }}',get_by:'city',city_id:'{{ $orders->city_id }}',});
	}
@endif

function loadVendorList(param){
	$('.vendor_list_box').removeClass('hidden');
	$('.vendor_list').val(null).trigger('change');
	var department_id = $('.department_id').val();
var vendor_list =	$(".vendor_list").select2({
		ajax: {
			url: "{{ aurl('users/get/vendor') }}",
			dataType: 'json',
			delay: 250,
			type: "POST",
			multiple: true,
			placeholder: "{{ trans('admin.choose_vendor') }}",
 			allowClear: true,
			data: function (params) {
				var search = Object.assign(param,{
					search_user: params.term,
					department_id:department_id,
					page: params.page
				});
				return search;
			},
			processResults: function (data, params) {
				return {
				results: data.items,
				};
		},
		cache: true
		},
	});



@if(!empty($orders))
@foreach($orders->order_vendors()->get() as $order_vendor)
// <option value="{{ $order_vendor->user_id }}" selected>{{ $order_vendor->user_id()->first()->name??'not found vendor' }}</option>
 vendor_list.append($('<option value="{{ $order_vendor->user_id }}">').text('{{ $order_vendor->user_id()->first()->name??'not found vendor' }}'));
 vendor_list.val('{{ $order_vendor->user_id }}').trigger("change");
@endforeach
@endif

// 	var vals = ["Trade Fair", "CA", "Party"];

// vals.forEach(function(e){
// if(!vendor_list.find('option:contains(' + e + ')').length)
//   vendor_list.append($('<option>').text(e));
// });


}

// When Choose or Select City
$(document).on('change','#city_id',function(){
	var city_id = $('#city_id option:selected').val();
	if(city_id > 0){
		loadVendorList({_token:'{{ csrf_token() }}',get_by:'city',city_id:city_id,});
	}
});

});
</script>
@endpush