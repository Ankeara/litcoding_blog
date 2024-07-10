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
        Schema::create('admintemplates', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('image_admintm')->nullable();
            $table->text('description_header')->nullable();
            $table->string('title_video_admintm')->nullable();
            $table->text('video_admintm')->nullable();
            $table->text('description_video_admintm')->nullable();
            $table->string('header_admintm')->nullable();
            $table->text('description_admintm_one')->nullable();
            $table->text('code_one')->nullable();
            $table->text('description_admintm_two')->nullable();
            $table->text('code_two')->nullable();
            $table->text('description_admintm_tree')->nullable();
            $table->text('code_tree')->nullable();
            $table->text('description_admintm_four')->nullable();
            $table->text('code_four')->nullable();
            $table->text('description_admintm_five')->nullable();
            $table->text('code_five')->nullable();
            $table->text('last_description')->nullable();
            $table->text('github_link')->nullable();
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
        Schema::dropIfExists('admintemplates');
    }
};