<?php

namespace Database\Seeders;

use App\Models\SupportMessage;
use Illuminate\Database\Seeder;

class SupportMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportMessage::factory()->count(5)->create();
    }
}
