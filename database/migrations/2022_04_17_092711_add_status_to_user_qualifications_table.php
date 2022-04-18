<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_qualifications', function (Blueprint $table) {
            $table->enum('status',['pending','refused','accepted'])->default('pending');
            $table->text('refuse_message')->nullable();
        });
        Schema::table('user_experiences', function (Blueprint $table) {
            $table->enum('status',['pending','refused','accepted'])->default('pending');
            $table->text('refuse_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_qualifications', function (Blueprint $table) {
            $table->dropColumn('status','refuse_message');
        });
        Schema::table('user_experiences', function (Blueprint $table) {
            $table->dropColumn('status','refuse_message');
        });
    }
}
