<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
		Schema::create('users', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->nullable()->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->string('first_name')->nullable();
				$table->string('middle_name')->nullable();
				$table->string('last_name')->nullable();
				$table->string('name')->nullable();
				$table->string('email')->unique()->nullable();
				$table->string('password')->nullable();
				$table->timestamp('email_verified_at')->nullable();
				$table->enum('email_verify', ['pending', 'verified'])->default('pending');
				$table->bigInteger('mobile')->unique()->nullable();
				$table->enum('mobile_verify', ['pending', 'verified'])->default('pending');
				$table->bigInteger('email_verify_code')->nullable();
				$table->bigInteger('mobile_verify_code')->nullable();
				$table->decimal('current_balance', 8, 2)->default(0);
				$table->decimal('suspended_balance', 8, 2)->default(0);
				$table->string('photo_profile')->nullable();
				$table->enum('membership_type', ['user', 'vendor', 'employee'])->nullable();
				$table->enum('account_type', ['individual', 'company'])->nullable();
				$table->bigInteger('id_number')->unique()->nullable();
				$table->enum('id_type', ['national_id', 'iqama', 'passport'])->nullable();
				$table->enum('id_status', ['pending', 'verified', 'refused'])->default('pending');
				$table->bigInteger('unseen_msg')->nullable();
				$table->bigInteger('unseen_notification')->nullable();
				$table->foreignId("country_id")->nullable()->constrained("countries")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("city_id")->nullable()->constrained("cities")->onUpdate("cascade")->onDelete("cascade");
				$table->string('address')->nullable();
				$table->string('lng')->nullable();
				$table->string('lat')->nullable();
				$table->longtext('bio')->nullable();
				$table->date('birth_date')->nullable();
				$table->enum('account_status', ['pending', 'active', 'refused', 'ban'])->default('pending');
				$table->longtext('ban_reason')->nullable();
				$table->longtext('refused_reason')->nullable();
				$table->date('ban_end_at')->nullable();
				$table->longtext('system_comment')->nullable();
				$table->date('subscribe_end_at')->nullable();
				$table->foreignId("company_id")->nullable()->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->enum('add_offer', ['enable', 'disable'])->default('disable');
				$table->longtext('disable_adding_offer_reason')->nullable();
				$table->enum('add_request', ['enable', 'disable'])->nullable();
				$table->longtext('disable_adding_request_reason')->nullable();
				$table->enum('gender', ['male', 'female'])->nullable();

				$table->bigInteger('rate_overall')->nullable();
				$table->string('badge');
				$table->string('badge_condition');
				$table->string('badeg_icon');
				$table->rememberToken();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
