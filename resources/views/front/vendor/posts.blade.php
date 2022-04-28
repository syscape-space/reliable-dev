@extends('front.layout.index')
@push('page_styles')

@endpush
@section('content')
<section class="web py-5">
    <div class="container">
        <div class="row">
            <div
                class="col-12 back my-5 d-flex align-items-center justify-content-xl-end justify-content-center"
            >
                <div class="row w-100 justify-content-end">
                    <div
                        class="col-xl-8 d-flex align-items-center justify-content-xl-end justify-content-center gap-4 flex-wrap"
                    >
                        <a href="" class="btn">تقديم طلب</a>
                        <img src="{{asset('assets')}}/img/Group-logo.png" alt="" />
                    </div>
                </div>
            </div>
            @include('front.vendor._sidebar')
            
        </div>
    </div>
</section>
@endsection
@push('page_scripts')

@endpush

