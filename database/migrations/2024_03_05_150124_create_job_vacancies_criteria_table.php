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
            $table->id();
            $table->integer('criteria_id')->unsigened()->index();
            $table->integer('job_vacancies_id')->unsigened()->index();
            $table->foreign('criteria_id')->references('id')->on("criteria")->onDelete('cascade');
            $table->foreign('job_vacancies_id')->references('id')->on("job_vacancies")->onDelete('cascade');
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
