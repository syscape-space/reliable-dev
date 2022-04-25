<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserJoIdFromUserQualificationsTable extends Migration
{

    public function up()
    {
        Schema::table('user_qualifications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_job_id');
            $table->dropConstrainedForeignId('occupation_id');
        });
        Schema::table('user_experiences', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_job_id');
            $table->dropConstrainedForeignId('occupation_id');
        });
    }

    public function down()
    {
        Schema::table('user_qualifications', function (Blueprint $table) {
            $table->foreignId('user_job_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('occupation_id')->nullable()->constrained()->nullOnDelete();
        });
        Schema::table('user_experiences', function (Blueprint $table) {
            $table->foreignId('user_job_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('occupation_id')->nullable()->constrained()->nullOnDelete();
        });
    }
}
