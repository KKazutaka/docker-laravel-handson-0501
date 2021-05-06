<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactForm;

class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(ContactForm::class, 200)->create();
        ContactForm::factory()
        ->count(50)
        ->create();
    }
}
