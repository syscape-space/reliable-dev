<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class CreateBalanceRechargesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('balance_recharges', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->nullable()->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->decimal('amount', 20, 2)->nullable();
				$table->enum('charge_by', ['mada', 'sadad', 'bank_transfer', 'system']);
				$table->string('transfer_name')->nullable();
				$table->string('operation_number')->nullable();
				$table->string('bank_name')->nullable();
				$table->string('transfer_image')->nullable();
				$table->longtext('user_note')->nullable();
				$table->enum('charge_status', ['pending', 'done', 'rejected'])->default('pending');
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
		Schema::dropIfExists('balance_recharges');
	}
}