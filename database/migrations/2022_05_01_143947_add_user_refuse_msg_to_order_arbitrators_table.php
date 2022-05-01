<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRefuseMsgToOrderArbitratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_arbitrators', function (Blueprint $table) {
            $table->text('user_refused_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_arbitrators', function (Blueprint $table) {
            $table->dropColumn('user_refused_message');
        });
    }
}
