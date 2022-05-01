<!-- <a href="{{ route('orders.show', $order->id) }}">

</a> -->
<div class="box-order">
    <div class="info">
        <div class="photo">
            <img class="img-fluid" src="{{ cloudUrl($order->user->photo_profile) }}" alt="" />
        </div>
        <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
        </div>
        <p class="name">{{ $order->user->name }}</p>
        {{-- <p class="job">محامي حر</p> --}}
    </div>
    <div class="text">
        <div class="data flex-wrap d-flex justify-content-between align-items-center">
            <div class="order-num mb-3 mb-lg-0">
                طلب رقم : <span class="count">{{ $order->id }}</span>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-3 gap-md-4">
                <div class="deta">
                    <i class="fa-solid fa-calendar-day"></i>
                    {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}
                </div>
                <div class="view">
                    <i class="fa-solid fa-eye"></i> {{ $order->views }}
                    مشاهده
                </div>
                <div class="deta">
                    <i class="fa-solid fa-clock"></i>
                    {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}
                </div>
                <div class="deta">
                    <i class="fa-solid fa-money-bills"></i>
                    عدد
                    {{ $order->offers()->count() }}
                    عروض
                </div>
                <div class="deta">
                    <i class="fa-solid fa-location-dot"></i>
                    @if ($order->city_id > 0)
                        {{ $order->city->city_name_ar }}
                    @elseif($order->city_id == "0")
                        كل المدن
                    @else
                        لم يحدد مدينة
                    @endif
                </div>
                <div class="duration">
                    <i class="fa-solid fa-clock"></i>

                    مده التسليم
                    {{ $order->execution_time }}
                    يوم
                </div>
                <a href="" class="setting">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                    <div class="report">
                        <i class="fa-solid fa-flag"></i>
                        ابلاغ عن الطلب
                    </div>
                </a>
            </div>
        </div>
        @if ($order->isActiveUser())
            <h5 class="title">
                {{ $order->order_title }}
            </h5>
            <div class="d-flex align-items-start justify-content-between flex-wrap">

                <div class="content">
                    {!! \Illuminate\Support\Str::limit($order->order_content) !!}
                </div>
                <div class="group-btn m-auto m-lg-0 d-flex flex-column gap-3">
                    <a href="{{ route('front.orders.show', $order->hash_code) }}"
                        class="btn new">{{ __('admin.' . $order->order_status) }}</a>
                    {{-- <a href="" class="btn negotiate">
                        التفاوض:
                        {{$order->negotiations()->count()}}</a
                    > --}}
                </div>
            </div>
        @else
            <div class="">
                <div class="d-inline-block">
                    <div class="d-flex flex-wrap mt-3">
                        @if ($order->department and $order->department->main and $dep = $order->department->main->main)
                            <button class="bl-f text-black py-2 px-md-5 px-2">
                                {{ $dep->department_name_ar }}
                            </button>
                        @endif
                        @if ($order->department and $dep = $order->department->main)
                            <button class="bl-f mx-3 text-black py-2 px-md-5 px-2">
                                {{ $dep->department_name_ar }}
                            </button>
                        @endif
                        
                        @if ($dep = $order->department)
                            <button class="bl-f text-black py-2 px-md-5 px-2">
                                {{ $dep->department_name_ar }}
                            </button>
                        @endif
                        <a href="{{ route('front.orders.show', $order->hash_code) }}" style="margin-right:10px; "
                            class="btn new mr-2 btn-success float-left">{{ __('admin.' . $order->order_status) }}</a>
                    </div>
                    <div class="line-bb">

                    </div>

                </div>

            </div>
        @endif

    </div>
</div>
