@extends('admin.index')
@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">{{ !empty($title) ? $title : '' }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                        class="fas fa-expand"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <a href="{{ aurl('/departments/create') }}" class="btn btn-info">{{ trans('admin.add') }} <i
                        class="fa fa-plus"></i></a>
                <br />
                <hr />
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="jstree_list">
                        <table class="table">
                            <tr>
                                <td>اسم القسم</td>
                                <td>حالة القسم</td>
                                <td>العمليات</td>
                            </tr>
                            @foreach ($departments as $depart)
                                <tr>
                                    @if ($depart->children->count() > 0)
                                        <td><a
                                                href="{{ route('departments.index', ['department_id' => $depart->id]) }}">{{ $depart->department_name_ar }}</a>
                                        </td>
                                    @else
                                        <td>{{ $depart->department_name_ar }}</td>
                                    @endif

                                    <td>{{ $depart->status ? 'مفعل' : 'غير مفعل' }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('departments.edit', $depart) }}">تعديل</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $depart->id }}">
                                            حذف
                                        </button>
                                        @include('admin.departments.delete')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
    </div>
@endsection
