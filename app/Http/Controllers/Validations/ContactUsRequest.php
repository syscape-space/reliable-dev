<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactUsRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.36]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.36]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'full_name'=>'required|string',
             'email'=>'required|email',
             'mobile'=>'required|numeric',
             'title_msg'=>'required|string',
             'message'=>'required|string',
             'seen'=>'required|in:yes,no',
		];
	}

	protected function onUpdate() {
		return [
             'full_name'=>'required|string',
             'email'=>'required|email',
             'mobile'=>'required|numeric',
             'title_msg'=>'required|string',
             'message'=>'required|string',
             'seen'=>'required|in:yes,no',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.36]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'full_name'=>trans('admin.full_name'),
             'email'=>trans('admin.email'),
             'mobile'=>trans('admin.mobile'),
             'title_msg'=>trans('admin.title_msg'),
             'message'=>trans('admin.message'),
             'seen'=>trans('admin.seen'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.36]
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