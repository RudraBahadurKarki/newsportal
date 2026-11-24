<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->longText('content')->change();
        });

        Schema::table('article_category', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('article_category', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->string('category_id')->change();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->string('content')->change();
        });
    }
};
