@extends('front.layout.index')
@section('content')
    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>{{ $error }}</strong>
                </div>
            @endforeach
        </div>
    @endif
    <section class="add-ticket overflow-hidden py-5">
        <div class="container">
            <form action="{{ route('front.tickets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="ticket_status" value="opened">
                <h1 class="mb-5 fs-4 fw-normal text-secondary">
                    تفاصيل التذكرة
                </h1>
                <div class="row">
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="lable">عنوان التذكرة</div>
                        <input class="w-100" type="text" name="ticket_title" id="ticket_title" />
                    </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <div class="lable">اختار القسم</div>
                        <select class="w-100" name="ticket_department_id" id="ticket_department_id ">
                            @foreach ($ticket_departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <div class="lable">ارفاق ملفات</div>
                        <input class="w-100" type="file" name="ticket_file" id="ticket_file" />
                    </div>
                    <div class="col-12 my-3">
                        <div class="lable">التذكره مرتبطه ب</div>
                        <select class="w-100" name="ticket_linked" id="ticket_linked">
                            <option value="order">طلب</option>
                            <option value="offer">عرض</option>
                            <option value="charge">شحن رصيد</option>
                            <option value="received_money">سحب رصيد</option>
                            <option value="account">حساب</option>
                            <option value="other">أخري</option>
                        </select>
                    </div>
                    <div class="col-12 my-3">
                        <div class="lable">تفاصيل</div>
                        <textarea class="w-100" name="ticket_content" id="ticket_content"></textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <input type="submit" value="اضافة تذكرة جديدة" />
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
