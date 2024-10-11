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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->mediumInteger('job_vacancies_id')->primary();
            $table->string('position');
            $table->string('location')->nullbale();
            $table->text('description')->nullable();
            $table->string('additional_information')->nullable();
            $table->datetime('deadline');
            $table->mediumInteger('company_id')->index();
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
