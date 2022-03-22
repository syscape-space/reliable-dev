<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
		return [
             'order_title'=>'required|string|max:191',
             'order_content'=>'required|string',
             'department_id'=>'required|integer|exists:departments,id',
             'main_order_id'=>'sometimes|integer|exists:orders,id',
             'choose_service_provider'=>'required|string|in:all,by_city,by_filter,by_occupation',
             'country_id'=>'sometimes|nullable',
             'city_id'=>'sometimes|nullable',
             'execution_time'=>'sometimes|nullable|numeric',
             'amount'=>'required|numeric',
//             'order_status'=>'required|string|in:under_review,open,closed',
             'receive_offers'=>'sometimes|string|in:yes,no',
             'assigning_arbitration'=>'sometimes|string|in:yes,no',
             'decisions_refused_reason'=>'sometimes|nullable|string',
//             'user_id'=>'required|integer|exists:users,id',
            'order_type_id' =>  'required',
		];
	}


	protected function onUpdate() {
		return [
             'order_title'=>'required|string|max:191',
             'order_content'=>'required|string',
             'department_id'=>'required|integer|exists:departments,id',
             'choose_service_provider'=>'required|string|in:all,by_city,by_filter,by_occupation',
             'country_id'=>'sometimes|nullable|integer|exists:countries,id',
             'city_id'=>'sometimes|nullable|integer|exists:cities,id',
             'execution_time'=>'sometimes|nullable|numeric',
             'amount'=>'required|numeric',
             'order_status'=>'required|string|in:under_review,open,closed',
             'receive_offers'=>'required|string|in:yes,no',
             'assigning_arbitration'=>'required|string|in:yes,no',
             'decisions_refused_reason'=>'sometimes|nullable|string',
             'user_id'=>'required|integer|exists:users,id',
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
             'order_title'=>trans('admin.order_title'),
             'order_content'=>trans('admin.order_content'),
             'department_id'=>trans('admin.department_id'),
             'choose_service_provider'=>trans('admin.choose_service_provider'),
             'country_id'=>trans('admin.country_id'),
             'city_id'=>trans('admin.city_id'),
             'execution_time'=>trans('admin.execution_time'),
             'amount'=>trans('admin.amount'),
             'order_status'=>trans('admin.order_status'),
             'receive_offers'=>trans('admin.receive_offers'),
             'assigning_arbitration'=>trans('admin.assigning_arbitration'),
             'decisions_refused_reason'=>trans('admin.decisions_refused_reason'),
             'user_id'=>trans('admin.user_id'),
             'main_order_id'=>"رقم الطلب الملحق",
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