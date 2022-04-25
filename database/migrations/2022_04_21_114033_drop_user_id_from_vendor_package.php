<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserIdFromVendorPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor_packages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn('package_content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor_packages', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable();
            $table->text('package_content')->nullable();
        });
    }
}
