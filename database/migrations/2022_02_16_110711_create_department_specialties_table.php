<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentSpecialtiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('department_specialties', function (Blueprint $table) {
				$table->id();
				$table->foreignId("occupation_id")->constrained("occupations")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("specialtie_id")->constrained("specialties")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("department_id")->constrained("departments")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('department_specialties');
	}
}
