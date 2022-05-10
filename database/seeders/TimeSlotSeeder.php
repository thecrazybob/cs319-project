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

        // Suppose health center works from 09:00 - 17:00
        // Thats 8 hours
        $slotsInDay = 8 * 2; // since each slot is half an hour

        // Appointments are available for the next 7 days excluding today
        $days = 7;

        $nextDay = today()->addDay(1)->setTime(9, 0);

        // Loop for days
        for ($day = 0; $day < $days; $day++) {

            // Loop for timeslots in day
            for ($slot = 0; $slot < $slotsInDay; $slot++) {

                // Create 30 minutes timeslot
                TimeSlot::factory()->create(
                    [
                        'starting_time' => $nextDay,
                        'duration'      => 30,
                    ]
                );

                // Increment time by 30 minutes
                $nextDay = $nextDay->addMinutes(30);
            }

            // Move to next day
            $nextDay->addDay(1)->setTime(9, 0);
        }
    }
}
