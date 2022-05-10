<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'       => Patient::all()->random()->id,
            'doctor_id'        => Doctor::all()->random()->id,
            'department_id'    => Department::all()->random()->id,
            'timeslot_id'      => TimeSlot::all()->random()->id,
            'appointment_date' => $this->faker->dateTimeThisYear(),
            'description'      => $this->faker->text,
            'confirmed'        => $this->faker->boolean,
        ];
    }
}
