<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departments extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('departments', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('department_name_ar');
				$table->string('department_name_en');
				$table->bigInteger('parent')->unsigned()->nullable();
				$table->foreign('parent')->references('id')->on('departments')->onDelete('cascade');
				$table->string('department_desc_ar')->nullable();
				$table->string('department_desc_en')->nullable();
				$table->enum('enable_post', ['yes', 'no'])->default('no');
				$table->enum('department_status', ['show', 'hide'])->default('hide');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('departments');
	}
}
