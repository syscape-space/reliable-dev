@extends('admin.index')
@section('content')
<style media="screen">
.fa-2x {
  font-size: 2.3em;
}
</style>
<div class="row">
  <div class="col-md-12 ">
      <div class="row w-100 mx-0 px-0 mb-3 flex-xl-nowrap">
          <div class="col-md-3 mb-3 col-xl px-1">
              <div class="d-flex px-2 py-3 align-items-center justify-content-center"
               style="background-color: #de3434f5;
                      color: #fff;
                      border-radius: 8px;">
                <div class=" mr-3">
                    <i class="fas text-white fa-list-alt fa-2x"></i>
                </div>
                <div class="">
                    <h6 style="white-space:nowrap"> الطلبات الجديدة</h6>
                    <h4  style="text-align:left">20</h4>
                </div>

              </div>
          </div>
          <div class="col-md-3 mb-3 col-xl px-1">
              <div class="d-flex px-2 py-3 align-items-center justify-content-center"
               style="background-color: #eab219f5;
                      color: #fff;
                      border-radius: 8px;">
                <div class=" mr-3">
                    <i class=" text-white fas fa-hand-holding-usd fa-2x"></i>
                </div>
                <div class="">
                    <h6 style="white-space:nowrap"> كل الرصيد المعلق</h6>
                    <h4  style="text-align:left">20</h4>
                </div>

              </div>
          </div>
          <div class="col-md-3 mb-3 col-xl px-1">
              <div class="d-flex px-2 py-3 align-items-center justify-content-center"
               style="background-color: #2da0c0f5;
                      color: #fff;
                      border-radius: 8px;">
                <div class=" mr-3">
                    <i class=" text-white fas fa-clipboard-list fa-2x"></i>
                </div>
                <div class="">
                    <h6 style="white-space:nowrap"> طلبات السحب</h6>
                    <h4  style="text-align:left">20</h4>
                </div>

              </div>
          </div>
          <div class="col-md-3 mb-3 col-xl px-1">
              <div class="d-flex px-2 py-3 align-items-center justify-content-center"
               style="background-color: #1bb249f5;
                      color: #fff;
                      border-radius: 8px;">
                <div class=" mr-3">
                    <i class="text-white fas fa-money-check-alt fa-2x"></i>
                </div>
                <div class="">
                    <h6 style="white-space:nowrap"> طلبات الشحن</h6>
                    <h4  style="text-align:left">20</h4>
                </div>

              </div>
          </div>
          <div class="col-md-3 mb-3 col-xl px-1">
              <div class="d-flex px-2 py-3 align-items-center justify-content-center"
               style="background-color: #8462e5f5;
                      color: #fff;
                      border-radius: 8px;">
                <div class=" mr-3">
                    <i class="text-white fas fa-coins fa-2x"></i>
                </div>
                <div class="">
                    <h6 style="white-space:nowrap"> رصيد المحفظة</h6>
                    <h4  style="text-align:left">20</h4>
                </div>

              </div>
          </div>
      </div>
  </div>
  <section class="col-lg-12 connectedSortable">
    <div class="card" item_name="statistics">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">
        <i class="fas fa-chart-bar mr-1"></i>
         الإحصائيات
        </h3>
        </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
          @include('admin.layouts.statistics.module_counters')
        </div>
          </div><!-- /.card-body -->
        </div>
  </section>
</div>
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-6 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->

        <!--/.direct-chat -->
        <!-- TO DO List -->

          <!-- /.card-header -->
          <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
              <li>
                <!-- drag handle -->
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <!-- checkbox -->
                <div  class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo1" id="todoCheck1">
                  <label for="todoCheck1"></label>
                </div>
                <!-- todo text -->
                <span class="text">Design a nice theme</span>
                <!-- Emphasis label -->
                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                <!-- General tools such as edit or delete-->
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                  <label for="todoCheck2"></label>
                </div>
                <span class="text">Make the theme responsive</span>
                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo3" id="todoCheck3">
                  <label for="todoCheck3"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo4" id="todoCheck4">
                  <label for="todoCheck4"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo5" id="todoCheck5">
                  <label for="todoCheck5"></label>
                </div>
                <span class="text">Check your messages and notifications</span>
                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
              <li>
                <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div  class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo6" id="todoCheck6">
                  <label for="todoCheck6"></label>
                </div>
                <span class="text">Let theme shine like a star</span>
                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                <div class="tools">
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash-o"></i>
                </div>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
          </div>
        </div>
        <!-- /.card -->
      </section>
    
    </div>
    <!-- /.row (main row) -->
    @endsection
