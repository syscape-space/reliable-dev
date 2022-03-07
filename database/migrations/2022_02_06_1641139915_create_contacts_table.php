<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.36]
// Copyright Reserved  [it v 1.6.36]

class CreateContactsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contacts', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->nullable()->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->string('full_name');
				$table->string('email');
				$table->bigInteger('mobile');
				$table->string('title_msg');
				$table->longtext('message');
				$table->enum('seen', ['yes', 'no']);

				$table->bigInteger('replay_by')->unsigned()->nullable();
				$table->foreign('replay_by')->references('id')->on('admins')->onDelete('cascade');
				$table->longtext('replay_content')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('contacts');
	}
}