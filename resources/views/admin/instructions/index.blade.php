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
                <a href="{{ aurl('/instructions/create') }}" class="btn btn-info">{{ trans('admin.add') }} <i
                        class="fa fa-plus"></i></a>
                <br />
                <hr />
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="jstree_list">
                        <table class="table">
                            <tr>
                                <td>الاسم</td>
                                <td>المحتوى</td>
                                <td>العمليات</td>
                            </tr>
                            @foreach ($instructions as $instruction)
                                <tr>
                                    <td>{{ $instruction->name }}</td>
                                    <td>{{ $instruction->content }}</td> 
                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ route('instructions.edit', $instruction) }}">تعديل</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $instruction->id }}">
                                            حذف
                                        </button>
                                        @include('admin.instructions.delete')
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
