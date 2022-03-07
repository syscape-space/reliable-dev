<?php
/*
<div class="alert alert-info">
@if(!empty($users) && count($users))
<ul>
@foreach($users as $user)
<li>
<div class="form-group">
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input checkinput" name="vendors[]"
{{-- {{old('settings_show') == 'yes'?'checked':'' }} --}}
value="{{ $user->id }}" id="user_{{ $user->id }}">
<label class="custom-control-label" for="user_{{ $user->id }}">
<a href="{{ aurl('users/'.$user->id) }}" target="_blank">{{ $user->name }}</a>
@foreach($user->user_job()->get() as $job)
(
<small>
{{ $job->occupation_id()->first()->{l('occupation_name')}??'' }}
{{ $job->specialtie_id()->first()->{l('specialty_name')}??'' }}
</small>
) -
@endforeach
</label>
<p>
<small>
{{ $user->city_id()->first()->{l('city_name')}??'' }} -  {{ $user->address }}</small>

</p>
</div>
</div>
</li>
@endforeach

</ul>
@else
<center>{{ trans('admin.no_vendor_found') }}</center>
@endif
</div>
@if(!empty($users_render))
{!! $users_render !!}
@endif
 */
?>