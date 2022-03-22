<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="./css/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css' />


    <link rel="stylesheet" href="./fonts/font-awsome-pro/css/pro.min.css">
    <link rel="stylesheet" href="./fonts/feather.css">
    <link rel="stylesheet" href="./fonts/fontawesome.css">
    <link rel="stylesheet" href="./css/style.css" />
    <style>
        body {
            margin: 0;
            font-family: Droid Arabic Kufi;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #293240;
            background-color: #f0f2f8;
        }
    </style>
    <title>title</title>
</head>

<body class="position-relative">
    <!-- ============================================================================================================
  ===================================== Start Header ==============================================================
  ============================================================================================================= -->

    <section>
        <div class="dash">
            <div class="head-dash">
               
                <div class="text-center py-4">
                    <div class="image-user position-relative d-inline-block">
                        <img src="{{(!empty($user) && !empty($user->photo_profile)) ? it()->url($user->photo_profile) : asset('assets/images/dash-user.png')}}" alt="" width="90px" height="90px" srcset="" style="border-radius: 45px;" />
                        <img style="position: absolute; bottom: 0; left: 0" src="./images/dash-edit.svg" alt="" srcset="" />
                    </div>
                    <h4 class="mt-3" style="color: #fff; font-size: 16px; margin-bottom: 0px">
                        {{ !empty($user) ? $user->first_name." ".$user->middle_name." ".$user->last_name : 'username'}}
                    </h4>
                </div>
                <div class="pt-4 text-center mawtheq-head d-flex justify-content-center">
                    <p class="m-0 bg-transparent text-white border px-3" style="width:auto">
                        مقدم خدمة
                    </p>
                </div>
                <div class="pt-4 text-center mawtheq-head d-flex justify-content-center">
                    <p class="m-0">
                        <img src="./images/dash-mawthq.svg" class="ms-2" alt="" srcset="" />
                        موثق
                    </p>
                </div>
                <ul class="px-0 list-unstyled text-center dash-list mt-0">
                    <li class="">
                        <a href="#">
                            <img src="./images/dash-home.svg" style="width: 18px" alt="" srcset="" />
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <img src="./images/dash-home.svg" style="width: 18px" alt="" srcset="" />
                            <span>لوحة التحكم</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./images/dash-user.svg" style="width: 16px" alt="" srcset="" />
                            <span>حسابى</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./images/dash-balance.svg" style="width: 19px" alt="" srcset="" />
                            <span>الرصيد</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./images/dash-project.svg" style="width: 19px" alt="" srcset="" />
                            <span>مشاريعى</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="./images/dash-remem.svg" style="width: 18px" alt="" srcset="" />
                            <span>تذكارى</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"> موثق </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="top-header" style="background-color: #f6f6f6">
        <div class="container">
            <ul class="list-unstyled d-flex m-0">
                <li class="ms-4 position-relative">
                    <a href="#"><img src="./images/notification-nav.svg" alt="" srcset="" />
                        <span class="red-circle"></span>
                    </a>
                </li>
                <li class="ms-5 position-relative">
                    <a href="#"><img src="./images/nav-message.svg" alt="" srcset="" />
                        <span class="red-circle"></span>
                    </a>
                </li>
                <li class="d-flex">
                    <div class="ms-2 position-relative">
                        <input style="font-size: 13px; padding: 8px 30px" type="text" class="border-0 rounded" placeholder="...بحث" />
                        <img style="width: 15px; position: absolute; right: 7px; top: 10px" src="./images/nav-search.svg" alt="" />
                        <img style="width: 15px; position: absolute; left: 7px; top: 10px" src="./images/nav-input.svg" alt="" />
                    </div>
                    <button style="
                border: 0;
                background-color: #048e81;
                color: #fff;
                font-size: 12px;
                padding: 0 40px;
              " class="rounded">
                        بحث
                    </button>
                </li>

                <li style="margin-right: auto">
                    <div class="dropdown">
                        <a style="background-color: #fff" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- @include("admin.show_image",["image"=>$user->photo_profile]) -->
                            <img style="width: 25px; margin-left: 5px" src="{{!empty($user) ? it()->url($user->photo_profile) : './images/dash-user.png'}}" alt="" srcset="" />
                            <span class="ms-5" style="color: #048e81; font-size: 13px">{{ !empty($user) ? $user->first_name." ".$user->middle_name." ".$user->last_name : 'username'}}</span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>



    <section class="requsts-sec mt-4 outside ">
        <div class="pc-container">
            <div class="pcoded-content" style="    font-size: 14px;">
                <!-- [ Main Content ] start -->
                <div class="row w-100 mx-0 px-0 ">
                    <div class="col-12 col-md-4 mb-5">
                        <div class="card user-card user-card-1">
                            <div class="card-body pb-0">
                                <div class="float-right">
                                    <span class="badge badge-light-success"><em class="icon ni ni-check-circle"></em> نشيط</span>
                                </div>
                                <div class="media user-about-block align-items-center mt-0 mb-3">
                                    <div class="position-relative d-inline-block">
                                        <img src="https://sjl.const-tech.biz/HRM/public/uploads/users/thumb/sar11.png" alt="" class="d-block img-radius img-fluid wid-80">
                                        <span class="icon-img">
                                            <i class="fas fa-certificate text-success bg-icon"></i><i class="fas fa-check front-icon text-white"></i>
                                        </span>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-1">
                                            ALCO SEC </h6>
                                        <p class="mb-0 text-muted">@ admin </p>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush px-0">
                                <li class="list-group-item"> <span class="f-w-500"><i class="feather icon-mail m-r-10"></i>بريد الالكتروني </span> <a href="mailto:{{$user->email}}" class="text-body"> {{!empty($user) ? $user->email : ''}} </a> </li>
                                <li class="list-group-item"> <span class="f-w-500"><i class="feather icon-phone-call m-r-10"></i> هاتف </span> <a href="#" class="text-body">{{!empty($user) ? $user->mobile: ''}}</a> </li>
                            </ul>
                            <div class="nav flex-column nav-pills list-group list-group-flush list-pills" id="user-set-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link list-group-item list-group-item-action {{!empty($type) && $type == 'account-settings' ? 'active' : ''}}" id="account-settings-tab" data-toggle="pill" href="{{aurl('../../profile?id='.$user->id.'&type=account-settings')}}" role="tab" aria-controls="account-settings" aria-selected="true"> <span class="f-w-500"><i class="feather icon-disc m-r-10 h5 "></i>إعدادت الحساب </span> <span class="float-right"><i class="feather icon-chevron-right"></i></span> </a>
                                <!-- <a class="nav-link list-group-item list-group-item-action active" id="user-edit-account-tab" data-toggle="pill" href="#user-edit-account" role="tab" aria-controls="user-edit-account" aria-selected="true"> <span class="f-w-500"><i class="feather icon-user m-r-10 h5 "></i>معلومات شخصية </span> <span class="float-right"><i class="feather icon-chevron-right"></i></span> </a> -->
                                <a class="nav-link list-group-item list-group-item-action  d-flex justify-content-between {{!empty($type) && $type == 'commercial' ? 'active' : ''}}" id="user-profile-logo-tab" data-toggle="pill" href="{{aurl('../../profile?id='.$user->id.'&type=commercial')}}" role="tab" aria-controls="user-profile-logo" aria-selected="false"> <span class="f-w-500"><i class="feather icon-image m-r-10 h5 "></i>السجلات التجارية </span> <span class="float-right">
                                        @if(!empty($commercial_status) && $commercial_status == "end")
                                        <span class="{{!empty($type) && $type == 'commercial' ? 'text-white' : 'text-danger'}}">منتهي</span>
                                        @endif
                                        @if(!empty($commercial_status) && $commercial_status == "active")
                                        <span class="{{!empty($type) && $type == 'commercial' ? 'text-white' : 'text-success'}}">نشيط</span>
                                        @endif
                                        </i></span> </a>
                                <i class="feather icon-chevron-right"></i></span> </a>
                                <a class="nav-link list-group-item list-group-item-action d-flex justify-content-between {{!empty($type) && $type == 'license' ? 'active' : ''}}" id="user-profile-logo-tab" data-toggle="pill" href="{{aurl('../../profile?id='.$user->id.'&type=license')}}" role="tab" aria-controls="user-profile-logo" aria-selected="false"> <span class="f-w-500"><i class="feather icon-image m-r-10 h5 "></i>الرخصة المهنية </span>
                                    <span class="float-right">
                                        @if(!empty($license_status) && $license_status == "end")
                                        <span class="{{!empty($type) && $type == 'license' ? 'text-white' : 'text-danger'}}">منتهي</span>
                                        @endif
                                        @if(!empty($license_status) && $license_status == "active")
                                        <span class="{{!empty($type) && $type == 'license' ? 'text-white' : 'text-success'}}">نشيط</span>
                                        @endif
                                        <i class="feather icon-chevron-right">
                                        </i></span> </a>
                                <a class="nav-link list-group-item list-group-item-action {{!empty($type) && $type == 'qualifications' ? 'active' : ''}}" id="user-profile-logo-tab" data-toggle="pill" href="{{aurl('../../profile?id='.$user->id.'&type=qualifications')}}" role="tab" aria-controls="user-profile-logo" aria-selected="false"> <span class="f-w-500"><i class="feather icon-image m-r-10 h5 "></i>المؤهلات </span> <span class="float-right"><i class="feather icon-chevron-right"></i></span> </a>
                                <a class="nav-link list-group-item list-group-item-action  {{!empty($type) && $type == 'experiance' ? 'active' : ''}}" id="user-profile-logo-tab" data-toggle="pill" href="{{aurl('../../profile?id='.$user->id.'&type=experiance')}}" role="tab" aria-controls="user-profile-logo" aria-selected="false"> <span class="f-w-500"><i class="feather icon-image m-r-10 h5 "></i>الخبرات </span> <span class="float-right"><i class="feather icon-chevron-right"></i></span> </a>
                                <!-- <a class="nav-link list-group-item list-group-item-action" id="user-companyinfo-tab" data-toggle="pill" href="#user-companyinfo" role="tab" aria-controls="user-companyinfo" aria-selected="false"> <span class="f-w-500"><i class="feather icon-file-text m-r-10 h5 "></i>معلومات الشركة </span> <spa n class="float-right"><i class="feather icon-chevron-right"></i></span> </a> -->
                                <a class="nav-link list-group-item list-group-item-action {{!empty($type) && $type == 'change-password' ? 'active' : ''}}" id="user-password-tab" data-toggle="pill" href="{{aurl('../../profile?id='.$user->id.'&type=change-password')}}" role="tab" aria-controls="user-password" aria-selected="false"> <span class="f-w-500"><i class="feather icon-shield m-r-10 h5 "></i>تغيير كلمة المرور </span> <span class="float-right"><i class="feather icon-chevron-right"></i></span> </a>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                    <!-- [ Main Content ] end -->
                </div>
            </div>
    </section>


    <!-- ============================================================================================================
  ================================ [End Footer ] ==================================================================
  ============================================================================================================= -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>