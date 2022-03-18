@extends('admin.index')
@section('content')
<style media="screen">
  .form-control {
    border:0 !important
  }
</style>
<div class="">
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
  				<a href="{{ aurl('users') }}"  style="color:#343a40"  class="dropdown-item">
  				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
  			</div>
  		</div>
  		</h3>
  		<div class="card-tools">
  			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
  			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
  		</div>
  	</div>
    <div class="card-body">
      <div class="row w-100 mx-0 px-0">
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
          <div class="form-group">
            <label for="first_name" class=" control-label">اسم الترخيص / رقم الرخصة	</label>
            <input class="form-control" placeholder=""  type="text"  >
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
          <div class="form-group">
            <label for="first_name" class=" control-label">الترخيص</label>
            <input class="form-control" placeholder=""  type="text"  >
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
          <div class="form-group">
            <label for="first_name" class=" control-label">تاريخ نهاية الترخيص	</label>
            <input class="form-control" placeholder=""  type="date"  >
          </div>
        </div>
        <div class=" col-md-12">
          <div class="form-group">
            <label for="first_name" class=" control-label">ملاحظات</label>
            <textarea
              class="form-control"

                name="name"
                rows="4"
                cols="80"></textarea>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>
@endsection
