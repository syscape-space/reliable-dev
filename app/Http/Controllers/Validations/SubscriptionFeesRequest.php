<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubscriptionFeesRequest extends FormRequest {

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
             'user_id'=>'required|integer|exists:users,id',
             'amount'=>'required|numeric',
             'payment_method'=>'required|string|in:electronic_payment,bank_transfer',
             'payment_status'=>'required',
             'refused_reason'=>'sometimes|nullable|string',
             'electronic_payment_ref'=>'sometimes|nullable|string',
             'user_note'=>'sometimes|nullable|string',
             'comment'=>'sometimes|nullable|string',
		];
	}

	protected function onUpdate() {
		return [
             'user_id'=>'required|integer|exists:users,id',
             'amount'=>'required|numeric',
             'payment_method'=>'required|string|in:electronic_payment,bank_transfer',
             'payment_status'=>'required',
             'refused_reason'=>'sometimes|nullable|string',
             'electronic_payment_ref'=>'sometimes|nullable|string',
             'user_note'=>'sometimes|nullable|string',
             'comment'=>'sometimes|nullable|string',
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
             'user_id'=>trans('admin.user_id'),
             'amount'=>trans('admin.amount'),
             'payment_method'=>trans('admin.payment_method'),
             'payment_status'=>trans('admin.payment_status'),
             'refused_reason'=>trans('admin.refused_reason'),
             'electronic_payment_ref'=>trans('admin.electronic_payment_ref'),
             'user_note'=>trans('admin.user_note'),
             'comment'=>trans('admin.comment'),
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