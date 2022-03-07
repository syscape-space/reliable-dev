<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderTypesRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'type_name_ar'=>'required|string',
             'type_name_en'=>'required|string',
             'type_desc_ar'=>'sometimes|nullable|string',
             'type_desc_en'=>'sometimes|nullable|string',
             'type_icon'=>'sometimes|nullable|file|image',
             'type_status'=>'required|string|in:show,hide',
		];
	}

	protected function onUpdate() {
		return [
             'type_name_ar'=>'required|string',
             'type_name_en'=>'required|string',
             'type_desc_ar'=>'sometimes|nullable|string',
             'type_desc_en'=>'sometimes|nullable|string',
             'type_icon'=>'sometimes|nullable|file|image',
             'type_status'=>'required|string|in:show,hide',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'type_name_ar'=>trans('admin.type_name_ar'),
             'type_name_en'=>trans('admin.type_name_en'),
             'type_desc_ar'=>trans('admin.type_desc_ar'),
             'type_desc_en'=>trans('admin.type_desc_en'),
             'type_icon'=>trans('admin.type_icon'),
             'type_status'=>trans('admin.type_status'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
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