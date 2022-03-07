<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OccupationsRequest extends FormRequest {

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
             'occupation_name_ar'=>'required|string',
             'occupation_name_en'=>'required|string',
             'licenses'=>'required|string|in:enable,disable',
             'experiences'=>'required|string|in:enable,disable',
             'qualifications'=>'required|string|in:enable,disable',
             'commercial_records'=>'required|string|in:enable,disable',
		];
	}

	protected function onUpdate() {
		return [
             'occupation_name_ar'=>'required|string',
             'occupation_name_en'=>'required|string',
             'licenses'=>'required|string|in:enable,disable',
             'experiences'=>'required|string|in:enable,disable',
             'qualifications'=>'required|string|in:enable,disable',
             'commercial_records'=>'required|string|in:enable,disable',
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
             'occupation_name_ar'=>trans('admin.occupation_name_ar'),
             'occupation_name_en'=>trans('admin.occupation_name_en'),
             'licenses'=>trans('admin.licenses'),
             'experiences'=>trans('admin.experiences'),
             'qualifications'=>trans('admin.qualifications'),
             'commercial_records'=>trans('admin.commercial_records'),
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