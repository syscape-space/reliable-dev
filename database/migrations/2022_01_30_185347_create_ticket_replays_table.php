<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketReplaysTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ticket_replays', function (Blueprint $table) {
				$table->id();
				$table->foreignId("ticket_id")->constrained("tickets")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("user_id")->nullable()->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("admin_id")->nullable()->constrained("admins")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->longtext('replay');
				$table->enum('seen_status', ['seen', 'unseen'])->default('unseen');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ticket_replays');
	}
}
