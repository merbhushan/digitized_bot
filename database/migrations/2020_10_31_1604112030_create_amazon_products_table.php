<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmazonProductsTable extends Migration
{
    public function up()
    {
        Schema::create('amazon_products', function (Blueprint $table) {

		$table->string('url',1000)->nullable()->default('NULL');
		$table->string('group')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('amazon_products');
    }
}