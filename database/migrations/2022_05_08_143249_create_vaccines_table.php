<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('file_id')->constrained();
            $table->enum('vaccine_type', ['covid', 'other']);
            $table->date('vaccine_date');
            $table->unsignedInteger('dose_no');
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
        Schema::dropIfExists('vaccines');
    }
}
