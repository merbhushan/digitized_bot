<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonPriceHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('amazon_price_history', function (Blueprint $table) {
		    $table->integer('product_id')->unsigned()->nullable();
		    $table->float('price')->nullable();
		    $table->datetime('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('amazon_price_history');
    }
}