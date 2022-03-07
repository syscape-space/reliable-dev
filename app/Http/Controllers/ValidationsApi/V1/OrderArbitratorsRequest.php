<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderArbitratorsRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.38]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'order_id'=>'required|integer|exists:orders,id',
             'arbitrator_id'=>'required|integer|exists:users,id',
             'notify_arbitrator'=>'required|string|in:yes,no',
             'arbitrator_amount'=>'sometimes|nullable|integer',
             'arbitrator_add_amount'=>'required|string|in:yes,no',
             'user_accept_amount'=>'required|string|in:pending,accept,reject',
             'vendor_accept_amount'=>'required|string|in:pending,accept,reject',
             'arbitrator_decision'=>'sometimes|nullable|string',
             'user_accept_decision'=>'required|string|in:pending,accept,reject',
             'vendor_accept_decision'=>'sometimes|nullable|string|in:pending,accept,reject',
		];
	}


	protected function onUpdate() {
		return [
             'order_id'=>'required|integer|exists:orders,id',
             'arbitrator_id'=>'required|integer|exists:users,id',
             'notify_arbitrator'=>'required|string|in:yes,no',
             'arbitrator_amount'=>'sometimes|nullable|integer',
             'arbitrator_add_amount'=>'required|string|in:yes,no',
             'user_accept_amount'=>'required|string|in:pending,accept,reject',
             'vendor_accept_amount'=>'required|string|in:pending,accept,reject',
             'arbitrator_decision'=>'sometimes|nullable|string',
             'user_accept_decision'=>'required|string|in:pending,accept,reject',
             'vendor_accept_decision'=>'sometimes|nullable|string|in:pending,accept,reject',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.38]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'order_id'=>trans('admin.order_id'),
             'arbitrator_id'=>trans('admin.arbitrator_id'),
             'notify_arbitrator'=>trans('admin.notify_arbitrator'),
             'arbitrator_amount'=>trans('admin.arbitrator_amount'),
             'arbitrator_add_amount'=>trans('admin.arbitrator_add_amount'),
             'user_accept_amount'=>trans('admin.user_accept_amount'),
             'vendor_accept_amount'=>trans('admin.vendor_accept_amount'),
             'arbitrator_decision'=>trans('admin.arbitrator_decision'),
             'user_accept_decision'=>trans('admin.user_accept_decision'),
             'vendor_accept_decision'=>trans('admin.vendor_accept_decision'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.38]
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