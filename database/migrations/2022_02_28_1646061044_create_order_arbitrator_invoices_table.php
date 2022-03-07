<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]

class CreateOrderArbitratorInvoicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_arbitrator_invoices', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("order_id")->constrained("orders")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("arbitrator_id")->constrained("users")->references("id");
				$table->foreignId("order_arbitrator_id")->constrained("order_arbitrators")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("vendor_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");

				$table->enum('amount_deduction_from_vendor', ['awaiting', 'recovered', 'discounted']);
				$table->enum('amount_deduction_from_user', ['awaiting', 'recovered', 'discounted']);
				$table->decimal('vendor_amount', 20, 2)->nullable();
				$table->decimal('user_amount', 20, 2)->nullable();
				$table->decimal('total_amount', 20, 2)->nullable();
				$table->decimal('system_tax', 20, 2)->nullable();
				$table->decimal('remaining_amount_to_arbitrator', 20, 2)->nullable();
				$table->enum('inovice_status', ['open', 'closed']);
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_arbitrator_invoices');
	}
}