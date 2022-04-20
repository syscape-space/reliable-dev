<div class="chat-clinet" style="max-width: 1000px;margin: auto;">
    @if($orders->active_negotiation)
        <ul class="item-chat list-unstyled text-start px-0">
            @foreach($orders->active_negotiation->messages as $message)
                <li class="p-0">
                    <div class="panel" style="text-align: right;padding: 21px;">
                        <div class="thread__replies" id="thread__replies" data-replies="collection">
                            <div class="msg pdn--am brd--t" data-reply="1777693" id="message1777693"
                                 style="font-family: 'Noto Naskh Arabic', serif;">
                                <div class="msg__meta media mrg--bs">
                                    <a href="" class="pull-right" style="float: right!important;margin-left: 10px;">
                                        <img src="{{it()->url($message->user->photo_profile)}}"
                                             class="img-thumbnail media-object uavatar uavatar--small img-circle"
                                             width="42" height="42" alt="" style="border-radius: 50%;">
                                    </a>
                                    <div class="media-body" style="line-height: 1.428571429;">
                                        <h5 class="from mrg--an mb-0" style="">
                                            <bdi><a href=""
                                                    style="font-size: 14px;color: #2386c8;text-decoration: none;">{{ $message->user->first_name }}</a>
                                            </bdi>
                                        </h5>
                                        <div class="text-zeta text-muted" style="line-height: 1.428571429;"><i
                                                    class="fas fa-clock"></i>
                                            <time class="timeago" datetime="2020-02-26 07:58:13"
                                                  title="2020-02-26 07:58:13" style="font-size: 12px;">
                                                {{ $message->created_at }}
                                            </time>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-wrapper-div msg__body copy wb " style="    font-size: 16px;">
                                    @if($message->type === 'text')
                                    <span>{{$message->content}}</span>
                                    @elseif($message->type === 'image')
                                    <span >
                                        <img height="100" style="max-height: 150px" class="img-thumbnail" src="{{it()->url($message->content)}}">
                                    </span>
                                    @elseif($message->type === 'video')
                                    <span>
                                        <video style="max-height: 200px" class="img-thumbnail" controls>
                                            <source src="{{it()->url($message->content)}}">
                                        </video>
                                      </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    @else
        <h4>لا يوجد مناقشة</h4>
    @endif
</div>