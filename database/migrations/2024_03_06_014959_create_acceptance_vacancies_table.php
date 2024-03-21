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
        Schema::create('acceptance_vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('job_vacancies_id')->unsigned()->index();
            $table->string('url');
            $table->foreign('job_vacancies_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptance_vacancies');
    }
};
