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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->foreignId("author_id")->nullable()->constrained()->nullOnDelete();
            $table->string("content");
            $table->string("image");
            $table->string("meta_description");
            $table->string("meta_title");
            $table->timestamps();
        });

         Schema::create('article_category', function (Blueprint $table) {
            $table->id();
            $table->string("category_id")->constrained()->cascadeOnDelete();
            $table->foreignId("article_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('articles');
    }
};
