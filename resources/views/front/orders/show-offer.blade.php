@extends('front.orders.show-layout')
@section('order-page')
    <div class="box-talks">
        <x-offer.card :offer="$offer" />
    </div>
@endsection
