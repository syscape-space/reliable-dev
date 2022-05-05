@if ($currentStep == 1)
    <div>
        @error('membership_type')
            {{ $message }}
        @enderror
        @error('account_type')
            {{ $message }}
        @enderror
        @error('name')
            {{ $message }}
        @enderror
        @error('id_number')
            {{ $message }}
        @enderror
        @error('mobile')
            {{ $message }}
        @enderror
        @error('email')
            {{ $message }}
        @enderror
        @error('password')
            {{ $message }}
        @enderror
        <div>
            <div class="">
                <div class="wrap text-center mt-4">
                    <div class="row" style="row-gap: 40px;">
                        <div class="col-md-4 part">
                            <div class="parent_all"><img
                                    src="https://law-mawthuq.com/public//assets/images/logo-active.png" alt=""
                                    style="width: 20%; object-fit: contain;">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص</p>
                                <div class="first_group"><label>عميل</label><input type="radio"
                                        wire:model="membership_type" value="user"></div>
                                <div class="last_group">
                                    <div class="group"><label>افراد</label><input type="radio"
                                            wire:model="account_type" value="individual"></div>
                                    <div class="group"><label>شركه</label><input type="radio"
                                            wire:model="account_type" value="company"></div>
                                    {{-- <div class="group"><label>جهة حكومية</label><input type="radio"
                                        wire:model="account_type"></div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 part">
                            <div class="parent_all"><img
                                    src="https://law-mawthuq.com/public//assets/images/logo-inactive.png" alt=""
                                    style="width: 20%; object-fit: contain;">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص</p>
                                <div class="first_group"><label>مقدم خدمة</label><input type="radio"
                                        wire:model="membership_type" value="vendor"></div>
                                <div class="last_group">
                                    <div class="group"><label>افراد</label><input type="radio"
                                            wire:model="account_type" value="individual"></div>
                                    <div class="group"><label>شركه</label><input type="radio"
                                            wire:model="account_type" value="company"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 part">
                            <div class="parent_all"><img
                                    src="https://law-mawthuq.com/public//assets/images/logo-inactive.png" alt=""
                                    style="width: 20%; object-fit: contain;">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص</p>
                                <div class="first_group"><label>محكم</label><input type="radio"
                                        wire:model="membership_type" value="judger"></div>
                                <div class="last_group">
                                    <div class="group"><label>افراد</label><input type="radio"
                                            wire:model="account_type" value="individual"></div>
                                    <div class="group"><label>شركه</label><input type="radio"
                                            wire:model="account_type" value="company"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-center"><button class="submit"
                            wire:click="firstStepSubmit"><a href="#" class=""
                                style="color: rgb(255, 255, 255); text-decoration: none;">
                                التالي
                            </a></button></div>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($currentStep == 2)
    <div class="row w-100 mx-0 px-0">
        <div class="col-md-6 px-0">
            <div class="p-5">
                <div class="text-center mt-5">
                    <img style="width: 100px" src="{{ asset('assets/images/login-1-logo.svg') }}" alt="" />
                </div>
                <div class="register text-center">
                    <p class="my-4">
                        {{ __('app.already_have_account') }} ?
                        <a href="{{ route('login') }}" style="color: #048e81" class="">
                            {{ __('app.login') }}
                        </a>
                    </p>
                    <h3 class="mb-4"> {{ __('app.register') }} </h3>
                </div>
                <form wire:submit.prevent="secondStepSubmit" class="login-form text-center"
                    style="max-width: 400px; margin: auto">

                    <small class="d-inline-block mb-4 text-end mx-auto" style="max-width: 300px; color: #0995eb">
                        {{ __('app.folow_instructions') }}
                    </small>
                    <!--- Error Will Validate Here -->


                    <div class="auth-login mb-4 text-center position-relative">
                        <input type="text" class="pe-5 form-control" placeholder="الاسم" wire:model="name" />
                        <img class="img-lllo" style="width: 20px; position: absolute; right: 10px"
                            src="{{ asset('assets/images/login-user.svg') }}" alt="" />
                    </div>
                    @error('name')
                        <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                    @enderror

                    <div class="auth-login mb-4 text-center position-relative">
                        <input type="number" class="pe-5 form-control" placeholder="رقم الهوية"
                            wire:model="id_number" />
                        <img class="img-lllo" style="width: 20px; position: absolute; right: 10px"
                            src="{{ asset('assets/images/login-user.svg') }}" alt="" />
                    </div>
                    @error('id_number')
                        <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                    @enderror

                    <div class="auth-login mb-4 text-center position-relative">
                        <input type="text" class="pe-5 form-control" placeholder="رقم الجوال" wire:model="mobile" />
                        <img class="img-lllo" style="width: 20px; position: absolute; right: 10px"
                            src="{{ asset('assets/images/login-user.svg') }}" alt="" />
                    </div>
                    @error('mobile')
                        <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                    @enderror

                    <div class="auth-login mb-4 text-center position-relative">
                        <input type="text" class="pe-5 form-control" placeholder="   البريد الالكتروني"
                            wire:model="email" />
                        <img class="img-lllo" style="width: 29px; position: absolute; right: 10px"
                            src="{{ asset('assets/images/email-login.svg') }}" alt="" />
                    </div>
                    @error('email')
                        <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                    @enderror

                    <div class="auth-login text-center position-relative">
                        <input type="password" class="pe-5 form-control" placeholder="كلمة المرور "
                            wire:model="password" />
                        <img class="img-lllo" style="width: 12px; position: absolute; right: 10px"
                            src="{{ asset('assets/images/login-pass.svg') }}" alt="" />
                    </div>
                    @error('password')
                        <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                    @enderror

                    <div>
                        <button class="login-btn" type="submit">
                            {{ __('app.create_account') }}
                        </button>
                    </div>
                    <div class="social-btn d-flex align-items-center justify-content-between">
                        <button>
                            {{ __('app.facebook') }}
                            <img style="width: 20px" src="{{ asset('assets/images/login-facebook.svg') }}" alt="" />
                        </button>
                        <button>
                            {{ __('app.google') }}
                            <img style="width: 19px" src="{{ asset('assets/images/google-llc.png') }}" alt="" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 login-page" id="pageLoginImage2">
            <div class="text-center mt-5">
                <img style="width: 150px" src="{{ asset('assets/images/login-logo.svg') }}" alt="" />
            </div>
        </div>
    </div>
@endif
