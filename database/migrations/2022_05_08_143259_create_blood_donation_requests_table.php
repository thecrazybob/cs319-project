<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('blood_donation_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->enum('blood_type', ['AA', 'AO', 'BB', 'BO', 'AB', 'OO']);
            $table->enum('urgency', ['low', 'medium', 'high', 'critical']);
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_donation_requests');
    }
}
