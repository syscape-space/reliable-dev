<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeOrderNullableOnOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId("order_type_id")->nullable()->change();
            $table->string('order_title')->nullable()->change();
            $table->longtext('order_content')->nullable()->change();
            $table->foreignId("department_id")->nullable()->change();
            $table->foreignId("country_id")->nullable()->change();
            $table->foreignId("city_id")->nullable()->change();
            $table->bigInteger('execution_time')->nullable()->change();
            $table->decimal('amount', 20, 2)->nullable()->change();
            $table->longtext('decisions_refused_reason')->nullable()->change();
            $table->longtext('reason')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
