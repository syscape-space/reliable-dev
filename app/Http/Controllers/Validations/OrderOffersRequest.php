<?php
namespace App\Http\Controllers\Validations;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderOffersRequest extends FormRequest {

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
	public function user_id() {
		if (request('offer_status') == 'approved') {
			$order = Order::find(request('order_id'));
			return $order->user_id;
		} else {
			return null;
		}
	}
	protected function onCreate() {

		return [
			'order_id'                            => 'required|integer|exists:orders,id',
			'vendor_id'                           => 'required|integer|exists:users,id',
			'vendor_comment'                      => 'required|nullable|string',
			'price'                               => 'required|nullable|numeric|UserHaveBalance:'.$this->user_id(),
			'execution_time'                      => 'required|nullable|integer',
			'offer_status'                        => 'required|in:pending,approved,refused,cancelled|OrderHadApprovedOffer:'.request('order_id'),
			'requester_rate'                      => 'sometimes|nullable|string|in:1,2,3,4,5',
			'requester_feedback'                  => 'sometimes|nullable|string',
			'feedback_requester_status_by_admin'  => 'sometimes|nullable|string',
			'user_offer_objected_status'          => 'sometimes|nullable|string|in:yes,no,ended',
			'user_offer_objected_endat'           => 'sometimes|nullable|date',
			'user_offer_rate'                     => 'sometimes|nullable|string|in:1,2,3,4,5',
			'user_offer_comment'                  => 'sometimes|nullable|string',
			'feedback_user_offer_status_by_admin' => 'sometimes|nullable|string',
			'requester_objected_status'           => 'sometimes|nullable|string|in:yes,no,ended',
			'requester_objected_endat'            => 'sometimes|nullable|date',
		];
	}

	protected function onUpdate() {
		return [
			'order_id'                            => 'required|integer|exists:orders,id',
			'vendor_id'                           => 'required|integer|exists:users,id',
			'vendor_comment'                      => 'sometimes|nullable|string',
			'price'                               => 'sometimes|nullable|numeric|UserHaveBalance:'.$this->user_id(),
			'execution_time'                      => 'sometimes|nullable|integer',
			'offer_status'                        => 'required|in:pending,approved,refused,cancelled|OrderHadApprovedOffer:'.request('order_id').','.request()->segment(3),
			'requester_rate'                      => 'sometimes|nullable|string|in:1,2,3,4,5',
			'requester_feedback'                  => 'sometimes|nullable|string',
			'feedback_requester_status_by_admin'  => 'sometimes|nullable|string',
			'user_offer_objected_status'          => 'sometimes|nullable|string|in:yes,no,ended',
			'user_offer_objected_endat'           => 'sometimes|nullable|date',
			'user_offer_rate'                     => 'sometimes|nullable|string|in:1,2,3,4,5',
			'user_offer_comment'                  => 'sometimes|nullable|string',
			'feedback_user_offer_status_by_admin' => 'sometimes|nullable|string',
			'requester_objected_status'           => 'sometimes|nullable|string|in:yes,no,ended',
			'requester_objected_endat'            => 'sometimes|nullable|date',
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
			'order_id'                            => trans('admin.order_id'),
			'vendor_id'                           => trans('admin.vendor_id'),
			'vendor_comment'                      => trans('admin.vendor_comment'),
			'price'                               => trans('admin.price'),
			'execution_time'                      => trans('admin.execution_time'),
			'offer_status'                        => trans('admin.offer_status'),
			'requester_rate'                      => trans('admin.requester_rate'),
			'requester_feedback'                  => trans('admin.requester_feedback'),
			'feedback_requester_status_by_admin'  => trans('admin.feedback_requester_status_by_admin'),
			'user_offer_objected_status'          => trans('admin.user_offer_objected_status'),
			'user_offer_objected_endat'           => trans('admin.user_offer_objected_endat'),
			'user_offer_rate'                     => trans('admin.user_offer_rate'),
			'user_offer_comment'                  => trans('admin.user_offer_comment'),
			'feedback_user_offer_status_by_admin' => trans('admin.feedback_user_offer_status_by_admin'),
			'requester_objected_status'           => trans('admin.requester_objected_status'),
			'requester_objected_endat'            => trans('admin.requester_objected_endat'),
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