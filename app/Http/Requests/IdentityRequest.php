<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdentityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'front_side' => 'required|file',
            'back_side' => 'required|file',
            'selfie' => 'required|file',
            'comment' => 'nullable|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'front_side.required' => 'مطلوب صورة الوجه الأمامي من بطاقة تعريف الهوية الوطنية',
            'back_side.required' => 'مطلوب صورة الوجه الخلفي من بطاقة تعريف الهوية الوطنية',
            'selfie.required' => 'برجاء ارفاق صورة وانت تحمل الهوية الوطنية الخاصة بك',
        ];
    }
}
