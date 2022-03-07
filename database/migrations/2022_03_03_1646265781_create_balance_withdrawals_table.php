<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class CreateBalanceWithdrawalsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('balance_withdrawals', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->nullable()->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->decimal('amount', 20, 2);
				$table->enum('receipt_via', ['bank_transfer', 'bank_account', 'system']);
				$table->string('transfer_picture')->nullable();
				$table->longtext('user_notes')->nullable();
				$table->enum('withdrawal_status', ['pending', 'approved', 'refused'])->default('pending');
				$table->longtext('reason')->nullable();
				$table->longtext('system_notes')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('balance_withdrawals');
	}
}