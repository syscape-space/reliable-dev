<!-- <a href="{{route('orders.show',$order->id)}}">

</a> -->
<div class="box-order">
    <div class="info">
        <div class="photo">
            <img
                    class="img-fluid"
                    src="{{cloudUrl($order->user->photo_profile)}}"
                    alt=""
            />
        </div>
        <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
        </div>
        <p class="name">{{$order->user->name}}</p>
        {{--        <p class="job">محامي حر</p>--}}
    </div>
    <div class="text">
        <div
                class="data flex-wrap d-flex justify-content-between align-items-center"
        >
            <div class="order-num mb-3 mb-lg-0">
                طلب رقم : <span class="count">{{$order->id}}</span>
            </div>
            <div
                    class="d-flex flex-wrap align-items-center gap-3 gap-md-4"
            >
                <div class="deta">
                    <i class="fa-solid fa-calendar-day"></i>
                    {{\Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}
                </div>
                <div class="view">
                    <i class="fa-solid fa-eye"></i> {{$order->views}}
                    مشاهده
                </div>
                <div class="deta">
                    <i class="fa-solid fa-clock"></i>
                    {{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}
                </div>
                <div class="deta">
                    <i class="fa-solid fa-money-bills"></i>
                    عدد
                    {{$order->offers()->count()}}
                    عروض
                </div>
                <div class="deta">
                    <i class="fa-solid fa-location-dot"></i>
                    {{$order->city->city_name_ar ?? "لم يحدد مدينة"}}
                </div>
                <div class="duration">
                    <i class="fa-solid fa-clock"></i>

                    مده التسليم
                    {{$order->execution_time}}
                    يوم
                </div>
                <a href="" class="setting">
                    <i
                            class="fa-solid fa-ellipsis-vertical"
                    ></i>
                    <div class="report">
                        <i class="fa-solid fa-flag"></i>
                        ابلاغ عن الطلب
                    </div>
                </a>
            </div>
        </div>
        <h5 class="title">
            <a  class="title" href="{{route('front.orders.show',$order->hash_code)}}">
                {{$order->order_title}}
            </a>
        </h5>
        <div class="">
          <div class="d-inline-block">
              <div class="d-flex flex-wrap mt-3">
                  <button class="bl-f text-black py-2 px-md-5 px-2">
                       محاماة
                  </button>
                  <button class="bl-f mx-3 text-black py-2 px-md-5 px-2">
                      استشارات
                  </button>
                  <button class="bl-f text-black py-2 px-md-5 px-2">
                      تجاري
                  </button>
              </div>
              <div class="line-bb">

              </div>
             </div>
        </div>
        @if($order->isActiveUser())
        <div
                class="d-flex align-items-start justify-content-between flex-wrap"
        >

            <div class="content">
                {!! \Illuminate\Support\Str::limit($order->order_content) !!}
            </div>

            <div
                    class="group-btn m-auto m-lg-0 d-flex flex-column gap-3"
            >
                <a href="" class="btn new"
                >{{__('admin.'.$order->order_status)}}</a
                >

                {{-- <a href="" class="btn negotiate">
                    التفاوض:
                    {{$order->negotiations()->count()}}</a
                > --}}
            </div>
        </div>
        @else
        {{-- TODO : vendor area --}}
        @endif
    </div>
</div>
