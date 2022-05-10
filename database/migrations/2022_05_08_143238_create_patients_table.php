<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('bilkent_id');
            $table->date('birth_date');
            $table->enum('gender', ['female', 'male', 'other']);
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->longText('allergies');
            $table->longText('operations');
            $table->longText('other_illness');
            $table->longText('current_medications');
            $table->boolean('smoking')->default(false);
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
        Schema::dropIfExists('patients');
    }
}
