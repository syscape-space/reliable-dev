<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderOfferInvoicesRequest extends FormRequest {

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
             'order_id'=>'required|integer|exists:orders,id',
             'offer_id'=>'required|integer|exists:order_offers,id',
             'offer_amount'=>'required|numeric',
             'system_tax'=>'required|numeric',
             'remaining_amount_to_vendor'=>'required|numeric',
             'amount_deduction_from_user'=>'required|string|in:awaiting,recovered,discounted',
             'added_amount_to_vendor_balance'=>'sometimes|nullable|string|in:yes,no',
             'added_amount_to_vendor_balance_at'=>'sometimes|nullable|date',
             'inovice_status'=>'sometimes|nullable|string|in:open,closed',
             'system_note'=>'sometimes|nullable|string',
		];
	}


	protected function onUpdate() {
		return [
             'order_id'=>'required|integer|exists:orders,id',
             'offer_id'=>'required|integer|exists:order_offers,id',
             'offer_amount'=>'required|numeric',
             'system_tax'=>'required|numeric',
             'remaining_amount_to_vendor'=>'required|numeric',
             'amount_deduction_from_user'=>'required|string|in:awaiting,recovered,discounted',
             'added_amount_to_vendor_balance'=>'sometimes|nullable|string|in:yes,no',
             'added_amount_to_vendor_balance_at'=>'sometimes|nullable|date',
             'inovice_status'=>'sometimes|nullable|string|in:open,closed',
             'system_note'=>'sometimes|nullable|string',
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
             'order_id'=>trans('admin.order_id'),
             'offer_id'=>trans('admin.offer_id'),
             'offer_amount'=>trans('admin.offer_amount'),
             'system_tax'=>trans('admin.system_tax'),
             'remaining_amount_to_vendor'=>trans('admin.remaining_amount_to_vendor'),
             'amount_deduction_from_user'=>trans('admin.amount_deduction_from_user'),
             'added_amount_to_vendor_balance'=>trans('admin.added_amount_to_vendor_balance'),
             'added_amount_to_vendor_balance_at'=>trans('admin.added_amount_to_vendor_balance_at'),
             'inovice_status'=>trans('admin.inovice_status'),
             'system_note'=>trans('admin.system_note'),
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