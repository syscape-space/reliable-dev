@extends('front.layout.index')
@section('content')
<section class="orders overflow-hidden py-5">
    <div class="container">
        <livewire:orders-list/>
        <div class="scrll-supp mt-5">
            <a href="" class="support me-0">
                الدعم
                <i class="fa-solid fa-comments"></i>
            </a>
        </div>
    </div>
</section>
@endsection