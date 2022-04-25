<div class="modal fade" id="delete{{$instruction->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{trans("admin.delete")}} </h4>
				<button class="close" data-dismiss="modal">x</button>
			</div>
            <form action="{{route('instructions.destroy',$instruction)}}" method="POST">
                @csrf
                @method('DELETE')
			<div class="modal-body">
				<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> {{trans("admin.ask-delete")}} <span id="count"></span> {{trans("admin.record")}} </div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
        <button type="submit" class="btn btn-primary">نعم</button>
			</div>
        </form>
		</div>
	</div>
</div>