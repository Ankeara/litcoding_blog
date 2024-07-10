<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tblnudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('title', 255);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('image_nude', 255);
            $table->text('description_header');
            $table->string('title_video_nude', 255);
            $table->string('video_nude', 255);
            $table->text('description_video_nude');
            $table->string('header_nude', 255);
            $table->text('description_nude_one');
            $table->text('model_code');
            $table->text('description_nude_two');
            $table->text('controller_code');
            $table->text('description_nude_tree');
            $table->text('view_code');
            $table->text('last_description');
            $table->text('keywords')->nullable();
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(1);
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnudes');
    }
};