<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contract_template_id')->nullable()->constrained()->nullOnDelete();
            $table->longText('content');
            $table->string('lang');
            $table->string('date_type');
            $table->integer('days')->nullable();
            $table->double('amount')->nullable();
            $table->text('terms')->nullable();
            $table->text('financial_allowances')->nullable();
            $table->date('vendor_accepted_at')->nullable();
            $table->date('user_accepted_at')->nullable();
            $table->date('judger_accepted_at')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
