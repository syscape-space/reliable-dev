<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest {

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
			'order_type_id'           => 'required|integer|exists:order_types,id',
			'user_id'                 => 'required|integer|exists:users,id',
			'department_id'           => 'required|integer|exists:departments,id',
			'main_order_id'           => 'required_if:linked_order,=,yes|nullable|integer|exists:orders,id|UserHadOrder:'.$user,
			'linked_order'            => 'required|in:yes,no',
			'show_order_data'         => 'required_if:linked_order,=,yes|nullable|in:yes,no',
			'order_title'             => 'required|string|max:191',
			'order_content'           => 'required|string',
			'choose_service_provider' => 'required|string|in:all,by_city,by_filter',
			'country_id'              => 'required_if:choose_service_provider,=,by_city|nullable|integer|exists:countries,id',
			'city_id'                 => 'required_if:choose_service_provider,=,by_city|nullable|integer|exists:cities,id',
			'execution_time'          => 'required|numeric',
			'amount'                  => 'required',
			'receive_offers'          => 'required|string|in:yes,no',
			'assigning_arbitration'   => 'sometimes|nullable|string|in:yes,no',
			//'decisions_status'         => 'sometimes|nullable|string|in:pending,accept,refused',
			'decisions_refused_reason' => 'sometimes|nullable|string',
			'order_status'             => 'required|string|in:under_review,open,closed,close_and_refund,refused',
		];
	}

	protected function onUpdate() {
		$user = request('user_id');
		return [
			'user_id'                  => 'required|integer|exists:users,id',
			'main_order_id'            => 'required_if:linked_order,=,yes|nullable|integer|exists:orders,id|UserHadOrder:'.$user,
			'show_order_data'          => 'required_if:linked_order,=,yes|nullable|in:yes,no',
			'linked_order'             => 'required|in:yes,no',
			'order_type_id'            => 'required|integer|exists:order_types,id',
			'order_title'              => 'required|string|max:191',
			'order_content'            => 'required|string',
			'department_id'            => 'required|integer|exists:departments,id',
			'choose_service_provider'  => 'required|string|in:all,by_city,by_filter',
			'country_id'               => 'required_if:choose_service_provider,=,by_city|nullable|integer|exists:countries,id',
			'city_id'                  => 'required_if:choose_service_provider,=,by_city|nullable|integer|exists:cities,id',
			'execution_time'           => 'required|numeric',
			'amount'                   => 'required',
			'receive_offers'           => 'required|string|in:yes,no',
			'assigning_arbitration'    => 'sometimes|nullable|string|in:yes,no',
			'decisions_status'         => 'sometimes|nullable|string|in:pending,accept,refused',
			'decisions_refused_reason' => 'sometimes|nullable|string',
			'order_status'             => 'required|string|in:under_review,open,closed,close_and_refund,refused',
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
			'main_order_id'            => trans('admin.main_order_id'),
			'linked_order'             => trans('admin.linked_order'),
			'show_order_data'          => trans('admin.show_order_data'),
			'order_title'              => trans('admin.order_title'),
			'order_content'            => trans('admin.order_content'),
			'department_id'            => trans('admin.department_id'),
			'choose_service_provider'  => trans('admin.choose_service_provider'),
			'country_id'               => trans('admin.country_id'),
			'city_id'                  => trans('admin.city_id'),
			'execution_time'           => trans('admin.execution_time'),
			'amount'                   => trans('admin.amount'),
			'order_status'             => trans('admin.order_status'),
			'receive_offers'           => trans('admin.receive_offers'),
			'assigning_arbitration'    => trans('admin.assigning_arbitration'),
			'decisions_status'         => trans('admin.decisions_status'),
			'decisions_refused_reason' => trans('admin.decisions_refused_reason'),
			'user_id'                  => trans('admin.user_id'),
			'order_type_id'            => trans('admin.order_type_id'),
			'reason'                   => trans('admin.reason'),
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