<?php

namespace Database\Seeders;

use App\Models\BloodDonationRequest;
use Illuminate\Database\Seeder;

class BloodDonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodDonationRequest::factory()->count(5)->create();
    }
}
