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
        Schema::create('tblreacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('image_react')->nullable();
            $table->text('description_header')->nullable();
            $table->string('title_video_react')->nullable();
            $table->text('video_react')->nullable();
            $table->text('description_video_react')->nullable();
            $table->string('header_react')->nullable();
            $table->text('description_react_one')->nullable();
            $table->text('model_code')->nullable();
            $table->text('description_react_two')->nullable();
            $table->text('controller_code')->nullable();
            $table->text('description_react_tree')->nullable();
            $table->text('view_code')->nullable();
            $table->text('view_code_two')->nullable();
            $table->text('download_file')->nullable();
            $table->text('last_description')->nullable();
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
        Schema::dropIfExists('tblreacts');
    }
};