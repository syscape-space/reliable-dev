<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateOrderOfferInvoicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_offer_invoices', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("order_id")->constrained("orders")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("offer_id")->constrained("order_offers")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->decimal('offer_amount', 20, 2)->nullable();
				$table->decimal('system_tax', 20, 2)->nullable();
				$table->decimal('remaining_amount_to_vendor', 20, 2)->nullable();
				$table->enum('amount_deduction_from_user', ['awaiting', 'recovered', 'discounted']);
				$table->enum('added_amount_to_vendor_balance', ['yes', 'no'])->nullable();
				$table->dateTime('added_amount_to_vendor_balance_at')->nullable();
				$table->enum('inovice_status', ['open', 'closed'])->nullable();
				$table->longtext('system_note')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_offer_invoices');
	}
}