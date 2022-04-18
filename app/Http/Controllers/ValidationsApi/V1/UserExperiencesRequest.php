<?php

namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserExperiencesRequest extends FormRequest
{

    /**
     * Baboon Script By [it v 1.6.37]
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Baboon Script By [it v 1.6.37]
     * Get the validation rules that apply to the request.
     *
     * @return array (onCreate,onUpdate,rules) methods
     */
    protected function onCreate()
    {
        return [
            'experience_name' => 'required|string',
            'experience_file' => 'required|file|pdf',
            'user_id' => 'required|integer|exists:users,id',
            'specialtie_id' => 'required',
            'comment' => 'sometimes|nullable|string',
        ];
    }


    protected function onUpdate()
    {
        return [
            'experience_name' => 'required|string',
            'experience_file' => 'required|file|pdf',
            'specialtie_id' => 'sometimes',
            'user_id' => 'required|integer|exists:users,id',
            'comment' => 'sometimes|nullable|string',
        ];
    }

    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }


    /**
     * Baboon Script By [it v 1.6.37]
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'experience_name' => trans('admin.experience_name'),
            'experience_file' => trans('admin.experience_file'),
            'user_id' => trans('admin.user_id'),
            'comment' => trans('admin.comment'),
        ];
    }

    /**
     * Baboon Script By [it v 1.6.37]
     * response redirect if fails or failed request
     *
     * @return redirect
     */
    public function response(array $errors)
    {
        return $this->ajax() || $this->wantsJson() ?
            response([
                'status' => false,
                'StatusCode' => 422,
                'StatusType' => 'Unprocessable',
                'errors' => $errors,
            ], 422) :
            back()->withErrors($errors)->withInput(); // Redirect back
    }


}