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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->string('image')->nullable();
            // nullable : boleh kosong
            $table->text('content');
            // atribut di bawah digunakan untuk merecord kapan blog nya dipublish. Dan field nya boleh kosong (nullable()). Merupakan tipe data
            $table->timestamp('published_at')->nullable();

            // atribut di bawah untuk merecord kapan blog dibuat dan diupdate. Contohnya mungkin saja masih dalam bentuk draft. Merupakan method
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
