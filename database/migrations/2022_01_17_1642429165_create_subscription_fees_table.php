<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateSubscriptionFeesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('subscription_fees', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->bigInteger('amount');
				$table->enum('payment_method', ['electronic_payment', 'bank_transfer']);
				$table->enum("payment_status", ['pending', 'approved', 'refused'])->default('pending');
				$table->longtext('refused_reason')->nullable();
				$table->string('electronic_payment_ref')->nullable();
				$table->longtext('user_note')->nullable();
				$table->longtext('comment')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('subscription_fees');
	}
}