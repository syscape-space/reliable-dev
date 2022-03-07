<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TicketDepartmentsRequest extends FormRequest {

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
             'department_name_ar'=>'required|string',
             'department_name_en'=>'required|string',
             'dep_icon'=>'sometimes|nullable|image',
             'department_desc_ar'=>'sometimes|nullable|string',
             'department_desc_en'=>'sometimes|nullable|string',
             'department_status'=>'required|string|in:show,hide',
		];
	}


	protected function onUpdate() {
		return [
             'department_name_ar'=>'required|string',
             'department_name_en'=>'required|string',
             'dep_icon'=>'sometimes|nullable|image',
             'department_desc_ar'=>'sometimes|nullable|string',
             'department_desc_en'=>'sometimes|nullable|string',
             'department_status'=>'required|string|in:show,hide',
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
             'department_name_ar'=>trans('admin.department_name_ar'),
             'department_name_en'=>trans('admin.department_name_en'),
             'dep_icon'=>trans('admin.dep_icon'),
             'department_desc_ar'=>trans('admin.department_desc_ar'),
             'department_desc_en'=>trans('admin.department_desc_en'),
             'department_status'=>trans('admin.department_status'),
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