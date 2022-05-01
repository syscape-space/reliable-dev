@extends('front.orders.show-layout')
@section('order-page')
    <div class="box-talks">
        @if($offer)
        <x-offer.card :offer="$offer" />
        @endif
    </div>
@endsection
