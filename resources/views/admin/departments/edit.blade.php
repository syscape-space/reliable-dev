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
                        <a href="{{ aurl('departments') }}" style="color:#343a40" class="dropdown-item">
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
            <form action="{{ route('departments.update',$department) }}" method="POST">
				@csrf
				@method('PUT')
                <div class="form-group">
                    <label for="">اسم القسم بالعربية</label>
                    <input type="text" name="department_name_ar" class="form-control" value="{{$department->department_name_ar}}">
                </div>
                <div class="form-group">
                    <label for="">اسم القسم بالانجليزية</label>
                    <input type="text" name="department_name_en" class="form-control" value="{{$department->department_name_en}}">
                </div>
                <div class="form-group">
					<label for="">فرعي من</label>
                    <select name="parent" id="" class="form-control">
						<option value="">قسم رئيسي</option>
                        @foreach ($departments as $depart)
                            <option value="{{$depart->id}}" {{$department->parent==$depart->id?'selected':''}}>{{$depart->department_name_ar}}</option>
                        @endforeach
                    </select>
                </div>
				<div class="form-group">
                    <label for="">تفعيل القسم</label>
                    <input type="checkbox" name="status" {{$department->status?'checked':''}}>
                </div>
				<button type="submit" class="btn btn-primary">تعديل</button>
            </form>

        </div>


        <!-- /.row -->
    </div>
    <!-- /.card-body -->
@endsection
