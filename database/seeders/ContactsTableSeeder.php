<?php
// ContactsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Using factory to create 10 contacts with meaningful data
        Contact::factory()->count(10)->create();
    }
}

