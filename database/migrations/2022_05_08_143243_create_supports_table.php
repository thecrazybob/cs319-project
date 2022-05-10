<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->string('subject');
            $table->enum('status', ['new', 'answered', 'awaiting', 'hold', 'closed', 'reopened']);
            $table->enum('priority', ['low', 'medium', 'high', 'critical']);
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
        Schema::dropIfExists('supports');
    }
}
