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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('mobile', 255)->nullable();
            $table->text('skill')->nullable();
            $table->string('link_fb', 255)->nullable();
            $table->string('link_tl', 255)->nullable();
            $table->string('link_ig', 255)->nullable();
            $table->string('link_yt', 255)->nullable();
            $table->string('link_x', 255)->nullable();
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};