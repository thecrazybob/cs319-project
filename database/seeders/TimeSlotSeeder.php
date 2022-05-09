<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = 7;
        $slotsInDay = 24 * 2; // since each slot is half an hour
        $totalSlots = $days * $slotsInDay;

        $timeNow = now()->minute(60)->second(0);

        for ($i = 0; $i < $totalSlots; $i++) {
            $timeNow = $timeNow->addMinutes(30);

            TimeSlot::factory()->create(
                [
                    'starting_time' => $timeNow,
                    'duration' => 30,
                ]
            );
        }
    }
}
