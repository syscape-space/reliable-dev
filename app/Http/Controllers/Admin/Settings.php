<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class Settings extends Controller {

	public $fillable_tabs = ['subscription_fee_settings', 'account_settings', 'orders_settings', 'reviews_settings', 'payment_methods_settings', 'contract_formats_settings', 'attached_files_settings', 'terms_and_conditions_settings', 'sms_settings', 'iam_settings'];

	public function __construct() {

		$this->middleware('AdminRole:settings_show', [
				'only' => ['index', 'show'],
			]);
		$this->middleware('AdminRole:settings_edit', [
				'only' => ['store'],
			]);

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (!empty(request('type')) && !in_array(request('type'), $this->fillable_tabs)) {
			return redirect(aurl('settings'));
		}
		$title = !empty(request('type'))?' - '.trans('admin.'.request('type')):'';
		return view('admin.settings', ['title' => trans('admin.settings').$title]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//settings
		if (empty(request('type'))) {
			$rules = [
				'sitename_ar'    => 'required',
				'sitename_en'    => 'required',
				'email'          => 'required',
				'logo'           => 'sometimes|nullable|'.it()->image(),
				'icon'           => 'sometimes|nullable|'.it()->image(),
				'system_status'  => 'required|in:open,close',
				'system_message' => '',
				'whatsapp'       => 'sometimes|nullable',
				'mobile'         => 'sometimes|nullable',
			];
			$nicename = [
				'sitename_ar'    => trans('admin.sitename_ar'),
				'sitename_en'    => trans('admin.sitename_en'),
				'email'          => trans('admin.email'),
				'logo'           => trans('admin.logo'),
				'icon'           => trans('admin.icon'),
				'system_status'  => trans('admin.system_status'),
				'system_message' => trans('admin.system_message'),
				'whatsapp'       => trans('admin.whatsapp'),
				'mobile'         => trans('admin.mobile'),
			];
		} elseif (request('type') == 'subscription_fee_settings') {
			$rules = [
				'customer_membership_fee'        => 'required',
				'vendor_membership_fee'          => 'required',
				'customer_membership_fee_status' => 'required|in:open,close',
				'vendor_membership_fee_status'   => 'required|in:open,close',
			];
			$nicename = [
				'customer_membership_fee'        => trans('admin.customer_membership_fee'),
				'vendor_membership_fee'          => trans('admin.vendor_membership_fee'),
				'customer_membership_fee_status' => trans('admin.customer_membership_fee_status'),
				'vendor_membership_fee_status'   => trans('admin.vendor_membership_fee_status'),
			];
		} elseif (request('type') == 'sms_settings') {
			$rules = [
				'sms_sender'                => 'required',
				'sms_mobile'                => 'required',
				'sms_password'              => 'required',
				'phone_verification_status' => 'required|in:open,close',
			];
			$nicename = [
				'sms_sender'                => trans('admin.sms_sender'),
				'sms_mobile'                => trans('admin.sms_mobile'),
				'sms_password'              => trans('admin.sms_password'),
				'phone_verification_status' => trans('admin.phone_verification_status'),
			];
		} elseif (request('type') == 'iam_settings') {
			$rules = [
				'iam_status'     => 'required',
				'iam_public_key' => 'required',
				'iam_secret'     => 'required',
				'iam_ip'         => 'required|url',
			];
			$nicename = [
				'iam_status'     => trans('admin.iam_status'),
				'iam_public_key' => trans('admin.iam_public_key'),
				'iam_secret'     => trans('admin.iam_secret'),
				'iam_ip'         => trans('admin.iam_ip'),
			];
		} elseif (request('type') == 'account_settings') {
			$rules = [
				'register_new_customer'    => 'required',
				'register_new_vendor'      => 'required',
				'register_customer_status' => 'required|in:under_review,auto',
				'register_vendor_status'   => 'required|in:under_review,auto',
				'expiry_commercial_alarm'  => 'required',
				'expiry_license_alarm'     => 'required',
				'commercial_status'        => 'required|in:under_review,auto',
				'license_status'           => 'required|in:under_review,auto',
				'age_limit_vendor'         => 'required',
				'age_limit_customer'       => 'required',
			];
			$nicename = [
				'register_new_customer'    => trans('admin.register_new_customer'),
				'register_new_vendor'      => trans('admin.register_new_vendor'),
				'register_customer_status' => trans('admin.register_customer_status'),
				'register_vendor_status'   => trans('admin.register_vendor_status'),
				'expiry_commercial_alarm'  => trans('admin.expiry_commercial_alarm'),
				'expiry_license_alarm'     => trans('admin.expiry_license_alarm'),
				'commercial_status'        => trans('admin.commercial_status'),
				'license_status'           => trans('admin.license_status'),
				'age_limit_vendor'         => trans('admin.age_limit_vendor'),
				'age_limit_customer'       => trans('admin.age_limit_customer'),
			];
		} elseif (request('type') == 'payment_methods_settings') {
			$rules = [
				'mada_vat'             => 'required',
				'mada_status'          => 'required|in:enable,disable',
				'paypal_status'        => 'required|in:enable,disable',
				'paypal_vat'           => 'required',
				'sadad_status'         => 'required|in:enable,disable',
				'sadad_vat'            => 'required',
				'bank_transfer_status' => 'required|in:enable,disable',
				'bank_transfer_vat'    => 'required',
			];
			$nicename = [
				'mada_vat'             => trans('admin.mada_vat'),
				'mada_status'          => trans('admin.mada_status'),
				'paypal_status'        => trans('admin.paypal_status'),
				'paypal_vat'           => trans('admin.paypal_vat'),
				'sadad_status'         => trans('admin.sadad_status'),
				'sadad_vat'            => trans('admin.sadad_vat'),
				'bank_transfer_status' => trans('admin.bank_transfer_status'),
				'bank_transfer_vat'    => trans('admin.bank_transfer_vat'),
			];
		} elseif (request('type') == 'orders_settings') {
			$rules = [
				'add_order'                => 'required|in:enable,disable',
				'offers_order'             => 'required|in:enable,disable',
				'minimum_amount_add_order' => 'required',
				'amount_add_order_vat'     => 'required',
				'arbitration_amount_tax'   => 'required',
				'review_order_status'      => 'required|in:enable,disable',
				'review_offers_status'     => 'required|in:enable,disable',
				'enable_package_requests'     => 'required|in:1,0',
			];
			$nicename = [
				'add_order'                => trans('admin.add_order'),
				'offers_order'             => trans('admin.offers_order'),
				'minimum_amount_add_order' => trans('admin.minimum_amount_add_order'),
				'amount_add_order_vat'     => trans('admin.amount_add_order_vat'),
				'arbitration_amount_tax'   => trans('admin.arbitration_amount_tax'),
				'review_order_status'      => trans('admin.review_order_status'),
				'review_offers_status'     => trans('admin.review_offers_status'),
			];
		} elseif (request('type') == 'reviews_settings') {
			$rules = [
				'rate_orders_status'    => 'required|in:enable,disable',
				'rate_review_status'    => 'required|in:auto,under_review',
				'number_days_objection' => 'required',
			];
			$nicename = [
				'rate_orders_status'    => trans('admin.rate_orders_status'),
				'rate_review_status'    => trans('admin.rate_review_status'),
				'number_days_objection' => trans('admin.number_days_objection'),
			];
		} elseif (request('type') == 'contract_formats_settings') {
			$rules = [
				'contract_form'       => 'required',
				'maximum_arbitrators' => 'required',
			];
			$nicename = [
				'contract_form'       => trans('admin.contract_form'),
				'maximum_arbitrators' => trans('admin.maximum_arbitrators'),
			];
		} elseif (request('type') == 'terms_conditions_settings') {
			$rules = [
				'terms_conditions_subscription_fee_ar'     => 'required',
				'terms_conditions_subscription_fee_en'     => 'required',
				'terms_conditions_withdrawal_ar'           => 'required',
				'terms_conditions_withdrawal_en'           => 'required',
				'terms_conditions_recharge_en'             => 'required',
				'terms_conditions_recharge_ar'             => 'required',
				'terms_conditions_add_offer_ar'            => 'required',
				'terms_conditions_add_offer_en'            => 'required',
				'terms_conditions_add_order_ar'            => 'required',
				'terms_conditions_add_order_en'            => 'required',
				'terms_conditions_registering_vendor_ar'   => 'required',
				'terms_conditions_registering_vendor_en'   => 'required',
				'terms_conditions_registering_customer_ar' => 'required',
				'terms_conditions_registering_customer_en' => 'required',
			];
			$nicename = [
				'terms_conditions_subscription_fee_ar'     => trans('admin.terms_conditions_subscription_fee_ar'),
				'terms_conditions_subscription_fee_en'     => trans('admin.terms_conditions_subscription_fee_en'),
				'terms_conditions_withdrawal_ar'           => trans('admin.terms_conditions_withdrawal_ar'),
				'terms_conditions_withdrawal_en'           => trans('admin.terms_conditions_withdrawal_en'),
				'terms_conditions_recharge_en'             => trans('admin.terms_conditions_recharge_en'),
				'terms_conditions_recharge_ar'             => trans('admin.terms_conditions_recharge_ar'),
				'terms_conditions_add_offer_ar'            => trans('admin.terms_conditions_add_offer_ar'),
				'terms_conditions_add_offer_en'            => trans('admin.terms_conditions_add_offer_en'),
				'terms_conditions_add_order_ar'            => trans('admin.terms_conditions_add_order_ar'),
				'terms_conditions_add_order_en'            => trans('admin.terms_conditions_add_order_en'),
				'terms_conditions_registering_vendor_ar'   => trans('admin.terms_conditions_registering_vendor_ar'),
				'terms_conditions_registering_vendor_en'   => trans('admin.terms_conditions_registering_vendor_en'),
				'terms_conditions_registering_customer_ar' => trans('admin.terms_conditions_registering_customer_ar'),
				'terms_conditions_registering_customer_en' => trans('admin.terms_conditions_registering_customer_en'),
			];
		} elseif (request('type') == 'attached_files_settings') {

			$attachment_exts = [
				'attachment_orders_exts',
				'attachment_qualifications_exts',
				'attachment_experience_exts',
				'attachment_license_exts',
				'attachment_commercial_exts',
				'attachment_ticket_exts',
				'attachment_comment_ticket_exts',
			];

			$rules    = [];
			$nicename = [];
			foreach ($attachment_exts as $ext) {
				$rules[$ext]                = 'sometimes|nullable|array';
				$rules[$ext.".*"]           = 'sometimes|nullable|string';
				$rules[$ext."_size"]        = 'sometimes|nullable|array';
				$rules[$ext."_size.*"]      = 'sometimes|nullable|integer';
				$rules[$ext."_size_type"]   = 'sometimes|nullable|array';
				$rules[$ext."_size_type.*"] = 'sometimes|nullable|string';
				$nicename[$ext]             = trans('admin.'.$ext);
			}
			$rules["attachment_orders_files_timeout"]     = 'required|integer';
			$rules["attachment_comment_ticket_status"]    = 'required|in:enable,disable';
			$rules["attachment_ticket_status"]            = 'required|in:enable,disable';
			$nicename['attachment_orders_files_timeout']  = trans('admin.attachment_orders_files_timeout');
			$nicename['attachment_ticket_status']         = trans('admin.attachment_ticket_status');
			$nicename['attachment_comment_ticket_status'] = trans('admin.attachment_comment_ticket_status');

		}

		$data = $this->validate(request(), $rules, [], $nicename);

		if (empty(request('type'))) {
			if (request()->hasFile('logo')) {
				$data['logo'] = it()->upload('logo', 'setting');
			}
			if (request()->hasFile('icon')) {
				$data['icon'] = it()->upload('icon', 'setting');
			}
		} elseif (request('type') == 'attached_files_settings') {
			foreach ($attachment_exts as $ext) {
				if (!empty(request($ext))) {
					$outputjson = [
						$ext         => [
							'exts'      => request($ext),
							'size'      => request($ext.'_size'),
							'size_type' => request($ext.'_size_type'),
						],
					];
					$data[$ext] = json_encode($outputjson, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
					unset($data[$ext.'_size'], $data[$ext.'_size_type']);
				}
			}
		}

		Setting::orderBy('id', 'desc')->update($data);
		return successResponseJson([
				"message" => trans("admin.updated"),
				"data"    => setting(),
			]);
	}

}
