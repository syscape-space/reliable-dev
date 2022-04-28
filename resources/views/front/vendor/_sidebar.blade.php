<div class="col-xl-4 r-bar text-center text-xl-end ps-xl-5">
                    <div class="row parent-boxes">
                        <div class="col-xl-12 mb-5">
                            <div class="info text-center">
                                <div class="d-flex align-items-center">
                                    <div class="photo">
                                        <div class="container-img">
                                            <img
                                                src="{{asset('assets')}}/img/person.jpg"
                                                alt=""
                                            />
                                        </div>
                                        <img
                                            class="icon"
                                            src="{{asset('assets')}}/img/done.svg"
                                            alt=""
                                        />
                                    </div>
                                    <div class="text">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="job">محامي - تجاري</p>
                                        <p class="city">{{ optional($user->city)->name }}</p>
                                        <p class="last-seen">
                                            اخر تواجد: {{date('Y-m-d', strtotime($user->last_seen))}} الساعة:
                                            {{ date('h:i A', strtotime($user->last_seen)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- {{dd(active('front.vendor.posts'))}} --}}
                        {{-- {{ active('front.vendor.posts') ?  'class="active"' : ''}} --}}
                        <div class="col-xl-12">
                            <div class="sidebar">
                                <ul>
                                    <li {!!active('front.vendor.about') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.about', $user->id)}}" @if(active('front.vendor.about')) {{'class="active"'}} @endif>نبذه عني</a></li>
                                    <li {!!active('front.vendor.licenses') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.licenses', $user->id)}}" @if(active('front.vendor.licenses')) {{'class="active"'}} @endif>التراخيص</a></li>
                                    <li {!!active('front.vendor.executed-contracts') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.executed-contracts', $user->id)}}" @if(active('front.vendor.executed-contracts')) {{'class="active"'}} @endif>عقود منفذة</a></li>
                                    <li {!!active('front.vendor.audio-consulting') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.audio-consulting', $user->id)}}" @if(active('front.vendor.audio-consulting')) {{'class="active"'}} @endif>الاستشارات الصوتية</a></li>
                                    <li {!!active('front.vendor.qualifications-and-training') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.qualifications-and-training', $user->id)}}" @if(active('front.vendor.qualifications-and-training')) {{'class="active"'}} @endif>المؤهلات والدورات التدريبية</a></li>
                                    <li {!!active('front.vendor.specialty') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.specialty', $user->id)}}" @if(active('front.vendor.specialty')) {{'class="active"'}} @endif>التخصص</a></li>
                                    <li {!!active('front.vendor.posts') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.posts', $user->id)}}">مقالاتي</a></li>
                                    <li {!!active('front.vendor.statistics') ?  'class="active"' : ''!!}><a href="{{route('front.vendor.statistics', $user->id)}}" >احصائيات الاداء</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>