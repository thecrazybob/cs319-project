<?php

namespace Database\Seeders;

use App\Models\WorkingDay;
use Illuminate\Database\Seeder;

class WorkingDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkingDay::factory()->count(5)->create();
    }
}
