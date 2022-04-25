  <div class="container">

      <div class="row w-100 mx-0 px-0 mt-5">
          <div class="col-md-6 login-page" id="pageLoginImage">
              <div class="text-center mt-5">
                  <!--<img style="width: 150px;" src=" '/assets/images/login-1-logo.svg'" alt="">-->
              </div>
          </div>
          <div class="col-md-6 px-0 ">
              <div class="p-3">
                  <div class="text-center mt-1 mb-5 logoText">
                      <!--<img style="width: 100px;" src="base_url + '/public/assets/images/login-1-logo.svg'" alt="">-->
                      <img style="width: 30%;object-fit:contain" src="{{ asset('assets/images/logoText.png') }}"
                          alt="">
                  </div>
                  <div class="register text-center" style="color:#0995EB">
                      <h4 class="mb-4"> {{ __('app.login') }} </h4>
                  </div>
                  <form action="{{ route('login') }}" class="login-form text-center" style="max-width: 400px;margin: auto;" method="POST">
                    @csrf
                      <!--<small class="d-inline-block mb-4 text-end mx-auto"
                    style="max-width: 300px; color: #0995eb;">
                    {{ __('app.folow_instructions') }}
                  </small>-->
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

                      
                          @csrf
                          <div class="auth-login mb-4 text-center  position-relative">
                              <label class="w-100 d-flex align-items-center mb-2 text-right"
                                  style="column-gap:5px;color:#4E5567">
                                  <i class="fas fa-phone-alt"></i>
                                  <span>رقم الجوال</span>
                              </label>
                              <input type="number" class="pe-2 form-control" placeholder=" رقم الجوال" name="id_number">
                              <!-- Phone number -->
                              <img class="img-lllo" style="width: 20px; position: absolute; right: 10px;"
                                  src="{{ asset('assets/images/login-user.svg') }}" alt="">
                          </div>
                          <div class="auth-login text-center  position-relative">
                              <label class="w-100 d-flex align-items-center mb-2 text-right"
                                  style="column-gap:5px;color:#4E5567">
                                  <i class="fas fa-lock"></i>
                                  <span>كلمة المرور</span>
                              </label>
                              <input type="password" class="pe-2 form-control" placeholder="كلمة المرور "
                                  name="password">
                              <!-- Password -->
                              <img class="img-lllo" style="width: 12px; position: absolute; right: 10px;"
                                  src="{{ asset('assets/images/login-pass.svg') }} ''" alt="">
                          </div>
                          <div class="mt-3 d-flex align-items-center justify-content-between">
                              <!--<div>
                      <label for=""> {{ __('app.do_you_forget_password') }}  </label>
                    </div>-->
                              <div class="">
                                  <input type="checkbox" style="vertical-align: middle;margin-left:10px">
                                  <label for=""> {{ __('app.remember_me') }} </label>
                              </div>
                              <div style="display:none">
                                  <span style="color:red">اعادة ارسال في <span> 25 </span>ثانية</span>
                              </div>
                          </div>
                          <div>
                              <button class="login-btn" @click.prevent="loginFun()">
                                  {{ __('app.login_now') }}
                              </button>
                          </div>
                          <div>
                              <p class="my-4 "> {{ __('app.do_you_have_account') }}
                                  <a href="{{route('register')}}" style="color: #048e81;" class="">
                                      {{ __('app.create_account_now') }} </a>
                              </p>
                          </div>
                      <!--  <div class="social-btn d-flex align-items-center justify-content-between" >
                    <button>
                      {{ __('app.facebook') }}
                      <img
                          style="width: 20px;"
                          src="base_url + '/assets/images/login-facebook.svg'" alt="">
                    </button>
                    <button>
                      {{ __('app.google') }}
                      <img style="width: 19px;" src="base_url + '/assets/images/google-llc.png'" alt="">
                    </button>
                  </div>-->
                  </form>
              </div>
          </div>

      </div>
  </div>
