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
        if (!Schema::hasTable('templates')) {
            Schema::create('templates', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('creator_id');
                $table->unsignedBigInteger('id_htmlcss')->nullable();
                $table->unsignedBigInteger('id_js')->nullable();
                $table->unsignedBigInteger('id_react')->nullable();
                $table->unsignedBigInteger('id_php')->nullable();
                $table->unsignedBigInteger('id_laravel')->nullable();
                $table->unsignedBigInteger('id_csharp')->nullable();
                $table->unsignedBigInteger('id_mysql')->nullable();
                $table->unsignedBigInteger('id_java')->nullable();
                $table->unsignedBigInteger('id_oracle')->nullable();
                $table->unsignedBigInteger('id_sqlserver')->nullable();
                $table->unsignedBigInteger('id_nude')->nullable();
                $table->text('description_last')->nullable();
                $table->integer('status')->default(1);
                $table->integer('isFeatured')->default(1);
                $table->timestamps();

                $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('id_htmlcss')->references('id')->on('htmlcss')->onDelete('cascade');
                $table->foreign('id_js')->references('id')->on('javascript')->onDelete('cascade');
                $table->foreign('id_react')->references('id')->on('react')->onDelete('cascade');
                $table->foreign('id_php')->references('id')->on('php')->onDelete('cascade');
                $table->foreign('id_laravel')->references('id')->on('laravel')->onDelete('cascade');
                $table->foreign('id_csharp')->references('id')->on('csharp')->onDelete('cascade');
                $table->foreign('id_mysql')->references('id')->on('mysql')->onDelete('cascade');
                $table->foreign('id_oracle')->references('id')->on('oracle')->onDelete('cascade');
                $table->foreign('id_sqlserver')->references('id')->on('sqlserver')->onDelete('cascade');
                $table->foreign('id_nude')->references('id')->on('nudejs')->onDelete('cascade');
                $table->foreign('id_java')->references('id')->on('java')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
