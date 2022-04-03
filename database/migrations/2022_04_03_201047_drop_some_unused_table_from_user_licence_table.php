<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSomeUnusedTableFromUserLicenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_commercials', function (Blueprint $table) {
            $table->dropConstrainedForeignId('occupation_id');
            $table->dropConstrainedForeignId('specialtie_id');
            $table->dropConstrainedForeignId('user_job_id');
            $table->integer('status')->default(0);
        });
        Schema::table('user_licenses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('occupation_id');
            $table->dropConstrainedForeignId('specialtie_id');
            $table->dropConstrainedForeignId('user_job_id');
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_commercials', function (Blueprint $table) {
            $table->foreignId('occupation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('specialtie_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_job_id')->nullable()->constrained()->nullOnDelete();
            $table->dropColumn('status');
        });
        Schema::table('user_licenses', function (Blueprint $table) {
            $table->foreignId('occupation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('specialtie_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_job_id')->nullable()->constrained()->nullOnDelete();
            $table->dropColumn('status');
        });
    }
}
