<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visit::factory()->count(5)->create();
    }
}
