<section class="settings py-5">
    <div class="container">
        <div class="row">

            @if (auth()->user()->packageRequests->count() > 0 && !auth()->user()->current_subscription)
                <div class="col-12 back mb-5 d-flex align-items-center justify-content-end">
                    <div class="row w-100 justify-content-end">
                        <div class="flex-wrap col-xl-8 d-flex align-items-center justify-content-between gap-2 gap-sm-4">
                            <div class="status">تم انتهاء اشتراكك</div>
                            <a class="update btn m-auto"> تحديث الاشتراك</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-xl-4 pe-lg-0 r-bar text-center text-xl-end ps-xl-5">
                <div class="row parent-boxes">
                    <div class="col-12 mb-5">
                        <div class="box box-info">
                            <div class="photo">
                                <img class="img-fluid" src="./img/person.jpg" alt="" />
                            </div>
                            <h4>{{ $name }}</h4>
                            <p>
                                @if ($membership_type == 'vendor')
                                    مقدم خدمة
                                @elseif($membership_type == 'user')
                                    مستخدم
                                @elseif($membership_type == 'employee')
                                    موظف
                                @else
                                    محامي
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="box text-start  box-data d-flex flex-column">
                            <div class="box-child d-flex flex-column ">
                                <div class="data d-flex gap-1 justify-content-between align-items-center">
                                    <p class="title">
                                        بريد الالكتروني:
                                    </p>
                                    <p class="content">
                                        {{ $email }}
                                    </p>
                                </div>
                                <div class="status {{ $email_verify == 'pending' ? 'dn-active' : 'active' }}">
                                    {{ $email_verify == 'pending' ? 'لم يتم التحقق' : 'تم التحقق' }}
                                    <div class="icon">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="box-child d-flex flex-column ">
                                <div class="data gap-1 d-flex justify-content-between align-items-center">
                                    <p class="title">هاتف:</p>
                                    <p class="content">{{ $mobile }}</p>
                                </div>
                                <div class="status {{ $mobile_verify == 'pending' ? 'dn-active' : 'active' }}">
                                    {{ $mobile_verify == 'pending' ? 'لم يتم التحقق' : 'تم التحقق' }}
                                    <div class="icon"> <i class="fa-solid fa-check"></i></div>

                                </div>
                            </div>


                            @if ($membership_type == 'vendor' || ($membership_type == 'user' && $account_type == 'company'))
                                <div class="box-child d-flex flex-column ">
                                    <div class="data d-flex gap-1 justify-content-between align-items-center">
                                        <p class="title">
                                            السجلات التجارية:
                                        </p>
                                        <div class="status dn-active">
                                            لم يتم التحقق
                                            <div class="icon">
                                                <i class="fa-solid fa-xmark"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if ($membership_type == 'vendor')
                                <div class="box-child d-flex flex-column ">
                                    <div class="data d-flex gap-1 justify-content-between align-items-center">
                                        <p class="title">
                                            الاشتركات:
                                        </p>
                                        <p class="{{ auth()->user()->current_subscription ? '' : 'dont-sub' }}">
                                            @if (auth()->user()->packageRequests->count() > 0)
                                                @if (auth()->user()->current_subscription)
                                                    {{ auth()->user()->current_subscription->package->package_title }}
                                                @else
                                                    انتهى الاشتراك
                                                @endif
                                            @else
                                                غير مشترك
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="box-child d-flex flex-column ">
                                    <div class="data d-flex gap-1 justify-content-between align-items-center">
                                        <p class="title">
                                            الرخصة المهنية:
                                        </p>
                                        <div class="status waiting">
                                            في حالة الانتظار
                                            <div class="icon">
                                                <i class="fa-solid fa-spinner"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-child d-flex flex-column ">
                                    <div class="data d-flex gap-1 justify-content-between align-items-center">
                                        <p class="title">
                                            المؤهلات:
                                        </p>
                                        <div class="status active">
                                            تم التحقق
                                            <div class="icon">
                                                <i class="fa-solid fa-check"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-child d-flex flex-column ">
                                    <div class="data d-flex gap-1 justify-content-between align-items-center">
                                        <p class="title">
                                            الخبرات:
                                        </p>
                                        <div class="status active">
                                            لم يتم التحقق
                                            <div class="icon">
                                                <i class="fa-solid fa-xmark"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <h4 class="mb-5 fw-bold">اعدادت الحساب الخاص بك</h4>

                <form wire:submit.prevent='update'>

                    <div class="row">
                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            <div class="box">
                                <div class="lable">الأسم بالكامل<span>*</span></div>
                                <input type="text" placeholder="الأسم بالكامل" wire:model="name" id="name">
                            </div>
                            <div class="box">
                                <div class="lable "> الجنس<span>*</span></div>
                                <div class="select">
                                    <i class="arrow fa-solid fa-chevron-down"></i>

                                    <select id="gender " wire:model="gender">
                                        <option class="place-h" value="">أختر الجنس</option>
                                        <option value="male">ذكر</option>
                                        <option value="female">انثى</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if ($membership_type == 'vendor')
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="box">
                                    <div class="lable">القسم الرئيسي<span>*</span></div>
                                    <div class="select">
                                        <i class="arrow fa-solid fa-chevron-down"></i>

                                        <select id="main-section " wire:model="main_department">
                                            @foreach ($main_departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->department_name_ar }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="lable "> القسم الفرعي<span>*</span></div>
                                    <div class="select">
                                        <i class="arrow fa-solid fa-chevron-down"></i>

                                        <select id="subsection  " wire:model="sub_department">
                                            @foreach ($sub_departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->department_name_ar }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            <div class="box">
                                <div class="lable"> الدولة<span>*</span></div>
                                <div class="select">
                                    <i class="arrow fa-solid fa-chevron-down"></i>

                                    <select id="main-section " wire:model="country_id">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="box">
                                <div class="lable "> المدينة<span>*</span></div>
                                <div class="select">
                                    <i class="arrow fa-solid fa-chevron-down"></i>

                                    <select id="subsection  " wire:model="city_id">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            <div class="box">
                                <div class="lable">العنوان</div>
                                <input type="text" placeholder="قم بكتابة العنوان الخاص بك... " wire:model="address"
                                    id="name">
                            </div>
                            @if ($membership_type == 'vendor')
                                <div class="box">
                                    <div class="lable "> الاشتراك الخاص بك</div>
                                    <div class="box-readonly">
                                        <a class="a-inp" href="">تحديث الاشتراك</a>
                                        <input type="text" readonly
                                            value="ينتهي في {{ optional(optional(active_user()->current_subscription)->package)->package_end_at }}"
                                            id="name">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            @if ($membership_type == 'vendor' || ($membership_type == 'user' && $account_type == 'company'))
                                <div class="box d-flex gap-2">
                                    <div class="w-75">
                                        <div class="lable">
                                            السجلات التجارية:
                                            <div class="tol-tip ">
                                                <div class="text"> هذا النص هو مثال لنص يمكن أن يستبدل
                                                    في نفس المساحة، لقد تم توليد هذا النص
                                                    من مولد النص العربي
                                                </div>
                                                <span class="icon">!</span>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="">رقم السجل اداري</div>
                                            <input type="text" wire:model="commercial_id" id="">

                                        </div>
                                        <div class="inp-file">
                                            <div class="">أضافة سجل اداري</div>
                                            <input type="file" wire:model="commercial_file" id=""
                                                accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                                            <div class=""> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="lable">تاريخ انتهاء السجل :</div>
                                        <input type="date" placeholder="تاريخ انتهاء السجل ... "
                                            wire:model="commercial_end_at">
                                    </div>
                                </div>
                            @endif
                            @if ($membership_type == 'vendor')
                                <div class="box d-flex gap-2">
                                    <div class="w-75">
                                        <div class="lable">
                                            الرخصة المهنية :
                                            <div class="tol-tip ">
                                                <div class="text"> هذا النص هو مثال لنص يمكن أن يستبدل
                                                    في نفس المساحة، لقد تم توليد هذا النص
                                                    من مولد النص العربي
                                                </div>
                                                <span class="icon">!</span>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="">اسم الرخصة المهنية</div>
                                            <input type="text" wire:model="license_name" id="">
                                            <div class=""> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                        <div class="inp-file">
                                            <div class="one">أضافة رخصة مهنية</div>
                                            <input type="file" wire:model="license_file" id=""
                                                accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="lable">تاريخ نهاية الرخصة :</div>
                                        <input type="date" placeholder=" تاريخ نهاية الرخصة ... "
                                            wire:model="license_end_at">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            @if ($membership_type == 'vendor')
                                <div class="box d-flex gap-2">
                                    <div class="w-75">
                                        <div class="lable">
                                            المؤهلات :
                                            <div class="tol-tip ">
                                                <div class="text"> هذا النص هو مثال لنص يمكن أن يستبدل
                                                    في نفس المساحة، لقد تم توليد هذا النص
                                                    من مولد النص العربي
                                                </div>
                                                <span class="icon">!</span>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="one">اسم شهادة المؤهل</div>
                                            <input type="text" wire:model="qualification_name" id="">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                        <div class="inp-file">
                                            <div class="one">أضافة شهادة المؤهل</div>
                                            <input type="file" wire:model="qualification_file" id=""
                                                accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>

                                </div>
                            @endif
                            <div class="box d-flex gap-2">
                                <div class="w-100">
                                    <div class="lable">
                                        رقم الهوية :
                                        <div class="tol-tip ">
                                            <div class="text"> هذا النص هو مثال لنص يمكن أن يستبدل
                                                في نفس المساحة، لقد تم توليد هذا النص
                                                من مولد النص العربي
                                            </div>
                                            <span class="icon">!</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="one">أضافة رقم الهوية</div>
                                        <input type="number" wire:model="id_number" id="">
                                        <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>
                                        @error('id_number')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        @if ($membership_type == 'vendor')
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="box w-100">
                                    <div class="lable">
                                        خبراتك :
                                        <div class="tol-tip ">
                                            <div class="text"> هذا النص هو مثال لنص يمكن أن يستبدل
                                                في نفس المساحة، لقد تم توليد هذا النص
                                                من مولد النص العربي
                                            </div>
                                            <span class="icon">!</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="one"> اسم الخبرة</div>
                                        <input type="text" wire:model="experience_name" id="">
                                        <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                    </div>
                                    <div class="inp-file">
                                        <div class="one"> خبراتك...</div>
                                        <input type="file" wire:model="experience_file" id=""
                                            accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                                        <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                    </div>
                                </div>



                            </div>
                        @endif
                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            <div class="lable">نبذه عنك</div>
                            <textarea placeholder="قم بكتابة نبذه عنك..." wire:model="bio" id=""></textarea>
                        </div>
                        <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                            <button class="inp-sub" type="submit">حفظ التغيرات</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
