<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOrderOfferIdInOfferFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_favorites', function (Blueprint $table) {
            $table->dropConstrainedForeignId('order_offer_id');
            $table->morphs('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offer_favorites', function (Blueprint $table) {
            $table->foreignId('order_offer_id')->nullable()->constrained()->cascadeOnDelete();
            $table->dropMorphs('item');
        });
    }
}
