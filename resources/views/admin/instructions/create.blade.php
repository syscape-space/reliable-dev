@extends('admin.index')
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
                    <span>
                        {{ !empty($title) ? $title : '' }}
                    </span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{ aurl('instructions') }}" style="color:#343a40" class="dropdown-item">
                            <i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
                    </div>
                </div>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                        class="fas fa-expand"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('instructions.store') }}" method="POST">
				@csrf
                <div class="form-group">
                    <label for="">اسم التعليمة </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">محتوى التعليمة </label>
                    <textarea type="text" name="content" class="form-control"></textarea>
                </div>
				<button type="submit" class="btn btn-primary">إضافة</button>
            </form>

        </div>


        <!-- /.row -->
    </div>
    <!-- /.card-body -->
@endsection
