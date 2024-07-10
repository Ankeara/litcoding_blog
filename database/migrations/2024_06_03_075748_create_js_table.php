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
        Schema::create('js', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->constrained('users');
            $table->string('title');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->string('image_js')->nullable();
            $table->string('description_header')->nullable();
            $table->string('title_video_js')->nullable();
            $table->string('video_js')->nullable();
            $table->text('description_video_js')->nullable();
            $table->string('header_js')->nullable();
            $table->text('description_js_one')->nullable();
            $table->text('html_code')->nullable();
            $table->text('description_css')->nullable();
            $table->text('css_code')->nullable();
            $table->text('description_js')->nullable();
            $table->text('js_code')->nullable();
            $table->text('last_description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('js');
    }
};