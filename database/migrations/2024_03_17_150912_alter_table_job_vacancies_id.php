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
        DB::statement('ALTER TABLE `job_vacancies` ADD `code` VARCHAR NULL;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

            DB::statement('ALTER TABLE `job_vacancies` DROP `code`;');

    }
};
