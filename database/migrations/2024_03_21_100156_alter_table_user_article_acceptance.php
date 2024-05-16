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
        DB::statement('DROP INDEX users_email_unique on users;');
        DB::statement('ALTER TABLE `users` DROP email;');
        DB::statement('ALTER TABLE `users` ADD `username` VARCHAR(255);');

        DB::statement('ALTER TABLE `article` ADD `image_cover` TEXT NULL;');

        DB::statement('ALTER TABLE `acceptance_vacancies` ADD `name` VARCHAR(255);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::statement('ALTER TABLE `users` DROP `username`;');
        DB::statement('ALTER TABLE `users` ADD `email` VARCHAR(255) ;');
        DB::statement('CREATE UNIQUE INDEX ux_friend_name ON users(email);');

        DB::statement('ALTER TABLE `article` DROP `image_cover`;');

        DB::statement('ALTER TABLE `acceptance_vacancies` DROP `name`;');
    }
};
