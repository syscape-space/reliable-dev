@include('front.layout.rightNavbar')
@include('front.layout.topNavbar')

<section class="personal-section mt-2">
    <div class="personal">
      <div class="personal-info">
         <div class="btw-flex">
            <div class="position-relative">
              <i style="position: absolute;
              top: 50%;
              right:5px;
              transform: translateY(-50%);" class="text-white fas fa-search"></i>
              <input 

                placeholder="... بحث"
              class=" search-cc form-control  pe-4" type="text" name="" id="">
            </div>
            <div>
              <div class="btn-group">
                <button 
                  
                style="background-color: #0995EB;border-color: #0995EB;" type="button" class="f-14 collapsed btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-filter"></i>
                  فلتر
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
              </div>
              
            </div>
        </div>
        <div class="p-3 mt-3 mb-4" style="background-color: #F9F9F9;">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px;">
              <span class="ms-3">
                <img style="width: 15px;" class="ms-1" src="./images/o_clock.svg" alt=""> <span>منذ 4 ساعات</span>
              </span>
              
              <span class="ms-3">
                <img style="width: 20px;" class="ms-1" src="./images/o_offer.svg" alt=""> <span>مقدم 5 عروض</span>
              </span>
              <span class="ms-3">
                <img style="width: 14px;" class="ms-1" src="./images/o_map.svg" alt=""> <span>السعودية</span>
              </span>
              <span class="my-2" style="font-size: 12px;">
                <span class="o-box ms-2">
                  <img style="width: 15px;" class="ms-1" src="./images/o_delever.svg" alt="">
                  <span>مده التسليم:</span>
                  <span class="me-2">14 يوم</span>
                </span>
                <span>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
             </span>
            </div>
            
              
          </div>
          <div class="row w-100 mx-0 px-0 ">
            <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
              <div style="border-left: 3px solid #ddd;" class="px-3">
                <img style="width: 70px;" src="./images/user.svg" alt="">
              <div>
                <div class="text-center">
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star"></i>
                </div>
                </div>
                <div>
                  <span style="color: #2b7b74" class="mb-2 d-inline-block text-center">محامي عام
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <h6 style="color: #048E81;">عنوان الطلب هنا</h6>
              <div class="btw-flex mb-3">
                <div class="f-14 mt-3">
                  <span>
                    <span style="color: #0995EB;" class="ms-1">المدعي علية:</span>
                    <span>احمد علي ياسين</span>
                  </span> <br>
                  <span>
                    <span>طلب رقم 52410</span>
                  </span>
                </div>
                <div class="mt-3 ">
                  <div class="text-start">
                    <button style="
                    border: 0;
                    background-color: #048e81;
                    color: #fff;
                    font-size: 12px;
                    padding: 0 40px;
                    height: 40px;
                    " class="rounded">
                      القبول المبدئي
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 mt-3 mb-4" style="background-color: #F9F9F9;">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px;">
              <span class="ms-3">
                <img style="width: 15px;" class="ms-1" src="./images/o_clock.svg" alt=""> <span>منذ 4 ساعات</span>
              </span>
              
              <span class="ms-3">
                <img style="width: 20px;" class="ms-1" src="./images/o_offer.svg" alt=""> <span>مقدم 5 عروض</span>
              </span>
              <span class="ms-3">
                <img style="width: 14px;" class="ms-1" src="./images/o_map.svg" alt=""> <span>السعودية</span>
              </span>
              <span class="my-2" style="font-size: 12px;">
                <span class="o-box ms-2">
                  <img style="width: 15px;" class="ms-1" src="./images/o_delever.svg" alt="">
                  <span>مده التسليم:</span>
                  <span class="me-2">14 يوم</span>
                </span>
                <span>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
             </span>
            </div>
            
              
          </div>
          <div class="row w-100 mx-0 px-0 ">
            <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
              <div style="border-left: 3px solid #ddd;" class="px-3">
                <img style="width: 70px;" src="./images/user.svg" alt="">
              <div>
                <div class="text-center">
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star"></i>
                </div>
                </div>
                <div>
                  <span style="color: #2b7b74" class="mb-2 d-inline-block text-center">محامي عام
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <h6 style="color: #048E81;">عنوان الطلب هنا</h6>
              <div class="btw-flex mb-3">
                <div class="f-14 mt-3">
                  <span>
                    <span style="color: #0995EB;" class="ms-1">المدعي علية:</span>
                    <span>احمد علي ياسين</span>
                  </span> <br>
                  <span>
                    <span>طلب رقم 52410</span>
                  </span>
                </div>
                <div class="mt-3 ">
                  <div class="text-start">
                    <button style="
                    border: 0;
                    background-color: #048e81;
                    color: #fff;
                    font-size: 12px;
                    padding: 0 40px;
                    height: 40px;
                    " class="rounded">
                      القبول المبدئي
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 mt-3 mb-4" style="background-color: #F9F9F9;">
          <div class="">
            <div class="mb-2 text-start" style="font-size: 12px;">
              <span class="ms-3">
                <img style="width: 15px;" class="ms-1" src="./images/o_clock.svg" alt=""> <span>منذ 4 ساعات</span>
              </span>
              
              <span class="ms-3">
                <img style="width: 20px;" class="ms-1" src="./images/o_offer.svg" alt=""> <span>مقدم 5 عروض</span>
              </span>
              <span class="ms-3">
                <img style="width: 14px;" class="ms-1" src="./images/o_map.svg" alt=""> <span>السعودية</span>
              </span>
              <span class="my-2" style="font-size: 12px;">
                <span class="o-box ms-2">
                  <img style="width: 15px;" class="ms-1" src="./images/o_delever.svg" alt="">
                  <span>مده التسليم:</span>
                  <span class="me-2">14 يوم</span>
                </span>
                <span>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
             </span>
            </div>
            
              
          </div>
          <div class="row w-100 mx-0 px-0 ">
            <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
              <div style="border-left: 3px solid #ddd;" class="px-3">
                <img style="width: 70px;" src="./images/user.svg" alt="">
              <div>
                <div class="text-center">
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star"></i>
                </div>
                </div>
                <div>
                  <span style="color: #2b7b74" class="mb-2 d-inline-block text-center">محامي عام
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <h6 style="color: #048E81;">عنوان الطلب هنا</h6>
              <div class="btw-flex mb-3">
                <div class="f-14 mt-3">
                  <span>
                    <span style="color: #0995EB;" class="ms-1">المدعي علية:</span>
                    <span>احمد علي ياسين</span>
                  </span> <br>
                  <span>
                    <span>طلب رقم 52410</span>
                  </span>
                </div>
                <div class="mt-3 ">
                  <div class="text-start">
                    <button style="
                    border: 0;
                    background-color: #048e81;
                    color: #fff;
                    font-size: 12px;
                    padding: 0 40px;
                    height: 40px;
                    " class="rounded">
                      القبول المبدئي
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center mt-2">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>