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
        // \App\Models\User::factory(10)->create();
        // \App\Models\ContactForm::factory(200)->create();
        // \App\Models\Area::factory(3)->create();
        // \App\Models\Shop::factory(3)->create();
        // \App\Models\Habit::factory(3)->create();

        $this->call([
            UserTableSeeder::class,
            ContactFormSeeder::class,
            AreaSeeder::class,
            ShopSeeder::class,
            HabitSeeder::class,
            DailyHabitSeeder::class,
            ]);
    }
}
