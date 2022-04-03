<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CreateUserJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_jobs');
        Schema::create('user_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("occupation_id")->constrained("occupations")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("specialtie_id")->constrained("specialties")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->references("id")->onUpdate("cascade")->onDelete("cascade");
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_jobs');
    }
}