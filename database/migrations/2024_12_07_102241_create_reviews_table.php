<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->unsignedBigInteger('product_id'); // Foreign key for product
            $table->integer('rating')->unsigned(); // Rating (1-5)
            $table->text('review'); // Review text
            $table->timestamps(); // created_at and updated_at

            // Foreign keys and cascading on delete
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
