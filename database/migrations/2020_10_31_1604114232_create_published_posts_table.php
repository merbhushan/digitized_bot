<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishedPostsTable extends Migration
{
    public function up()
    {
        Schema::create('published_posts', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('product_id')->unsigned()->nullable()->default(NULL);
            $table->float('amazon_price')->nullable()->default(NULL);
            $table->float('percentage_drop')->nullable()->default(NULL);
            $table->datetime('created_at');

        });
    }

    public function down()
    {
        Schema::dropIfExists('published_posts');
    }
}