<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            // Initially static data
            DepartmentSeeder::class,
            PatientConditionSeeder::class,
            WorkingDaySeeder::class,

            // Actors
            // UserSeeder::class,
            PatientSeeder::class,
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            TimeSlotSeeder::class,

            // Modules
            AnnouncementSeeder::class,
            AppointmentSeeder::class,
            BloodDonationRequestSeeder::class,
            DiagnosisSeeder::class,
            DocumentSeeder::class,
            ReportSeeder::class,
            TestSeeder::class,
            VaccineSeeder::class,
            VisitSeeder::class,

            // Support
            SupportSeeder::class,
            SupportMessageSeeder::class,

            // Payments
            PaymentGatewaySeeder::class,
            InvoiceSeeder::class,
            TransactionSeeder::class,

            // Roles
            RolesAndPermissionsSeeder::class,

        ]);
    }
}
