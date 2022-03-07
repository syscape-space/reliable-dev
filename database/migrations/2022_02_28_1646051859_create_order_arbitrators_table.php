<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class CreateOrderArbitratorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_arbitrators', function (Blueprint $table) {
				$table->id();
				$table->foreignId("order_id")->constrained("orders")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("arbitrator_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->enum('notify_arbitrator', ['yes', 'no'])->default('no');
				$table->decimal('arbitrator_amount', 20, 2)->nullable();
				$table->enum('arbitrator_add_amount', ['yes', 'no'])->default('no');
				$table->enum('user_accept_amount', ['pending', 'accept', 'reject'])->nullable();
				$table->enum('vendor_accept_amount', ['pending', 'accept', 'reject'])->nullable();
				$table->longtext('arbitrator_decision')->nullable();
				// Order Owner
				$table->enum('user_accept_decision', ['pending', 'accept', 'reject'])->nullable();
				$table->enum('vendor_accept_decision', ['pending', 'accept', 'reject'])->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_arbitrators');
	}
}