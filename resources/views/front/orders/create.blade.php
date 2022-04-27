<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('tem_assets') }}/css/normalize.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('tem_assets') }}/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('tem_assets') }}/css/all.min.css" />
    <!-- Main Faile Css  -->
    <link rel="stylesheet" href="{{ asset('tem_assets') }}/css/paying.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
</head>

<body>
    {{-- @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        
            <div class="alert alert-danger" role="alert">
                <div class="alert-body"> {{ $error }} </div>
            </div>
            
        @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body"> {{ session('success') }} </div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body"> {{ session('error') }} </div>
        </div>
    @endif   --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 p-0">
                <div class="right text-center py-5">
                    <div class="logo">
                        <img src="{{ asset('tem_assets') }}//img/logo.png" alt="" />
                        <h6>موثوق Rellable</h6>
                        <p>صناع الثقة Trust Makers</p>
                    </div>
                    <h4 class="fw-bold mb-5">أختيار نوع الخدمة</h4>
                    <p class="mb-4 fw-bold">انشاء طلب جديد</p>
                    <p class="caption mb-5 fw-bold mx-auto">
                        عند اختيار خدمة سيظهر هنا تعليما الخدمة وشرح مع
                        الفيديو بالأسفل
                    </p>
                    <div class="video mx-auto mb-4">
                        <p class="fw-bold text-end">مشاهدة شرح الخدمة</p>
                        <div class="position-relative">
                            <img src="{{ asset('tem_assets') }}//img/person.jpg" alt="" />
                            <div class="icon-play">
                                <i class="fa-solid fa-play"></i>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn">
                        الدليل الارشادي لطلب للخدمة
                        <i class="fa-solid fa-book-open"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 p-0">
                <main class="py-5">
                    <div class="container">
                        <form action="{{ route('front.orders.update', $Order->id) }}" method="post">
                            <input type="hidden" name="price" value="6510">
                            @csrf
                            @method('PUT')
                            <!-- Start Level One -->
                            <div class="level-one">
                                <h4 class="text-center pb-5 mb-5">
                                    شروط تقديم الطلب
                                </h4>
                                <div class="terms-service mx-auto mb-5">
                                    <h4 class="mb-3">شروط الخدمة</h4>
                                    <ul>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                        <li>
                                            تتيح هذه الخدمة تقديم طلب من
                                            مقدمي الخدمات لجميع القضايا
                                            والاستشارات
                                        </li>
                                    </ul>
                                </div>
                                <label class="the-conditions" for="check ">
                                    <input type="checkbox" id="check" />
                                    لقد قرات الشروط وموافق عليها
                                </label>
                                <p class="error mb-5">
                                    يجب الموافقة علش الشروط
                                </p>
                                <input class="sub mx-auto mt-5 d-block" type="submit" value="التالي"
                                    href="https://fontawesome.com/icons/book-open?s=solid" />
                            </div>
                            <!-- End Level One -->
                            <!-- Start Level Two -->
                            <div class="level-two">
                                <div class="page-number">1</div>

                                <div class="d-flex d-flex flex-wrap flex-xxl-nowrap justify-content-center gap-0">
                                    <div class="num-order text-center fs-4">
                                        رقم الطلب
                                        <div class="count">{{$Order->id}}</div>
                                    </div>
                                    <div
                                        class="d-flex flex-column-reverse flex-sm-row flex-fill align-items-end align-items-sm-start justify-content-sm-between gap-0">
                                        <ul class="levels-bar align-items-baseline gap-4 text-center d-flex">
                                            <li class="active">
                                                <div class="icon">1</div>
                                                أختبار نوع الخدمة
                                            </li>
                                            <li>
                                                <div class="icon">2</div>
                                                تفاصيل الطلب
                                            </li>
                                            <li>
                                                <div class="icon">3</div>
                                                طريقة العرض
                                            </li>
                                            <li>
                                                <div class="icon">4</div>
                                                الدفع
                                            </li>
                                        </ul>
                                        <a href="" class="icon-back">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="type mb-5 flex-wrap justify-content-sm-start justify-content-center mt-5 d-flex align-items-center gap-5">
                                    @if ($main_departments->first() != null)
                                        <div class="box-one">
                                            {{ $main_departments->first()->department_name_ar }}
                                            <i class="fa-solid fa-scale-balanced"></i>
                                        </div>
                                    @endif
                                    {{-- <div class="box-two">
                                            <div>استشارة قانونية</div>
                                            <div>تجاري</div>
                                        </div> --}}
                                </div>
                                <ul class="list-btn d-flex gap-2 gap-2 flex-wrap">
                                    {{-- <li class="active">
                                            <input
                                                type="radio"
                                                name="service-type"
                                                id=""
                                                value="1"
                                            />
                                            البحث عن محامي
                                        </li> --}}

                                    @foreach ($second_departments as $second_department)
                                        <li ><input type="radio" name="second_department_id" class="second_department_id"
                                                id="secondDepartment{{ $second_department->id }}"
                                                value="{{ $second_department->id }}" />{{ $second_department->department_name_ar }}
                                        </li>
                                    @endforeach
                                </ul>
                                {{-- <div id="third_department">
                                    
                                </div> --}}
                                <select dir="rtl" name="third_department_id" id="third_department">

                                </select>

                                <a href="{{ route('vendors-select') }}" class="mt-5 mx-auto d-block" style="color:black" value="1">البحث عن محامي</a>
                                {{-- <select dir="rtl" name="section"
                                        id="inp-selector">
                                        <option value="1">تجاري</option>

                                        <option value="2">اداري</option>

                                        <option value="3">جنائي</option>
                                        <option value="4">عمالي</option>
                                    </select> --}}
                                <div class="order-number mt-5 d-flex align-items-center gap-3">
                                    <p>ملحق بطلب رقم</p>
                                    <input type="text" placeholder="رقم الملحق هنا" />
                                </div>
                                <input class="sub mt-5 mx-auto d-block" type="submit" value="حفظ ومتابعة" />
                            </div>
                            <!-- End Level Two -->
                            <!-- Start Level Three -->
                            <div class="level-three">
                                <div class="page-number">2</div>

                                <div class="d-flex flex-wrap justify-content-center gap-0">
                                    <div class="num-order text-center fs-4">
                                        رقم الطلب
                                        <div class="count">{{$Order->id}}</div>
                                    </div>
                                    <div
                                        class="d-flex flex-column-reverse flex-sm-row flex-fill align-items-end align-items-sm-start justify-content-sm-between gap-0">
                                        <ul class="levels-bar align-items-baseline gap-4 text-center d-flex">
                                            <li class="active">
                                                <div class="icon">1</div>
                                                أختبار نوع الخدمة
                                            </li>
                                            <li class="active">
                                                <div class="icon">2</div>
                                                تفاصيل الطلب
                                            </li>
                                            <li>
                                                <div class="icon">3</div>
                                                طريقة العرض
                                            </li>
                                            <li>
                                                <div class="icon">4</div>
                                                الدفع
                                            </li>
                                        </ul>
                                        <a href="" class="icon-back">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="type flex-wrap justify-content-sm-start justify-content-center mt-5 d-flex align-items-center gap-5">
                                    <div class="box-one">
                                        المحاماة
                                        <i class="fa-solid fa-scale-balanced"></i>
                                    </div>
                                    {{-- <div class="box-two">
                                        <div>استشارة قانونية</div>
                                        <div>تجاري</div>
                                    </div> --}}
                                </div>
                                <div class="lable mt-4">عنوان الطلب</div>
                                <div class="inp-text">
                                    <input class="request-address" type="text" name="order_title" placeholder="عنوان الطلب..." id="" />
                                    <div class="count">100/0</div>
                                </div>
                                <div class="lable mt-3">تفاصيل الطلب</div>
                                <div class="inp-text">
                                    <textarea name="order_content" class="order-details" placeholder="تفاصيل الطلب..." id=""></textarea>
                                    <div class="count-area">100/0</div>
                                </div>
                                <div class="duration mt-4 mb-4 d-flex gap-4 flex-wrap align-items-end">
                                    <div class="inp">
                                        <div class="lable">
                                            المدة المقترحة للطلب
                                        </div>
                                        <select dir="rtl" id="select-duration" name="execution_time" class="w-100">
                                            <option value="">غير محددة المدة</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="7">7</option>
                                            <option value="60">60</option>
                                        </select>
                                    </div>
                                    <label class="d-flex align-items-center gap-3" for="check-duration">
                                        <input type="checkbox" name="negotiable" value="yes " id="check-duration" />
                                        المدة غير قابله للتفاوض
                                    </label>
                                </div>
                                <div class="files d-flex flex-wrap gap-5 align-items-center">
                                    <div>
                                        <div class="send-file mb-4">
                                            <input type="file" id="" />
                                            <i class="fa-solid fa-file"></i>
                                        </div>
                                        <div class="view-file">
                                            ملف نصي وهمي.PDF
                                            <i class="fa-solid fa-file"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="send-voice mb-4">
                                            <input type="file" id="" />
                                            <i class="fa-solid fa-microphone-lines"></i>
                                        </div>
                                        <div class="view-voice">
                                            ملف صوتي وهمي.MP3
                                            <i class="fa-solid fa-microphone-lines"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="group-btn mt-5 d-flex align-items-center justify-content-center gap-5">
                                    <input class="back" type="reset" value="العودة" />
                                    <input class="sub" type="submit" value="متابعة" />
                                </div>
                            </div>
                            <!-- End LEvel Three -->
                            <!-- Start Level Four -->
                            <div class="level-four">
                                <div class="page-number">3</div>

                                <div class="d-flex flex-wrap justify-content-center gap-0">
                                    <div class="num-order text-center fs-4">
                                        رقم الطلب
                                        <div class="count">{{$Order->id}}</div>
                                    </div>
                                    <div
                                        class="d-flex flex-column-reverse flex-sm-row flex-fill align-items-end align-items-sm-start justify-content-sm-between gap-0">
                                        <ul class="levels-bar align-items-baseline gap-4 text-center d-flex">
                                            <li class="active">
                                                <div class="icon">1</div>
                                                أختبار نوع الخدمة
                                            </li>
                                            <li class="active">
                                                <div class="icon">2</div>
                                                تفاصيل الطلب
                                            </li>
                                            <li class="active">
                                                <div class="icon">3</div>
                                                طريقة العرض
                                            </li>
                                            <li>
                                                <div class="icon">4</div>
                                                الدفع
                                            </li>
                                        </ul>
                                        <a href="" class="icon-back">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="type mb-5 flex-wrap justify-content-sm-start justify-content-center mt-5 d-flex align-items-center gap-5">
                                    <div class="box-one">
                                        المحاماة
                                        <i class="fa-solid fa-scale-balanced"></i>
                                    </div>
                                    {{-- <div class="box-two">
                                        <div>استشارة قانونية</div>
                                        <div>تجاري</div>
                                    </div> --}}
                                </div>
                                <select dir="rtl" id="select-city" required>
                                    <option value="">أختر المدينة</option>
                                    @forelse ($cities as $city)
                                        <option value="1">{{$city->city_name_ar}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                                <div class="parent-inp">
                                    <input type="text" placeholder="البحث عن مقدم الخدمة"
                                        class="service-provider" />
                                    <i class="fa-solid fa-hand-pointer"></i>
                                </div>
                                <div class="group-btn d-flex align-items-center justify-content-center gap-5">
                                    <input class="back" type="reset" value="العودة" />
                                    <input class="sub" type="submit" value="متابعة" />
                                </div>
                            </div>
                            <!-- End Level Four -->
                            <!-- Start Level Five -->
                            <div class="level-five">
                                <div class="page-number">4</div>

                                <div class="d-flex pb-5 flex-wrap justify-content-center gap-0">
                                    <div class="num-order text-center fs-4">
                                        رقم الطلب
                                        <div class="count">{{$Order->id}}</div>
                                    </div>
                                    <div
                                        class="d-flex flex-column-reverse flex-sm-row flex-fill align-items-end align-items-sm-start justify-content-sm-between gap-0">
                                        <ul class="levels-bar align-items-baseline gap-4 text-center d-flex">
                                            <li class="active">
                                                <div class="icon">1</div>
                                                أختبار نوع الخدمة
                                            </li>
                                            <li class="active">
                                                <div class="icon">2</div>
                                                تفاصيل الطلب
                                            </li>
                                            <li class="active">
                                                <div class="icon">3</div>
                                                طريقة العرض
                                            </li>
                                            <li class="active">
                                                <div class="icon">4</div>
                                                الدفع
                                            </li>
                                        </ul>
                                        <a href="" class="icon-back">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-5 mt-5 align-items-center justify-content-sm-between">
                                    <div class="col-xl-5">
                                        <p class="title mb-3 mb-xl-0">
                                            <i class="fa-solid fa-hand-holding-dollar"></i>
                                            سيتم أحتساب مايلي
                                        </p>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="save">
                                            حفظ طلبك كمسودة
                                            <i class="fa-solid fa-bookmark"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="price d-flex justify-content-between align-items-center">
                                    <div class="text d-flex align-items-center gap-5">
                                        رسوم تقديم الطلب:
                                        <div class="count">$6510</div>
                                    </div>
                                    <div class="icon">!</div>
                                </div>
                                <div class="group-btn d-flex align-items-center justify-content-center gap-5">
                                    <input class="back" type="reset" value="العودة" />
                                    <input class="sub" type="submit" value="حفظ ومتابعة" />
                                </div>
                            </div>
                            <!-- End Level Five -->
                            <!-- Start Inputs Hidden -->
                            <input id="conditions" type="hidden" name="conditions" />
                            <input id="service" type="hidden" name="service" />
                            <input id="type" type="hidden" name="type" />
                            <input id="order-number" type="hidden" name="order-number" />
                            <input id="request-address" type="hidden" name="request-address" />
                            <input id="order-details" type="hidden" name="order-details" />
                            <input id="duration" type="hidden" name="duration" />
                            <input id="value-check-duration" type="hidden" name="check-duration" />
                            <input id="send-file" type="hidden" name="file" />
                            <input id="send-voice" type="hidden" name="voice" />
                            <input id="city" type="hidden" name="city" />
                            <input id="service-provider" type="hidden" name="service-provider" />

                            <!-- End Inputs Hidden -->
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <!-- Js Files -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="{{ asset('tem_assets') }}/js/all.min.js"></script>
    <script src="{{ asset('tem_assets') }}/js/paying.js"></script>
    <script src="{{ asset('tem_assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                title: 'Error!',
                text: '{{ $error }}',
                icon: 'error',
                confirmButtonText: 'Ok'
                })
            </script>
        @endforeach
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif  
    <script type="text/javascript">
        $("input[name='second_department_id']").change(function() {
            console.log('dd');
            var second_department_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "{{ route('front.ajax.third-departments') }}",
                method: 'GET',
                data: {
                    second_department_id: second_department_id,
                    _token: token
                },
                success: function(data) {
                    $("#third_department").html('');
                    $("#third_department").html(data.options);
                    console.log(data.options);
                }
            });
        });
    </script>

</body>

</html>
