<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class UserCommercialsRequest extends FormRequest {

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
			'commercial_id'     => 'required|string',
			'commercial_file'   => 'required|file',
			'commercial_end_at' => 'required|date',
			'user_id'           => 'required|integer|exists:users,id',
			'comment'           => 'sometimes|nullable|string',
		];
	}

	protected function onUpdate() {
		return [
			'commercial_id'     => 'required|string',
			'commercial_file'   => 'required|file',
			'commercial_end_at' => 'required|date',
			'user_id'           => 'required|integer|exists:users,id',
			'comment'           => 'sometimes|nullable|string',
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
			'commercial_id'     => trans('admin.commercial_id'),
			'commercial_file'   => trans('admin.commercial_file'),
			'commercial_end_at' => trans('admin.commercial_end_at'),
			'user_id'           => trans('admin.user_id'),
			'comment'           => trans('admin.comment'),
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