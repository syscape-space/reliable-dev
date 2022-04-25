
    <!-- End Header -->
    <!-- Start Section Setting-->
    <section class="settings py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 back mb-5 d-flex align-items-center justify-content-end">
                    <div class="row w-100 justify-content-end">
                        <div class="flex-wrap col-xl-8 d-flex align-items-center justify-content-between gap-2 gap-sm-4">
                            <div class="status">تم انتهاء اشتراكك</div>
                            <a class="update btn m-auto"> تحديث الاشتراك</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 pe-lg-0 r-bar text-center text-xl-end ps-xl-5">
                    <div class="row parent-boxes">
                        <div class="col-12 mb-5">
                            <div class="box box-info">
                                <div class="photo">
                                    <img class="img-fluid" src="./img/person.jpg" alt="" />
                                </div>
                                <h4>محمد مصطفي</h4>
                                <p> مقدم خدمة</p>
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
                                            thevenom19994@gmail.com
                                        </p>
                                    </div>
                                    <div class="status active">
                                        تم التحقق
                                        <div class="icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-child d-flex flex-column ">
                                    <div class="data gap-1 d-flex justify-content-between align-items-center">
                                        <p class="title">هاتف:</p>
                                        <p class="content">+201033143665</p>
                                    </div>
                                    <div class="status active">
                                        تم التحقق
                                        <div class="icon"> <i class="fa-solid fa-check"></i></div>

                                    </div>
                                </div>
                                <div class="box-child d-flex flex-column ">
                                    <div class="data d-flex gap-1 justify-content-between align-items-center">
                                        <p class="title">
                                            الاشتركات:
                                        </p>
                                        <p class="dont-sub">
                                            غير مشترك
                                        </p>
                                    </div>

                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <h4 class="mb-5 fw-bold">اعدادت الحساب الخاص بك</h4>
                    <form action="">
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="box">
                                    <div class="lable">الأسم بالكامل<span>*</span></div>
                                    <input type="text" required placeholder="الأسم بالكامل" wire:model="name" id="name">
                                </div>
                                <div class="box">
                                    <div class="lable "> الجنس<span>*</span></div>
                                    <div class="select">
                                        <i class="arrow fa-solid fa-chevron-down"></i>

                                        <select required id="gender " wire:model="gender">
                                            <option class="place-h" value="">أختر الجنس</option>
                                            <option value="male">ذكر</option>
                                            <option value="famle">انثى</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="box">
                                    <div class="lable">القسم الرئيسي<span>*</span></div>
                                    <div class="select">
                                        <i class="arrow fa-solid fa-chevron-down"></i>

                                        <select required id="main-section " wire:model="main_department">
                                            @foreach ($main_departments as $department)
                                                <option value="{{$department->id}}">{{$department->department_name_ar}}</option>
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
                                                <option value="{{$department->id}}">{{$department->department_name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="box">
                                    <div class="lable"> الدولة<span>*</span></div>
                                    <div class="select">
                                        <i class="arrow fa-solid fa-chevron-down"></i>

                                        <select required id="main-section " wire:model="country_id">
                                            <option value="sa">المملكة العربية السعودية</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="lable "> المدينة<span>*</span></div>
                                    <div class="select">
                                        <i class="arrow fa-solid fa-chevron-down"></i>

                                        <select id="subsection  ">
                                            <option value="ra">الرياض</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="box">
                                    <div class="lable">العنوان</div>
                                    <input type="text" required placeholder="قم بكتابة العنوان الخاص بك... " name="addres"
                                        id="name">
                                </div>
                                <div class="box">
                                    <div class="lable "> الاشتراك الخاص بك</div>
                                    <div class="box-readonly">
                                        <a class="a-inp" href="">تحديث الاشتراك</a>
                                        <input type="text" required readonly value="ينتهي في 4/7/2022" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
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
                                        <div class="inp-file">
                                            <div class="one">أضافة سجل اداري</div>
                                            <input type="file" required name="" id="">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="lable">تاريخ الحصول عليها :</div>
                                        <input type="text" required placeholder="تاريخ انتهاء السجل ... " name="addres">
                                    </div>
                                </div>

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
                                        <div class="inp-file">
                                            <div class="one">أضافة رخصة مهنية</div>
                                            <input type="file" required name="" id="">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="lable">تاريخ نهاية الرخصة :</div>
                                        <input type="text" required placeholder=" تاريخ نهاية الرخصة ... " name="addres">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
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
                                        <div class="inp-file">
                                            <div class="one">أضافة شهادة المؤهل</div>
                                            <input type="file" required name="" id="">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="lable">تاريخ الحصول عليها :</div>
                                        <input type="text" required placeholder="تاريخ شهادة المؤهل... " name="addres">
                                    </div>
                                </div>

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
                                        <div class="inp-file">
                                            <div class="one">أضافة رقم الهوية</div>
                                            <input type="file" required name="" id="">
                                            <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
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
                                    <div class="inp-file">
                                        <div class="one"> خبراتك...</div>
                                        <input type="file" required name="" id="">
                                        <div class="two"> <i class="fa-solid fa-paperclip"></i> </div>

                                    </div>
                                </div>



                            </div>

                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <div class="lable">نبذه عنك</div>
                                <textarea placeholder="قم بكتابة نبذه عنك..." name="" id=""></textarea>
                            </div>
                            <div class="col-12 d-flex flex-wrap mb-4 justify-content-between">
                                <input class="inp-sub" type="submit" value="حفظ التغيرات">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Section -->
    <!-- Js Files -->

