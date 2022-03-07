<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('settings', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('sitename_ar');
				$table->string('sitename_en');
				$table->string('email')->nullable();
				$table->string('logo')->nullable();
				$table->string('icon')->nullable();
				$table->string('whatsapp')->nullable();
				$table->string('mobile')->nullable();
				$table->enum('status_vendor_membership_fee', ['open', 'close'])->default('open');
				$table->enum('system_status', ['open', 'close'])->default('open');
				$table->longtext('system_message')->nullable();
				$table->longtext('theme_setting')->nullable();
				//subscription_fee_settings
				$table->decimal('customer_membership_fee', 8, 2)->nullable();
				$table->decimal('vendor_membership_fee', 8, 2)->nullable();
				$table->enum('customer_membership_fee_status', ['open', 'close'])->default('open');
				$table->enum('vendor_membership_fee_status', ['open', 'close'])->default('open');
				//iam_settings
				$table->enum('iam_status', ['open', 'close'])->default('open');
				$table->string('iam_public_key')->nullable();
				$table->string('iam_secret')->nullable();
				$table->string('iam_ip')->nullable();
				//iam_settings
				//sms_settings
				$table->string('sms_sender')->nullable();
				$table->string('sms_mobile')->nullable();
				$table->string('sms_password')->nullable();
				$table->enum('phone_verification_status', ['open', 'close'])->default('open');
				//account_settings
				$table->enum('register_new_customer', ['open', 'close'])->default('open');
				$table->enum('register_new_vendor', ['open', 'close'])->default('open');
				$table->enum('register_vendor_status', ['under_review', 'auto'])->default('under_review');
				$table->enum('register_customer_status', ['under_review', 'auto'])->default('under_review');
				$table->integer('expiry_commercial_alarm')->default(0);
				$table->integer('expiry_license_alarm')->default(0);
				$table->enum('commercial_status', ['under_review', 'auto'])->default('under_review');
				$table->enum('license_status', ['under_review', 'auto'])->default('under_review');
				$table->integer('age_limit_vendor')->default(0);
				$table->integer('age_limit_customer')->default(0);

				//payment_methods_settings
				$table->decimal('mada_vat', 8, 2)->default(0);
				$table->enum('mada_status', ['enable', 'disable'])->default('enable');
				$table->enum('paypal_status', ['enable', 'disable'])->default('enable');
				$table->decimal('paypal_vat', 8, 2)->default(0);
				$table->enum('sadad_status', ['enable', 'disable'])->default('enable');
				$table->decimal('sadad_vat', 8, 2)->default(0);
				$table->enum('bank_transfer_status', ['enable', 'disable'])->default('enable');
				$table->decimal('bank_transfer_vat', 8, 2)->default(0);
				//payment_methods_settings
				//orders_settings
				$table->enum('add_order', ['enable', 'disable'])->default('enable');
				$table->enum('offers_order', ['enable', 'disable'])->default('enable');
				$table->decimal('minimum_amount_add_order', 8, 2)->default(0);
				$table->decimal('amount_add_order_vat', 8, 2)->default(0);
				$table->decimal('arbitration_amount_tax', 8, 2)->default(0);
				$table->enum('review_order_status', ['enable', 'disable'])->default('enable');
				$table->enum('review_offers_status', ['enable', 'disable'])->default('enable');
				//reviews_settings
				$table->enum('rate_orders_status', ['enable', 'disable'])->default('enable');
				$table->enum('rate_review_status', ['auto_accept', 'under_review'])->default('under_review');
				$table->integer('number_days_objection')->default(0);
				//contract_formats_settings
				$table->longtext('contract_form')->nullable();
				$table->integer('maximum_arbitrators')->default(0);
				//attached_files_settings
				$table->enum('attachment_orders_status', ['enable', 'disable'])->default('enable');
				$table->enum('attachment_offers_status', ['enable', 'disable'])->default('enable');
				$table->longtext('attachment_orders_exts')->nullable();
				$table->integer('attachment_orders_files_timeout')->nullable();
				$table->longtext('attachment_qualifications_exts')->nullable();
				$table->longtext('attachment_experience_exts')->nullable();
				$table->longtext('attachment_license_exts')->nullable();
				$table->longtext('attachment_commercial_exts')->nullable();
				$table->longtext('attachment_ticket_exts')->nullable();
				$table->longtext('attachment_comment_ticket_exts')->nullable();
				$table->enum('attachment_ticket_status', ['enable', 'disable'])->default('enable');
				$table->enum('attachment_comment_ticket_status', ['enable', 'disable'])->default('enable');
				//Terms and conditions for registering as a customer
				//terms_conditions_settings
				$table->longtext('terms_conditions_registering_customer_ar')->nullable();
				$table->longtext('terms_conditions_registering_customer_en')->nullable();
				$table->longtext('terms_conditions_registering_vendor_ar')->nullable();
				$table->longtext('terms_conditions_registering_vendor_en')->nullable();
				$table->longtext('terms_conditions_add_order_ar')->nullable();
				$table->longtext('terms_conditions_add_order_en')->nullable();
				$table->longtext('terms_conditions_add_offer_ar')->nullable();
				$table->longtext('terms_conditions_add_offer_en')->nullable();
				$table->longtext('terms_conditions_recharge_ar')->nullable();
				$table->longtext('terms_conditions_recharge_en')->nullable();
				$table->longtext('terms_conditions_subscription_fee_ar')->nullable();
				$table->longtext('terms_conditions_subscription_fee_en')->nullable();
				$table->longtext('terms_conditions_withdrawal_ar')->nullable();
				$table->longtext('terms_conditions_withdrawal_en')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('settings');
	}
}
