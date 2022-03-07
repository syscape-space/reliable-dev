<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderArbitratorDecisionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_arbitrator_decisions', function (Blueprint $table) {
				$table->id();
				$table->foreignId("order_id")->constrained("orders")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->longtext('decision');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_arbitrator_decisions');
	}
}
