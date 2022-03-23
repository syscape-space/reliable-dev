
@extends('admin.index')
@section('content')
    @if (request('membership_type') == 'vendor')
        <div class="d-flex flex-wrap">
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'account_type' => 'company']) }}"
                class="btn btn-sm m-1 btn-primary">
                <i class="fas fa-building"></i> الشركات
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_type', 'company')->where('membership_type', 'vendor')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'account_type' => 'individual']) }}"
                class="btn btn-sm m-1 btn-primary">
                <i class="fas fa-user"></i> افراد
                <span
                    class="badge bg-light text-info">{{ App\Models\User::where('account_type', 'individual')->where('membership_type', 'vendor')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'status' => 'active']) }}"
                class="btn btn-sm m-1 btn-success">
                <i class="fas fa-dot-circle"></i> مفعل
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'active')->where('membership_type', 'vendor')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'status' => 'pending']) }}"
                class="btn btn-sm m-1 btn-danger">
                <i class="fas fa-dot-circle"></i> غير مفعل
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'pending')->where('membership_type', 'vendor')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'status' => 'refused']) }}"
                class="btn btn-sm m-1 btn-danger">
                <i class="fas fa-ban"></i> منتهي الترخيص
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'refused')->where('membership_type', 'vendor')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'status' => 'ban']) }}"
                class="btn btn-sm m-1 btn-danger">
                <i class="fas fa-hand-paper"></i> موقف
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'ban')->where('membership_type', 'vendor')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'vendor', 'status' => 'ban']) }}"
                class="btn btn-sm m-1 btn-danger">
				سجل تجاري منتهي
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\UserCommercial::where('commercial_end_at','<=',today()->format("Y-m-d"))->count() }}</span>
            </a>
        </div>
    @elseif(request('membership_type') == 'user')
        <div class="d-flex flex-wrap">
            <a href="{{ route('users.index', ['membership_type' => 'user', 'account_type' => 'company']) }}"
                class="btn btn-sm m-1 btn-primary">
                <i class="fas fa-building"></i> الشركات
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_type', 'company')->where('membership_type', 'user')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'user', 'account_type' => 'individual']) }}"
                class="btn btn-sm m-1 btn-primary">
                <i class="fas fa-user"></i> افراد
                <span
                    class="badge bg-light text-info">{{ App\Models\User::where('account_type', 'individual')->where('membership_type', 'user')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'user', 'status' => 'active']) }}"
                class="btn btn-sm m-1 btn-success">
                <i class="fas fa-dot-circle"></i> مفعل
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'active')->where('membership_type', 'user')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'user', 'status' => 'pending']) }}"
                class="btn btn-sm m-1 btn-danger">
                <i class="fas fa-dot-circle"></i> غير مفعل
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'pending')->where('membership_type', 'user')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'user', 'status' => 'refused']) }}"
                class="btn btn-sm m-1 btn-danger">
                <i class="fas fa-ban"></i> منتهي الترخيص
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'refused')->where('membership_type', 'user')->count() }}</span>
            </a>
            <a href="{{ route('users.index', ['membership_type' => 'user', 'status' => 'ban']) }}"
                class="btn btn-sm m-1 btn-danger">
                <i class="fas fa-hand-paper"></i> موقف
                <span
                    class=" mr-2 badge bg-light text-dark">{{ App\Models\User::where('account_status', 'ban')->where('membership_type', 'user')->count() }}</span>
            </a>
        </div>
    @else
    @endif
    {!! Form::open(['method' => 'post', 'url' => [aurl('/users/multi_delete')]]) !!}

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
                <div class="table-responsive">
                    {!! $dataTable->table(['class' => 'table table-striped table-bordered table-hover table-checkable dataTable no-footer'], true) !!}
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
                    <h4 class="modal-title">{{ trans('admin.delete') }} </h4>
                    <button class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="delete_done"><i class="fa fa-exclamation-triangle"></i> {{ trans('admin.ask-delete') }}
                        <span id="count"></span> {{ trans('admin.record') }} </div>
                    <div class="check_delete">{{ trans('admin.check-delete') }}</div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat delete_done']) !!}
                    <a class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    @push('js')
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
