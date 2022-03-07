<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateTicketsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tickets', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('ticket_title');
				$table->enum('ticket_linked', ['order', 'offer', 'charge', 'received_money', 'account', 'other']);
				$table->string('link_id')->nullable();
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("ticket_department_id")->constrained("ticket_departments")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->longtext('ticket_content');
				$table->enum('ticket_status', ['opened', 'closed']);
				$table->enum('user_ticket_rate', ['1', '2', '3', '4', '5'])->nullable();
				$table->longtext('user_ticket_comment')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tickets');
	}
}