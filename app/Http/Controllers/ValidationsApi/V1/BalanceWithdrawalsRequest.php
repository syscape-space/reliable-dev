<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BalanceWithdrawalsRequest extends FormRequest {

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
             'receipt_via'=>'required|string|in:bank_transfer,bank_account,system',
             'transfer_picture'=>'sometimes|nullable|file',
             'withdrawal_status'=>'required|string',
             'reason'=>'sometimes|nullable|string',
             'system_notes'=>'sometimes|nullable|string',
		];
	}


	protected function onUpdate() {
		return [
             'user_id'=>'required|integer|exists:users,id',
             'amount'=>'required|numeric',
             'receipt_via'=>'required|string|in:bank_transfer,bank_account,system',
             'transfer_picture'=>'sometimes|nullable|file',
             'withdrawal_status'=>'required|string',
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
             'receipt_via'=>trans('admin.receipt_via'),
             'transfer_picture'=>trans('admin.transfer_picture'),
             'withdrawal_status'=>trans('admin.withdrawal_status'),
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