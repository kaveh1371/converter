<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email');
            $table->float('from_currency_amount', 15)->default(1);
            $table->uuid('from_currency_id')->index();
            $table->foreign('from_currency_id')->references('id')->on('currencies');
            $table->uuid('to_currency_id')->index();
            $table->foreign('to_currency_id')->references('id')->on('currencies');
            $table->float('result', 15);
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
        Schema::dropIfExists('orders');
    }
}
