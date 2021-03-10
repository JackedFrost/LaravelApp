<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Birthday;

class BirthdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Birthday::factory()->count(20)->create();
    }
}
