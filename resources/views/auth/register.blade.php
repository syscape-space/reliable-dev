<div class="container">
    <Navbar />
</div>
<div class="row w-100 mx-0 px-0">
    <div class="col-md-6 px-0">
        <div class="p-5">
            <div class="text-center mt-5">
                <img style="width: 100px" src="{{ asset('assets/images/login-1-logo.svg') }}" alt="" />
            </div>
            <div class="register text-center">
                <p class="my-4">
                    {{ __('app.already_have_account') }} ?
                    <a href="{{ route('login') }}" style="color: #048e81" class=""> {{ __('app.login') }}
                    </a>
                </p>
                <h3 class="mb-4"> {{ __('app.register') }} </h3>
            </div>
            <form action="{{route('register')}}" method="POST" class="login-form text-center" style="max-width: 400px; margin: auto">
                @csrf
                <small class="d-inline-block mb-4 text-end mx-auto" style="max-width: 300px; color: #0995eb">
                    {{ __('app.folow_instructions') }}
                </small>
                <!--- Error Will Validate Here -->

                @if ($errors->any())
                    <div class="errors">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="auth-login mb-4 text-center position-relative">
                    <input type="text" class="pe-5 form-control" placeholder="الاسم" name="name" />
                    <img class="img-lllo" style="width: 20px; position: absolute; right: 10px"
                        src="{{ asset('assets/images/login-user.svg') }}" alt="" />
                </div>
                <div class="auth-login mb-4 text-center position-relative">
                    <input type="number" class="pe-5 form-control" placeholder="رقم الهوية" name="id_number" />
                    <img class="img-lllo" style="width: 20px; position: absolute; right: 10px"
                        src="{{ asset('assets/images/login-user.svg') }}" alt="" />
                </div>
                <div class="auth-login mb-4 text-center position-relative">
                    <input type="text" class="pe-5 form-control" placeholder="رقم الجوال" name="mobile" />
                    <img class="img-lllo" style="width: 20px; position: absolute; right: 10px"
                        src="{{ asset('assets/images/login-user.svg') }}" alt="" />
                </div>
                <div class="auth-login mb-4 text-center position-relative">
                    <input type="text" class="pe-5 form-control" placeholder="   البريد الالكتروني" name="email" />
                    <img class="img-lllo" style="width: 29px; position: absolute; right: 10px"
                        src="{{ asset('assets/images/email-login.svg') }}" alt="" />
                </div>
                <div class="my-2 text-end">
                    <label class="mb-2">نوع العضوية</label>
                    <div>
                        <span class="ms-2">
                            <input type="radio" name="membership_type" name="membership_type" value="user">
                            <span>عميل</span>
                        </span>
                        <span>
                            <input type="radio" name="membership_type" name="membership_type" value="vendor"> <span>مقدم
                                خدمة</span>
                        </span>
                    </div>
                </div>
                <div class="auth-login text-center position-relative">
                    <input type="password" class="pe-5 form-control" placeholder="كلمة المرور " name="password" />
                    <img class="img-lllo" style="width: 12px; position: absolute; right: 10px"
                        src="{{ asset('assets/images/login-pass.svg') }}" alt="" />
                </div>

                <div>
                    <button class="login-btn" @click.prevent="registerFun()"> {{ __('app.create_account') }}
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
