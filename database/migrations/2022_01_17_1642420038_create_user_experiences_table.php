<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class CreateUserExperiencesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_experiences', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('experience_name');
				$table->string('experience_file');
				$table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->longtext('comment')->nullable();
				$table->foreignId("user_job_id")->constrained("user_jobs")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("occupation_id")->constrained("occupations")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->foreignId("specialtie_id")->constrained("specialties")->references("id")->onUpdate("cascade")->onDelete("cascade");
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('user_experiences');
	}
}