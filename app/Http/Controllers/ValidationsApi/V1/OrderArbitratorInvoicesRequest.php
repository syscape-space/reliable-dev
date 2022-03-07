<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderArbitratorInvoicesRequest extends FormRequest {

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
             'order_arbitrator_id'=>'required|integer|exists:order_arbitrators,id',
             'vendor_id'=>'required|integer|exists:users,id',
             'user_id'=>'required|integer|exists:users,id',
             'vendor_amount'=>'required|numeric',
             'amount_deduction_from_vendor'=>'required|string|in:awaiting,recovered,discounted',
             'amount_deduction_from_user'=>'required|string|in:awaiting,recovered,discounted',
             'total_amount'=>'required|numeric',
             'system_tax'=>'required|numeric',
             'inovice_status'=>'required|string|in:open,closed',
             'user_amount'=>'required|numeric',
		];
	}


	protected function onUpdate() {
		return [
             'order_id'=>'required|integer|exists:orders,id',
             'arbitrator_id'=>'required|integer|exists:users,id',
             'order_arbitrator_id'=>'required|integer|exists:order_arbitrators,id',
             'vendor_id'=>'required|integer|exists:users,id',
             'user_id'=>'required|integer|exists:users,id',
             'vendor_amount'=>'required|numeric',
             'amount_deduction_from_vendor'=>'required|string|in:awaiting,recovered,discounted',
             'amount_deduction_from_user'=>'required|string|in:awaiting,recovered,discounted',
             'total_amount'=>'required|numeric',
             'system_tax'=>'required|numeric',
             'inovice_status'=>'required|string|in:open,closed',
             'user_amount'=>'required|numeric',
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
             'order_arbitrator_id'=>trans('admin.order_arbitrator_id'),
             'vendor_id'=>trans('admin.vendor_id'),
             'user_id'=>trans('admin.user_id'),
             'vendor_amount'=>trans('admin.vendor_amount'),
             'amount_deduction_from_vendor'=>trans('admin.amount_deduction_from_vendor'),
             'amount_deduction_from_user'=>trans('admin.amount_deduction_from_user'),
             'total_amount'=>trans('admin.total_amount'),
             'system_tax'=>trans('admin.system_tax'),
             'inovice_status'=>trans('admin.inovice_status'),
             'user_amount'=>trans('admin.user_amount'),
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