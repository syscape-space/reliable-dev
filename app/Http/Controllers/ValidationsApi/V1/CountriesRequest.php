<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CountriesRequest extends FormRequest {

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
             'country_name_ar'=>'required|string',
             'country_name_en'=>'required|string',
             'country_key'=>'required|string',
             'country_iso'=>'required|string',
             'country_flag'=>'sometimes|nullable|file|image',
             'country_status'=>'required|string|in:show,hide',
		];
	}


	protected function onUpdate() {
		return [
             'country_name_ar'=>'required|string',
             'country_name_en'=>'required|string',
             'country_key'=>'required|string',
             'country_iso'=>'required|string',
             'country_flag'=>'sometimes|nullable|file|image',
             'country_status'=>'required|string|in:show,hide',
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
             'country_name_ar'=>trans('admin.country_name_ar'),
             'country_name_en'=>trans('admin.country_name_en'),
             'country_key'=>trans('admin.country_key'),
             'country_iso'=>trans('admin.country_iso'),
             'country_flag'=>trans('admin.country_flag'),
             'country_status'=>trans('admin.country_status'),
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