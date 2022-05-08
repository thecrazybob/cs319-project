<?php

namespace Database\Seeders;

use App\Models\PatientCondition;
use Illuminate\Database\Seeder;

class PatientConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PatientCondition::factory()->count(5)->create();
    }
}
