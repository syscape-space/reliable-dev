@component('mail::message')

<style type="text/css">
.alert-info {
    background-color: #e0ebf9;
    border-color: #e0ebf9;
    color: #327ad5;
}

.alert {
    padding: 15px;
    border: 1px solid transparent;
    border-radius: 4px;
}
</style>

<div dir="rtl">
#{{ trans('admin.title_msg') }} : {{ $data['data']['orginal_msg']->title_msg }}
<br>
<p>{{ $data['data']['orginal_msg']->message }}</p>
<hr />

<div class="alert alert-info">
	#  {{ date('Y-m-d h:i:s')}} <br>
	<p>{{ trans('admin.replay_by') }} : {!! $data['data']['orginal_msg']->replay_by()->first()->name !!}</p>
{!! $data['data']['orginal_msg']->replay_content !!}


</div>



<br />
</div>

 <a href="{{ url('') }}">{{ setting()->{l('sitename')} }}</a>
@endcomponent