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
        Schema::create('applicants_vacancies', function (Blueprint $table) {
            $table->bigInteger('applicants_vacancies_id')->unsigned()->primary();
            $table->text('data');
            $table->unsignedBigInteger('job_vacancies_id');
            $table->foreign('job_vacancies_id')->references('job_vacancies_id')->on('job_vacancies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants_vacancies');
    }
};
