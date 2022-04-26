{{-- @if(!empty($options))
    <option value="">:: {{$title}} ::</option>
  @foreach($options as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@elseif(isset($error))
  <option value="">! {{$error}} </option>
@endif --}}


<select dir="rtl" name="section" id="inp-selector">
    <option value="">:: {{$title}} ::</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>