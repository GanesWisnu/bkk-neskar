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
        Schema::create('article', function (Blueprint $table) {
            $table->mediumInteger('article_id')->primary();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('content');
            $table->mediumInteger('user_id')->index();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete("cascade");
            $table->boolean('published')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
