<div class="form-group">
	{!! Form::label('arbitrators',trans('admin.arbitrators'),['class'=>'col-md-3 control-label']) !!}
<select class="form-control arbitrators_list"  multiple="multiple" style="width:100%" name="arbitrators[]"></select>
</div>

@push('js')
<script type="text/javascript">
$(document).ready(function(){
$(document).on('change','#assigning_arbitration',function(){
var assigning_arbitration = $('#assigning_arbitration option:selected').val();
if(assigning_arbitration == 'yes'){
	$('.arbitrators_list_box').removeClass('hidden');
	loadarbitratorsList({_token:'{{ csrf_token() }}'});
}else{
	$('.arbitrators_list_box').addClass('hidden');
}
});

@if(!empty($orders))
var assigning_arbitration = '{{ $orders->assigning_arbitration }}';
if(assigning_arbitration == 'yes'){
	$('.arbitrators_list_box').removeClass('hidden');
	loadarbitratorsList({_token:'{{ csrf_token() }}'});
}else{
	$('.arbitrators_list_box').addClass('hidden');
}
@endif

function loadarbitratorsList(param){
	$('.arbitrators_list_box').removeClass('hidden');
	$('.arbitrators_list').val(null).trigger('change');
	var department_id = $('.department_id').val();
	var arbitrators_list = $(".arbitrators_list").select2({
		ajax: {
			url: "{{ aurl('users/get/arbitrators') }}",
			dataType: 'json',
			delay: 250,
			type: "POST",
			multiple: true,
			placeholder: "{{ trans('admin.choose_arbitrators') }}",
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
	@foreach($orders->arbitrators()->get() as $arbitrator)
	 arbitrators_list.append($('<option value="{{ $arbitrator->arbitrator_id }}">').text('{{ $arbitrator->arbitrator_id()->first()->name??'not found vendor' }}'));
	 arbitrators_list.val('{{ $arbitrator->arbitrator_id }}').trigger("change");
	@endforeach
@endif

}
});
</script>
@endpush