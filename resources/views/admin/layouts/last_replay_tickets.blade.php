@php
$last_replay_tickets_count = App\Models\Ticket::whereHas('replays',function($q){
  $q->where('seen_status','unseen');
})->where('ticket_status','opened')
  ->count();
$last_replay_tickets_get = App\Models\Ticket::where('ticket_status','opened')->orWhere('ticket_status','closed')->orderBy('id','desc')->limit('15')->get();

@endphp
<li class="nav-item dropdown">
  <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-comments"></i>
    @if($last_replay_tickets_count > 0)
    <span class="badge badge-danger navbar-badge">{{ $last_replay_tickets_count }}</span>
    @endif
  </a>
  <div class="dropdown-menu dropdown-menu-lg messages  {{ app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left' }}">
    @foreach($last_replay_tickets_get as $last_ticket)
    @php
    $replay = App\Models\TicketReplay::where('ticket_id',$last_ticket->id)
          //->where('user_id','>',0)
          ->orderBy('id','desc')->limit(1)->first();
    if ($replay){
        $tadmin_replay = $replay->admin_id()->first();
      $tuser_replay = $replay->user_id()->first();
    }

    @endphp
    @if($replay)
    <a href="{{ aurl('tickets/'.$last_ticket->id) }}" class="dropdown-item">
      <!-- Message Start -->
      <div class="media">
        @if(!empty($tadmin_replay))
        <img src="{{ it()->profile($tadmin_replay->photo_profile) }}" alt="" class="img-size-50 mr-3 img-circle">
        @elseif(!empty($tuser_replay))
        <img src="{{ it()->profile($tuser_replay->img) }}" alt="" class="img-size-50 mr-3 img-circle">
        @endif
        <div class="media-body">
          <h3 class="dropdown-item-title">
          <bdi>
            {{ mb_substr($last_ticket->ticket_title, 0, 20, 'utf8') }} ...
          </bdi>
          <span class="float-right text-sm {{ $replay->seen_status == 'unseen'?'text-primary':'text-defualt' }}"><i class="fa fa-dot-circle"></i></span>
          </h3>
          <p class="text-sm">
            <bdi>
               {{ !empty($tadmin_replay)?$tadmin_replay->name:$tuser_replay->name }} :  {{ mb_substr($replay->replay, 0, 40, 'utf8') }} ...
            </bdi>
          </p>
          {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $replay->created_at->diffForHumans() }}</p> --}}
        </div>
      </div>
      <!-- Message End -->
    </a>
    @endif
    @endforeach
    <div class="dropdown-divider"></div>
    <a href="{{ aurl('tickets') }}" class="dropdown-item dropdown-footer">{{ trans('admin.show_all') }}</a>
  </div>
</li>