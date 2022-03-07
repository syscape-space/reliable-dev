@extends('admin.index')
@section('content')
{!! Form::open(["method" => "post","url" => [aurl('/countries/multi_delete')]]) !!}
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">{{!empty($title)?$title:''}}</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<a href="{{aurl('/departments/create')}}" class="btn btn-info">{{trans('admin.add')}} <i class="fa fa-plus"></i></a>
				<span class="goto hidden">
					({{trans('admin.actions')}} : <span class="goto_text"></span>)
				<a href="" class="btn btn-primary editbtn">{{trans('admin.edit')}} <i class="fa fa-edit"></i> </a>
				{!! Form::open(['method'=>'delete','url'=>'','style'=>'display:inline','class'=>'delform']) !!}
 				<a href="#" class="btn btn-danger delete_this" namedel="" formid="">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
				{!! Form::close() !!}
				</span>

				<br />
			<hr />
			<div class="col-md-12 col-lg-12 col-xs-12">
				<div class="jstree_list"></div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
<div class="modal fade" id="multi_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{trans("admin.delete")}} </h4>
				<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> {{trans("admin.ask-delete")}} <span id="count"></span> {{trans("admin.record")}} </div>
				<div class="check_delete">{{trans("admin.check-delete")}}</div>
			</div>
			<div class="modal-footer">
				{!! Form::submit(trans("admin.approval"), ["class" => "btn btn-danger btn-flat delete_done"]) !!}
				<a class="btn btn-default" data-dismiss="modal">{{trans("admin.cancel")}}</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@push('js')
<script type="text/javascript">
$(document).on('click','.delete_this',function(){
//delete_this
var namedel = $(this).attr('namedel');
var formid = $(this).attr('formid');
	$('.deletemsg').text('{{ trans('admin.ask-delete') }} : '+namedel);
	$('.delete_dep').attr('action','{{ aurl('departments/') }}/'+formid);
	$('#deletedep').modal('show');
});
</script>
<!-- Modal -->
<div id="deletedep" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{ trans('admin.delete') }}</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p class="deletemsg"></p>
			</div>
			<div class="modal-footer">
				{!! Form::open(['class'=>'delete_dep','method'=>'delete']) !!}
				<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</button>
				<button type="submit" class="btn btn-danger" >{{ trans('admin.delete') }}</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function () {
// Check If Button Available With Event//
$('.jstree_list').jstree({
"core" : {
'data' : {!! load_dep(Request::segment(2)) !!},
"themes" : {
"multiple" : false,
"animation" : 0,
"variant" : "large"
}
},
 'types': {
            // 'selectable': {
            //     'icon': 'https://img.favpng.com/9/20/2/categories-icon-configuration-icon-document-icon-png-favpng-08ksTSTWmWu1hwYrd3MPLUf8L.jpg'
            // },
            // 'default': {
            //     'icon': 'https://img.favpng.com/9/20/2/categories-icon-configuration-icon-document-icon-png-favpng-08ksTSTWmWu1hwYrd3MPLUf8L.jpg'
            // }
        },
"checkbox" : {
"keep_selected_style" : true
},
"plugins" : [ "changed","types","conditionalselect","dnd","massload","wholerow", "radio" ]
});
$('.jstree_list')
// listen for event
.on('changed.jstree', function (e, data) {
var i, j, r = [];
var t = [];
for(i = 0, j = data.selected.length; i < j; i++) {
r.push(data.instance.get_node(data.selected[i]).id);
t.push(data.instance.get_node(data.selected[i]).text);
}
$('.goto').removeClass('hidden');
$('.goto_text').text(t.join(', '));
$('.goto').attr('href','{{ aurl('departments') }}/'+r.join(', ')+'/'+t.join(', '));
$('.editbtn').attr('href','{{ aurl('departments') }}/'+r.join(', ')+'/edit');
$('.delform').attr('action','{{ aurl('departments') }}/'+r.join(', '));
$('.delform').addClass('form','form'+r.join(', '));
$('.delete_this').attr('namedel',t.join(', '));
$('.delete_this').attr('formid',r.join(', '));
var department_id = r.join(', ');
})
// create the instance
.jstree();
});
</script>
@endpush
@endsection