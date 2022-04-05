<div id="error-alert" class="d-none alert alert-danger mt-2">
    <span id="error"></span>
</div>
<div id="success-alert" class="d-none alert alert-success mt-2">
    <span id="success"></span>
</div>

<div id="identity_status-alert" class="alert mt-2">
    <span id="identity_status"></span>
</div>

<div class="col-12 px-0 row mb-4">
    <input type="hidden" name="identity_id" value="{{ $useridentity->id  ?? "" }}">
    <input type="hidden" name="verified" value="{{ $useridentity->verified  ?? "" }}">

    <div class="col-12 col-lg-4   my-3 py-2">
        <div class="col-12 px-0">
            <div class="col-12 px-0 d-flex text-center justify-content-center">
                <img src="{{ it()->url($useridentity->front_side ?? "" )}}" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
            </div>
            <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                صورة الوجه الأمامي من بطاقة تعريف الهوية الوطنية
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-4   my-3 py-2">
        <div class="col-12 px-0">
            <div class="col-12 px-0 d-flex text-center justify-content-center">
                <img src="{{ it()->url($useridentity->back_side ?? "" )}}" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
            </div>
            <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                برجاء ارفاق صورة الوجه الخلفي من بطاقة تعريف الهوية الوطنية
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-4   my-3 py-2">
        <div class="col-12 px-0">
            <div class="col-12 px-0 d-flex text-center justify-content-center">
                <img src="{{ it()->url($useridentity->selfie ?? "" )}}" style="max-width: 100%;width: 150px;min-height: 130px" class="d-inline-block">
            </div>
            <div class="col-12 px-0 pt-3 text-center font-1 naskh">
                صورة وانت تحمل الهوية الوطنية الخاصة بك
            </div>

        </div>
    </div>

    <div class="col-12 my-3 py-2 d-flex">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="confirm" name="identityCheck" id="confirm">
            <label class="form-check-label" for="confirm">
                تاكيد الهوية
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="reject" name="identityCheck" id="reject">
            <label class="form-check-label" for="reject">
                رفض الهوية
            </label>
        </div>

    </div>
    <div>
        <div class="col-12 col-md-12 my-1 py-2 d-none" id="reject_reason_container">
            <label for="reject_reason">سبب الرفض</label>
            <input class="form-control w-100" type="text" name="reject_reason" id="reject_reason">
        </div>
        <div class="col-12 my-3 py-2">
            <button class="btn btn-primary" id="confirmBtn" type="button" disabled>
                <span class="d-none spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                <span class="">حفظ</span>
            </button>
        </div>
    </div>

</div>

@push('js')
<script>
    $(function() {
        let verified = $('input[name="verified"]').val();
        if (verified == 'verified') {
            $('#identity_status-alert').addClass('alert-success');
            $('#identity_status').text('تم تاكيد الهوية بنجاح');
        } else if (verified == 'rejected') {
            $('#identity_status-alert').addClass('alert-danger');
            $('#identity_status').text('تم رفض الهوية وبنتظار العميل لرفع هوية جديدة');
        } else {
            $('#identity_status-alert').addClass('alert-warning');
            $('#identity_status').text('باٍنتظار اتخاذ اجراء');
        }
        console.log('ready');
        $('input[type=radio][name=identityCheck]').change(function() {
            if (!$('#identity_status-alert').hasClass('d-none'))
                $('#identity_status-alert').addClass('d-none');
            $('#confirmBtn').prop('disabled', false);
            if (this.value == 'confirm') {
                if (!$('#reject_reason_container').hasClass('d-none')) {
                    $('#reject_reason_container').addClass('d-none');
                }
            } else {
                $('#reject_reason_container').removeClass('d-none');
            }

        });

        $('#confirmBtn').on('click', () => {
            var formData = new FormData();
            let identityCheck = $('input[name="identityCheck"]:checked').val();
            let reject_reason = $('input[name="reject_reason"]').val();
            formData.append('id', +$('input[name="identity_id"]').val());
            if (identityCheck == 'confirm') {
                formData.append('verified', 'verified');
            } else {
                formData.append('verified', 'rejected');
                formData.append('reject_reason', reject_reason);
            }
            console.log('confirm....', formData);
            $('.spinner-grow').toggleClass('d-none');
            $.ajax({
                type: 'post',
                url: '/api/v1/identity-action',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem("token"),
                    // "Authorization": "Bearer " + localStorage.getItem("token")
                },
                success: (response) => {
                    console.log(response);
                    $('.spinner-grow').toggleClass('d-none');
                    $('#success').text(response.message);
                    $('#success-alert').toggleClass('d-none');
                },
                error: (response) => {
                    $('.spinner-grow').toggleClass('d-none');
                    $('#error').text(response.message)
                    $('#error-alert').toggleClass('d-none');
                    console.log(response);
                }
            });
        });

    });
</script>
@endpush