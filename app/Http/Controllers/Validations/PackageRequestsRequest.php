<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequestsRequest extends FormRequest {

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
			'package_id'        => 'required|integer|exists:vendor_packages,id',
			'user_id'           => 'required|string|exists:users,id',
			'request_status'    => 'required|string',
			'refused_reason'    => 'sometimes|nullable|string',
			'suspended_balance' => 'required|string|in:yes,no',
			'notes'             => 'sometimes|nullable|string',
			'invoiced'          => 'required|string|in:yes,no',
			'invoice_id'        => 'sometimes|nullable|integer',
		];
	}

	protected function onUpdate() {
		return [
			'package_id'        => 'required|integer|exists:vendor_packages,id',
			'user_id'           => 'required|string|exists:users,id',
			'request_status'    => 'required|string',
			'refused_reason'    => 'sometimes|nullable|string',
			'suspended_balance' => 'required|string|in:yes,no',
			'notes'             => 'sometimes|nullable|string',
			'invoiced'          => 'required|string|in:yes,no',
			'invoice_id'        => 'sometimes|nullable|integer',
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
			'package_id'        => trans('admin.package_id'),
			'user_id'           => trans('admin.user_id'),
			'request_status'    => trans('admin.request_status'),
			'refused_reason'    => trans('admin.refused_reason'),
			'suspended_balance' => trans('admin.suspended_balance'),
			'notes'             => trans('admin.notes'),
			'invoiced'          => trans('admin.invoiced'),
			'invoice_id'        => trans('admin.invoice_id'),
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