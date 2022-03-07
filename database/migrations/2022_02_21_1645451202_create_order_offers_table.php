<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateOrderOffersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_offers', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("order_id")->constrained("orders")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("vendor_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->longtext('vendor_comment')->nullable();
				$table->decimal('price', 20, 2)->nullable();
				$table->string('execution_time')->nullable();
				$table->enum('offer_status', ['pending', 'approved', 'refused'])->nullable();
				$table->enum('requester_rate', ['1', '2', '3', '4', '5'])->nullable();
				$table->longtext('requester_feedback')->nullable();
				$table->enum('feedback_requester_status_by_admin', ['pending', 'approved', 'refused'])->nullable();
				$table->enum('user_offer_objected_status', ['yes', 'no', 'ended'])->nullable();
				$table->date('user_offer_objected_endat')->nullable();
				$table->enum('user_offer_rate', ['1', '2', '3', '4', '5'])->nullable();
				$table->longtext('user_offer_comment')->nullable();
				$table->enum('feedback_user_offer_status_by_admin', ['pending', 'approved', 'refused'])->nullable();
				$table->enum('requester_objected_status', ['yes', 'no', 'ended'])->nullable();
				$table->date('requester_objected_endat')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_offers');
	}
}