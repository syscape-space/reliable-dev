@if(!empty($rate))
@for($i=0;$i < $rate;$i++)
<i class="fa fa-star"></i>
@endfor
@for($i=5;$i > $rate;$i--)
<i class="far fa-star"></i>
@endfor
@endif