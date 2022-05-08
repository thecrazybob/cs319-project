<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Medicine'],
            ['name' => 'Surgery'],
            ['name' => 'Gynaecology'],
            ['name' => 'Obstetrics'],
            ['name' => 'Paediatrics'],
            ['name' => 'Eye'],
            ['name' => 'ENT'],
            ['name' => 'Dental'],
            ['name' => 'Orthopaedics'],
            ['name' => 'Neurology'],
            ['name' => 'Cardiology'],
            ['name' => 'Psychiatry'],
            ['name' => 'Skin'],
            ['name' => 'V.D.'],
            ['name' => 'Plastic surgery'],
            ['name' => 'Infectious disease'],
        ];

        collect($departments)->each(fn ($department) => Department::create($department));
    }
}
