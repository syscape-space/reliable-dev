<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateCountriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('countries', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
				$table->string('country_name_ar');
				$table->string('country_name_en');
				$table->string('country_key');
				$table->string('country_iso');
				$table->string('country_flag')->nullable();
				$table->enum('country_status', ['show', 'hide']);
				$table->string('country_currency');
				$table->string('country_symbol');
				$table->string('country_currency_exchange');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('countries');
	}
}