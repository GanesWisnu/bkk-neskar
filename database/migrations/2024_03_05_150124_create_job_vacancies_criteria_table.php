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
        Schema::create('job_vacancies_criteria', function (Blueprint $table) {
            $table->bigInteger('job_vacancies_criteria_id')->unsigned()->primary();
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedBigInteger('job_vacancies_id');
            $table->foreign('job_vacancies_id')->references('job_vacancies_id')->on("job_vacancies")->onDelete('cascade');
            $table->foreign('criteria_id')->references('criteria_id')->on("criteria")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies_criteria');
    }
};
