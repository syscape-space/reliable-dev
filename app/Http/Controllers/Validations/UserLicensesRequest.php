<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class UserLicensesRequest extends FormRequest {

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
			'license_name'   => 'required|string',
			'license_file'   => 'required|file',
			'user_id'        => 'required|integer|exists:users,id',
			'license_end_at' => '',
			'comment'        => 'sometimes|nullable|string',
		];
	}

	protected function onUpdate() {
		return [
			'license_name'   => 'required|string',
			'license_file'   => 'required|file',
			'user_id'        => 'required|integer|exists:users,id',
			'license_end_at' => '',
			'comment'        => 'sometimes|nullable|string',
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
			'license_name'   => trans('admin.license_name'),
			'license_file'   => trans('admin.license_file'),
			'user_id'        => trans('admin.user_id'),
			'license_end_at' => trans('admin.license_end_at'),
			'comment'        => trans('admin.comment'),
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