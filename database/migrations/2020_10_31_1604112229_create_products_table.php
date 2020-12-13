<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

			$table->id();
			$table->string('name')->nullable()->default(NULL);
			$table->string('amazon_url',1000)->nullable()->default(NULL);
			$table->string('amazon_converted_url',1000)->nullable()->default(NULL);
			$table->enum('status',['Active','Inactive','Error'])->nullable()->default('Active');
			$table->float('mrp')->nullable()->default(NULL);
			$table->float('amazon_price')->nullable()->default(NULL);
			$table->float('discount')->nullable()->default(NULL);
			$table->float('percentage_drop')->nullable()->default(NULL);
			$table->integer('amazon_rating_count')->unsigned()->nullable();
			$table->float('amazon_ranting')->nullable()->default(NULL);
			$table->text('amazon_groups')->nullable();
			$table->bigInteger('created_by')->nullable()->default(NULL);
			$table->datetime('created_at')->nullable();
			$table->datetime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}