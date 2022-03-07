<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class TicketsRequest extends FormRequest {

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
			'ticket_title'         => 'required|string',
			'ticket_linked'        => 'required|string|in:order,offer,charge,received_money,account,other',
			'link_id'              => 'sometimes|nullable|integer',
			'user_id'              => 'required|integer|exists:users,id',
			'ticket_department_id' => 'required|integer|exists:ticket_departments,id',
			'ticket_content'       => 'required|string',
			'ticket_status'        => 'required|string|in:opened,closed',
			'user_ticket_rate'     => 'sometimes|nullable|integer|in:1,2,3,4,5',
			'user_ticket_comment'  => 'sometimes|nullable|string',
		];
	}

	protected function onUpdate() {
		return [
			'ticket_title'         => 'required|string',
			'ticket_linked'        => 'required|string|in:order,offer,charge,received_money,account,other',
			'ticket_department_id' => 'required|integer|exists:ticket_departments,id',
			'link_id'              => 'sometimes|nullable|integer',
			'user_id'              => 'required|integer|exists:users,id',
			'ticket_content'       => 'required|string',
			'ticket_status'        => 'required|string|in:opened,closed',
			'user_ticket_rate'     => 'sometimes|nullable|integer|in:1,2,3,4,5',
			'user_ticket_comment'  => 'sometimes|nullable|string',
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
			'ticket_title'         => trans('admin.ticket_title'),
			'ticket_linked'        => trans('admin.ticket_linked'),
			'link_id'              => trans('admin.link_id'),
			'user_id'              => trans('admin.user_id'),
			'ticket_content'       => trans('admin.ticket_content'),
			'ticket_status'        => trans('admin.ticket_status'),
			'user_ticket_rate'     => trans('admin.user_ticket_rate'),
			'user_ticket_comment'  => trans('admin.user_ticket_comment'),
			'ticket_department_id' => trans('admin.ticket_department_id'),
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