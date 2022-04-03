<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest {

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
		$rules = [
			'first_name'                    => 'required|string',
			'middle_name'                   => 'required|string',
			'last_name'                     => 'required|string',
			'name'                          => 'required|string',
			'main_department'                          => 'required',
			'sub_department'                          => 'required',
			'email'                         => 'required|email|unique:users,email',
			'email_verify'                  => 'required|string|in:pending,verified',
			'mobile'                        => 'sometimes|nullable|unique:users,mobile|numeric',
			'mobile_verify'                 => 'required|string|in:pending,verified',
			'email_verify_code'             => 'sometimes|nullable|numeric',
			'mobile_verify_code'            => 'sometimes|nullable|numeric',
			'photo_profile'                 => 'sometimes|nullable|file|image',
			'rate_overall'                  => 'sometimes|nullable|numeric',
			'membership_type'               => 'required|string|in:user,vendor,employee',
			'account_type'                  => 'required|in:individual,company',
			'id_number'                     => 'required|numeric|unique:users,id_number',
			'id_type'                       => 'required|string|in:national_id,iqama,passport',
			'id_status'                     => 'required|string|in:pending,verified,refused',
			'unseen_msg'                    => 'sometimes|nullable|numeric',
			'unseen_notification'           => 'sometimes|nullable|numeric',
			'address'                       => 'sometimes|nullable|string',
			'lng'                           => 'sometimes|nullable|string',
			'lat'                           => 'sometimes|nullable|string',
			'bio'                           => 'sometimes|nullable|string',
			'birth_date'                    => 'sometimes|nullable|date',
			'account_status'                => 'required|string|in:pending,active,refused,ban',
			'ban_reason'                    => 'sometimes|nullable|string',
			'refused_reason'                => 'sometimes|nullable|string',
			'ban_end_at'                    => 'sometimes|nullable|date',
			'system_comment'                => 'sometimes|nullable|string',
			'subscribe_end_at'              => 'sometimes|nullable|date',
			'add_offer'                     => 'string|in:enable,disable',
			'disable_adding_offer_reason'   => 'sometimes|nullable|string',
			'add_request'                   => 'sometimes|nullable|string|in:enable,disable',
			'disable_adding_request_reason' => 'sometimes|nullable|string',
			'gender'                        => 'sometimes|nullable|string|in:male,female',
			'password'                      => 'sometimes|nullable|string|min:6',
			'current_balance'               => 'sometimes|nullable|numeric',
			'suspended_balance'             => 'sometimes|nullable|numeric',
		];
		$rules['country_id'] = 'required|integer|exists:countries,id';
		$rules['city_id']    = 'required|integer|exists:cities,id';
		if (request('membership_type') == 'employee') {
			$rules['company_id'] = 'required|integer|exists:users,id';
		}
		return $rules;
	}

	protected function onUpdate() {
		$rules = [
			'first_name'         => 'required|string',
			'middle_name'        => 'required|string',
			'last_name'          => 'required|string',
			'name'               => 'required|string',
			'main_department'               => 'required',
			'sub_department'               => 'required',
			'email'              => 'required|email|unique:users,email,'.request()->segment(3),
			'email_verify'       => 'required|string|in:pending,verified',
			'mobile'             => 'sometimes|nullable|numeric|unique:users,mobile,'.request()->segment(3),
			'mobile_verify'      => 'required|string|in:pending,verified',
			'email_verify_code'  => 'sometimes|nullable|numeric',
			'mobile_verify_code' => 'sometimes|nullable|numeric',
			'photo_profile'      => 'sometimes|nullable|file|image',
			'rate_overall'       => 'sometimes|nullable|numeric',
			//'membership_type'               => 'required|string|in:user,vendor,employee',
			'account_type'                  => 'required|in:individual,company',
			'id_number'                     => 'required|numeric|unique:users,id_number,'.request()->segment(3),
			'id_type'                       => 'required|string|in:national_id,iqama,passport',
			'id_status'                     => 'required|string|in:pending,verified,refused',
			'unseen_msg'                    => 'sometimes|nullable|numeric',
			'unseen_notification'           => 'sometimes|nullable|numeric',
			'address'                       => 'sometimes|nullable|string',
			'lng'                           => 'sometimes|nullable|string',
			'lat'                           => 'sometimes|nullable|string',
			'bio'                           => 'sometimes|nullable|string',
			'birth_date'                    => 'sometimes|nullable|date',
			'account_status'                => 'required|string|in:pending,active,refused,ban',
			'ban_reason'                    => 'sometimes|nullable|string',
			'refused_reason'                => 'sometimes|nullable|string',
			'ban_end_at'                    => 'sometimes|nullable|date',
			'system_comment'                => 'sometimes|nullable|string',
			'subscribe_end_at'              => 'sometimes|nullable|date',
			'add_offer'                     => 'string|in:enable,disable',
			'disable_adding_offer_reason'   => 'sometimes|nullable|string',
			'add_request'                   => 'sometimes|nullable|string|in:enable,disable',
			'disable_adding_request_reason' => 'sometimes|nullable|string',
			'gender'                        => 'sometimes|nullable|string|in:male,female',
			'password'                      => 'sometimes|nullable|string|min:6',
			'current_balance'               => 'sometimes|nullable|numeric',
			'suspended_balance'             => 'sometimes|nullable|numeric',
		];
		$rules['country_id'] = 'required|integer|exists:countries,id';
		$rules['city_id']    = 'required|integer|exists:cities,id';
		if (request('membership_type') == 'employee') {
			$rules['company_id'] = 'required|integer|exists:users,id';
		}
		return $rules;
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
			'first_name'                    => trans('admin.first_name'),
			'middle_name'                   => trans('admin.middle_name'),
			'last_name'                     => trans('admin.last_name'),
			'name'                          => trans('admin.name'),
			'email'                         => trans('admin.email'),
			'email_verify'                  => trans('admin.email_verify'),
			'mobile'                        => trans('admin.mobile'),
			'mobile_verify'                 => trans('admin.mobile_verify'),
			'email_verify_code'             => trans('admin.email_verify_code'),
			'mobile_verify_code'            => trans('admin.mobile_verify_code'),
			'photo_profile'                 => trans('admin.photo_profile'),
			'rate_overall'                  => trans('admin.rate_overall'),
			'membership_type'               => trans('admin.membership_type'),
			'account_type'                  => trans('admin.account_type'),
			'id_number'                     => trans('admin.id_number'),
			'id_type'                       => trans('admin.id_type'),
			'id_status'                     => trans('admin.id_status'),
			'unseen_msg'                    => trans('admin.unseen_msg'),
			'unseen_notification'           => trans('admin.unseen_notification'),
			'country_id'                    => trans('admin.country_id'),
			'city_id'                       => trans('admin.city_id'),
			'address'                       => trans('admin.address'),
			'lng'                           => trans('admin.lng'),
			'lat'                           => trans('admin.lat'),
			'bio'                           => trans('admin.bio'),
			'birth_date'                    => trans('admin.birth_date'),
			'account_status'                => trans('admin.account_status'),
			'ban_reason'                    => trans('admin.ban_reason'),
			'refused_reason'                => trans('admin.refused_reason'),
			'ban_end_at'                    => trans('admin.ban_end_at'),
			'system_comment'                => trans('admin.system_comment'),
			'subscribe_end_at'              => trans('admin.subscribe_end_at'),
			'company_id'                    => trans('admin.company_id'),
			'add_offer'                     => trans('admin.add_offer'),
			'disable_adding_offer_reason'   => trans('admin.disable_adding_offer_reason'),
			'add_request'                   => trans('admin.add_request'),
			'disable_adding_request_reason' => trans('admin.disable_adding_request_reason'),
			'gender'                        => trans('admin.gender'),
			'password'                      => trans('admin.password'),
			'current_balance'               => trans('admin.current_balance'),
			'suspended_balance'             => trans('admin.suspended_balance'),
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