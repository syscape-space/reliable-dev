
<div class="col-lg-3 col-xl-2 px-2 px-xl-1">
    <div class="client-page">
        <div class="card-client text-center rounded mb-2 pb-4">
            <div class="client-img">
                <img style="width: 76px; height: 70px; border-radius: 50%; margin-bottom: 5px; margin-top: 10px;"
                    src="https://cdn.landesa.org/wp-content/uploads/default-user-image.png" alt=""
                    srcset="">
            </div>
            <h5>{{ $user->name }}</h5>
            <p class="">
                {{ $user->membership_type }}
            </p>
            <div class="protection">
                <img src="{{ asset('tem_assets') }}/images/protection.svg" alt="" srcset="">
            </div>
        </div>
        <div class="card-client text-center rounded mb-2 py-3">
            <p class="  "> الرصيد الكلى: <span class="me-2 f-300 "
                    style=" color: #0491e8 ;"> {{ $user->current_balance }} $ </span> </p>
            <p class="  "> يمكن سحبة : <span class="me-2 f-300 "
                    style=" color: #0491e8 ;"> {{ $user->current_balance - $user->suspended_balance }}
                    $ </span> </p>
            <button class="show-balance">عرض رصيدى</button>
        </div>

        <div class="card-client text-end rounded  p-3 mb-2 pb-4">
            <h6 class="  ">مرحبا مجددا محمد </h6>
            <p style="font-size: 13px;">حسابك مكتمل بنسبة 80%</p>
            <div class="percent-line w-100 rounded mb-4" style="height: 8px; ;background-color: #ddd;">
                <div class="w-75 rounded" style="height: 8px;background-color: #028e80  ;"></div>
            </div>
            <div class="text-center">
                <button class="show-balance">أكمل بيانات حسابى</button>
            </div>
        </div>
        <div class="card-client text-center rounded px-3 py-2 mb-2 ">

            <h6 class="  "><img class="ms-2"
                    src="{{ asset('tem_assets') }}/images/pkg.svg" alt=""
                    srcset="">{{ $user->current_subscription->package->package_title }}</h6>
            <p class="  my-2 text-end " style="font-size: 13px;"> ينتهى اشتراكك فى
                {{ $user->current_subscription->package->package_end_at }} </p>
            <p class=" text-end " style="font-size: 13px;">متبقى على انتهاء اشتراكك</p>
            <div class="text-end">
                @php
                    $package_end_at = \Carbon\Carbon::createFromDate($user->current_subscription->package->package_end_at);
                    $Remaining = $package_end_at->diffInDays(\Carbon\Carbon::now());
                @endphp
                <span style="color: #E33232 "> {{ $Remaining }} ايام </span>
            </div>
            <div class="percent-line w-100 rounded mt-3 mb-4"
                style="height: 8px; ;background-color: #ddd;">
                <div class="w-75 rounded" style="height: 8px;background-color: #E33232  ;"></div>
            </div>
            <div class="text-center ">
                <button class="show-balance">حدث اشتراكك</button>
            </div>
        </div>
    </div>
</div>