@extends('admin.index')
@section('content')

    @include("admin.layouts.components.submit_form_ajax",["form"=>"#careers",'query'=>""])
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">
                <div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a href="{{ aurl('supportmessages') }}" style="color:#343a40" class="dropdown-item">
                            <i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
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
        <div class="card-body">
			<form action="{{aurl('contract-templates')}}" method="POST" class="">
				@csrf
				<div class="form-body">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="active-field">الحالة</label>
								<select name="active" class="form-control" id="active-field">
									<option {{old('active') == 0 ? "selected" : "" }} value="0">متوقف</option>
									<option {{old('active') == 1 ? "selected" : "" }} value="1">مفعل</option>
								</select>
							</div>
						</div>
						<div class="col-6"></div>
						<div class="col-6">
							<div class="form-group">
								<label for="title_ar">العنوان بالعربي</label>
								<input name="title_ar" id="title_ar" value="{{old('title_ar')}}" class="form-control">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="title_en">العنوان بالانجليزي</label>
								<input name="title_en" id="title_en" value="{{old('title_en')}}" class="form-control">
							</div>
						</div>
						<div class="col-12">
							<h4 class="text-success">قائمة الاضافات الممكنه للعقد</h4>
							<div class="row">
								<div class="col-6">
									<ul>
										@foreach(contractTemplateVars() as $item => $title)
											<li> {{$title}} : <b>{{$item}}</b> </li>
										@endforeach
									</ul>
								</div>
								<div class="col-6">
									<h5 class="text-primary">طريقة الاستخدام</h5>
									<p>اذا افترضنا نريد عرض قيمة العقد المخزنة في الداتابيز وهي 100 ريال </p>
									<p>في النص " تم التواصل الي بقيمة 100 ريال "</p>
									<p>يمكنك استخدام contract-amount في النص كالتالي " تم التواصل الي بقيمة contract-amount ريال "</p>
									<p>لذلك بمكن لأكثر من عميل استخدامه مع قيم مختلفة لكل عقد</p>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="content_ar">المحتوي بالعربي</label>
								<textarea name="content_ar" id="content_ar" class="form-control">{!! old('content_ar') !!}</textarea>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="content_en">المحتوي بالانجليزي</label>
								<textarea name="content_en" id="content_en" class="form-control">{!! old('content_en') !!}</textarea>
							</div>
						</div>
						<div class="col-12 text-center">
							<button class="btn btn-success">حفظ</button>
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