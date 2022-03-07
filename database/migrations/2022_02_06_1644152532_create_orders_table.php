<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->nullable()->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("main_order_id")->nullable()->constrained("orders")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->enum('show_order_data', ['yes', 'no'])->default('no');
				$table->enum('linked_order', ['yes', 'no'])->default('no');
				$table->foreignId("order_type_id")->constrained("order_types")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->string('order_title');
				$table->longtext('order_content');
				$table->foreignId("department_id")->constrained("departments")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->enum('choose_service_provider', ['all', 'by_city', 'by_filter', 'by_occupation']);
				$table->foreignId("country_id")->nullable()->constrained("countries")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("city_id")->nullable()->constrained("cities")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->bigInteger('execution_time')->nullable();
				$table->decimal('amount', 20, 2)->nullable();
				$table->enum('refunded', ['yes', 'no'])->nullable();
				$table->enum('receive_offers', ['yes', 'no'])->default('yes');
				$table->enum('assigning_arbitration', ['yes', 'no'])->nullable();
				$table->enum('decisions_status', ['pending', 'accept', 'refused'])->nullable();
				$table->enum('negotiable', ['yes', 'no'])->default('no');
				$table->longtext('decisions_refused_reason')->nullable();
				$table->enum('order_status', ['under_review', 'open', 'closed', 'close_and_refund', 'refused'])->default('under_review');
				$table->longtext('reason')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orders');
	}
}