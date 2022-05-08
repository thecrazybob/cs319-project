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
        $conditions = [
            ['name' => 'Anemia'],
            ['name' => 'Asthma'],
            ['name' => 'Arthritis'],
            ['name' => 'Cancer'],
            ['name' => 'Gout'],
            ['name' => 'Diabetes'],
            ['name' => 'Emotional Disorder'],
            ['name' => 'Epilepsy Seizures'],
            ['name' => 'Fainting Spells'],
            ['name' => 'Gallstones'],
            ['name' => 'Heart Disease'],
            ['name' => 'Heart Attack'],
            ['name' => 'Rheumatic Fever'],
            ['name' => 'High Blood Pressure'],
            ['name' => 'Digestive Problems'],
            ['name' => 'Ulcerative Colitis'],
            ['name' => 'Ulcer Disease'],
            ['name' => 'Hepatitis'],
            ['name' => 'Kidney Disease'],
            ['name' => 'Liver Disease'],
            ['name' => 'Sleep Apnea'],
            ['name' => 'Thyroid Problems'],
            ['name' => 'Tuberculosis'],
            ['name' => 'Venereal Disease'],
            ['name' => 'Neurological Disorders'],
            ['name' => 'Bleeding Disorders'],
            ['name' => 'Lung Disease'],
            ['name' => 'Emphysema'],
        ];

        collect($conditions)->each(fn ($condition) => PatientCondition::factory()->create($condition));
    }
}
