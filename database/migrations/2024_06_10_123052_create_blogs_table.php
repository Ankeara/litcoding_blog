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
        Schema::create('blogs', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('creator_id'); // creator_id INTEGER
            $table->string('name', 255); // name VARCHAR(255)
            $table->string('image')->nullable(); // image VARCHA)
            $table->text('detail_this_template')->nullable(); // detail_this_template TEXT
            $table->string('header_one')->nullable(); // header_one VARCHA)
            $table->string('image_one')->nullable(); // image_one VARCHA)
            $table->text('description_one')->nullable(); // description_one TEXT
            $table->string('header_two')->nullable(); // header_two VARCHA)
            $table->string('image_two')->nullable(); // image_two VARCHA)
            $table->text('description_two')->nullable(); // description_two TEXT
            $table->string('header_tree')->nullable(); // header_tree VARCHA)
            $table->string('image_tree')->nullable(); // image_tree VARCHA)
            $table->text('description_tree')->nullable(); // description_tree TEXT
            $table->string('header_four')->nullable(); // header_four VARCHA)
            $table->string('image_four')->nullable(); // image_four VARCHA)
            $table->text('description_four')->nullable(); // description_four TEXT
            $table->string('header_five')->nullable(); // header_five VARCHA)
            $table->string('image_five')->nullable(); // image_five VARCHA)
            $table->text('description_five')->nullable(); // description_five TEXT
            $table->string('header_six')->nullable(); // header_six VARCHA)
            $table->string('image_six')->nullable(); // image_six VARCHA)
            $table->text('description_six')->nullable(); // description_six TEXT
            $table->string('header_seven')->nullable(); // header_six VARCHA)
            $table->string('image_seven')->nullable(); // image_seven VARCHA)
            $table->text('description_seven')->nullable(); // description_seven TEXT
            $table->string('header_eight')->nullable(); // header_eight VARCHA)
            $table->string('image_eight')->nullable(); // image_eight VARCHA)
            $table->text('description_eight')->nullable(); // description_eight TEXT
            $table->string('header_nine')->nullable(); // header_nine VARCHA)
            $table->string('image_nine')->nullable(); // image_nine VARCHA)
            $table->text('description_nine')->nullable(); // description_nine TEXT
            $table->string('header_ten')->nullable();
            $table->string('image_ten')->nullable();
            $table->text('description_ten')->nullable();
            $table->string('header_final')->nullable();
            $table->text('description_final')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('status')->default(1);
            $table->integer('isFeatured')->default(1);
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};