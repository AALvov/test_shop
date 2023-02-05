<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->command->info('Таблица категорий загружена данными!');
        $this->call(ProductTableSeeder::class);
        $this->command->info('Таблица товаров загружена данными!');
        $this->call(ReviewTableSeeder::class);
        $this->command->info('Таблица Отзывов загружена данными!');

        // \App\Models\User::factory(10)->create();
    }
}
