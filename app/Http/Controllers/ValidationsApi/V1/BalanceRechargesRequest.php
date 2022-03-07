<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BalanceRechargesRequest extends FormRequest {

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
             'user_id'=>'required|integer|exists:users,id',
             'amount'=>'required|numeric',
             'charge_by'=>'required|string|in:mada,sadad,bank_transfer',
             'transfer_name'=>'sometimes|nullable|string',
             'operation_number'=>'sometimes|nullable|string',
             'bank_name'=>'sometimes|nullable|string',
             'transfer_image'=>'sometimes|nullable|file|image',
             'user_note'=>'sometimes|nullable|string',
             'charge_status'=>'sometimes|nullable|string|in:pending,done,rejected',
             'reason'=>'sometimes|nullable|string',
             'system_notes'=>'sometimes|nullable|string',
		];
	}


	protected function onUpdate() {
		return [
             'user_id'=>'required|integer|exists:users,id',
             'amount'=>'required|numeric',
             'charge_by'=>'required|string|in:mada,sadad,bank_transfer',
             'transfer_name'=>'sometimes|nullable|string',
             'operation_number'=>'sometimes|nullable|string',
             'bank_name'=>'sometimes|nullable|string',
             'transfer_image'=>'sometimes|nullable|file|image',
             'user_note'=>'sometimes|nullable|string',
             'charge_status'=>'sometimes|nullable|string|in:pending,done,rejected',
             'reason'=>'sometimes|nullable|string',
             'system_notes'=>'sometimes|nullable|string',
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
             'user_id'=>trans('admin.user_id'),
             'amount'=>trans('admin.amount'),
             'charge_by'=>trans('admin.charge_by'),
             'transfer_name'=>trans('admin.transfer_name'),
             'operation_number'=>trans('admin.operation_number'),
             'bank_name'=>trans('admin.bank_name'),
             'transfer_image'=>trans('admin.transfer_image'),
             'user_note'=>trans('admin.user_note'),
             'charge_status'=>trans('admin.charge_status'),
             'reason'=>trans('admin.reason'),
             'system_notes'=>trans('admin.system_notes'),
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