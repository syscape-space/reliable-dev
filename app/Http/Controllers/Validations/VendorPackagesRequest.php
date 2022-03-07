<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class VendorPackagesRequest extends FormRequest {

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
			'user_id'               => 'required|integer|exists:users,id',
			'package_title'         => 'required|string',
			'package_content'       => 'required|string',
			'package_status'        => 'required|string|in:show,hide',
			'duration_package_days' => 'required|integer',
			'package_price'         => 'required|numeric',
		];
	}

	protected function onUpdate() {
		return [
			'user_id'               => 'required|integer|exists:users,id',
			'package_title'         => 'required|string',
			'package_content'       => 'required|string',
			'package_status'        => 'required|string|in:show,hide',
			'duration_package_days' => 'required|integer',
			'package_price'         => 'required|numeric',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch')?
		$this->onUpdate():$this->onCreate();
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
			'user_id'               => trans('admin.user_id'),
			'package_title'         => trans('admin.package_title'),
			'package_content'       => trans('admin.package_content'),
			'package_status'        => trans('admin.package_status'),
			'number_purchases'      => trans('admin.number_purchases'),
			'duration_package_days' => trans('admin.duration_package_days'),
			'package_end_at'        => trans('admin.package_end_at'),
			'package_price'         => trans('admin.package_price'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson()?
		response([
				'status'     => false,
				'StatusCode' => 422,
				'StatusType' => 'Unprocessable',
				'errors'     => $errors,
			], 422):
		back()->withErrors($errors)->withInput();// Redirect back
	}

}