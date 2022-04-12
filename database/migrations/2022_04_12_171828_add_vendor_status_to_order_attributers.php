<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVendorStatusToOrderAttributers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_arbitrators', function (Blueprint $table) {
            $table->enum('vendor_status',['pending','accepted','refused'])->default('pending');
            $table->text('vendor_refused_message')->nullable();
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
            $table->dropColumn('vendor_status','vendor_refused_message');
        });
    }
}
