<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest {

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
		$user = request('user_id');
		return [
			'address' => 'required|max:255',
			'qualification' => 'required|max:255',
			'experience' => 'required',
			'start_at' => 'required|date|after_of_equal:today',
			'end_at' => 'required|date|after:today'
		];
	}

	protected function onUpdate() {
		$user = request('user_id');
		return [
			'address' => 'required|max:255',
			'qualification' => 'required|max:255',
			'experience' => 'required',
			'start_at' => 'required|date|after_of_equal:today',
			'end_at' => 'required|date|after:today'
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
			'address' => trans('admin.address'),
			'qualification' => trans('admin.qualification'),
			'experience' => trans('admin.experience'),
			'start_at' => trans('admin.start_at'),
			'end_at' => trans('admin.end_at')
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
			], 422) :
		back()->withErrors($errors)->withInput();// Redirect back
	}

}