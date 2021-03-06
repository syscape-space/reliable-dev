@extends('admin.index')
@section('content')

    @include("admin.layouts.components.submit_form_ajax",["form"=>"#careers",'query'=>""])
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
                    <a>{{!empty($title)?$title:''}}</a>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{aurl('contract-templates')}}" class="dropdown-item" style="color:#343a40">
                            <i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
                        <a class="dropdown-item" style="color:#343a40"
                           href="{{aurl('contract-templates/' . $edit->id.'')}}">
                            <i class="fas fa-eye"></i> {{trans('admin.show')}}
                        </a>
                        <a class="dropdown-item" style="color:#343a40" href="{{aurl('contract-templates/create')}}">
                            <i class="fas fa-plus"></i> {{trans('admin.create')}}
                        </a>
                    </div>
                </div>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{aurl('contract-templates/'.$edit->id)}}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="active-field">????????????</label>
                                <select name="active" class="form-control" id="active-field">
                                    <option {{old('active',$edit->active) == 0 ? "selected" : "" }} value="0">??????????</option>
                                    <option {{old('active',$edit->active) == 1 ? "selected" : "" }} value="1">????????</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title_ar">?????????????? ??????????????</label>
                                <input name="title_ar" id="title_ar" value="{{old('title_ar',$edit->title_ar)}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title_en">?????????????? ????????????????????</label>
                                <input name="title_en" id="title_en" value="{{old('title_en',$edit->title_en)}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="text-success">?????????? ???????????????? ?????????????? ??????????</h4>
                            <div class="row">
                                <div class="col-6">
                                    <ul>
                                        @foreach(contractTemplateVars() as $item => $name)
                                            <li> {{$name}} : <b>{{$item}}</b> </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-primary">?????????? ??????????????????</h5>
                                    <p>?????? ?????????????? ???????? ?????? ???????? ?????????? ?????????????? ???? ?????????????????? ?????? 100 ???????? </p>
                                    <p>???? ???????? " ???? ?????????????? ?????? ?????????? 100 ???????? "</p>
                                    <p>?????????? ?????????????? contract-amount ???? ???????? ?????????????? " ???? ?????????????? ?????? ?????????? contract-amount ???????? "</p>
                                    <p>???????? ???????? ?????????? ???? ???????? ???????????????? ???? ?????? ???????????? ?????? ??????</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="content_ar">?????????????? ??????????????</label>
                                <textarea name="content_ar" id="content_ar" class="form-control">{!! old('content_ar',$edit->content_ar) !!}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="content_en">?????????????? ????????????????????</label>
                                <textarea name="content_en" id="content_en" class="form-control">{!! old('content_en',$edit->content_en) !!}</textarea>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-success">??????</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'content_ar' );
        CKEDITOR.replace( 'content_en' );
    </script>
@endsection