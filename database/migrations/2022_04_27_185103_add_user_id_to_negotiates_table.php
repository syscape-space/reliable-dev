<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToNegotiatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('negotiates', function (Blueprint $table) {
            $table->foreignId('vendor_id')->nullable()->constrained('users','id')->cascadeOnDelete();
        });
        \App\Models\Negotiate::query()->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('negotiates', function (Blueprint $table) {
            $table->dropConstrainedForeignId('vendor_id');
        });
    }
}
