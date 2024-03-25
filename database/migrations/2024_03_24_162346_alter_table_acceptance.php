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
        //
        DB::statement('ALTER TABLE `acceptance_vacancies` DROP `url`;');
        DB::statement('ALTER TABLE `acceptance_vacancies` ADD `url` TEXT NULL;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `acceptance_vacancies` DROP `url`;');
        DB::statement('ALTER TABLE `acceptance_vacancies` ADD `url` VARCHAR');
        //
    }
};
