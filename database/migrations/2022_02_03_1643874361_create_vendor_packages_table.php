<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateVendorPackagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('vendor_packages', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->string('package_title');
				$table->longtext('package_content');
				$table->enum('package_status', ['show', 'hide'])->default('show');
				$table->string('number_purchases')->nullable();
				$table->string('duration_package_days');
				$table->date('package_end_at')->nullable();
				$table->decimal('package_price', 8, 2)->default(0);
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('vendor_packages');
	}
}