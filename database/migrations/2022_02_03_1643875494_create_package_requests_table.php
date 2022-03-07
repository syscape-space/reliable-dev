<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreatePackageRequestsTable extends Migration {
	/**
	 * Run the migrations.
	 * request_status|pending,بالانتظار/approved,موافق عليه/refused,مرفوض/done,تم تنفيذ الطلب/recovered,مسترجع
	 * @return void
	 */
	public function up() {
		Schema::create('package_requests', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("package_id")->constrained("vendor_packages")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->longtext('refused_reason')->nullable();
				$table->enum('request_status', ['pending', 'approved', 'refused', 'done', 'recovered'])->default('pending');
				$table->enum('suspended_balance', ['yes', 'no'])->default('yes');
				$table->longtext('notes')->nullable();
				$table->enum('invoiced', ['yes', 'no'])->default('no');
				$table->string('invoice_id')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('package_requests');
	}
}