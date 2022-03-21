@extends('front.layout.index')

@section('content')
@if(!empty($type) && $type == 'account-settings')
@include('front.user.profile.personal')
@elseif(!empty($type) && $type == 'commercial')
@include('front.user.profile.commercial')
@elseif(!empty($type) && $type == 'change-password')
@include('front.user.profile.changePassword')
@elseif(!empty($type) && $type == 'license')
@include('front.user.profile.license')
@else
@include('front.user.profile.personal')
@endif
@endsection