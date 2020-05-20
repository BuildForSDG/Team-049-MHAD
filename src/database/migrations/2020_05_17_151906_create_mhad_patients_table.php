<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_patients', function (Blueprint $table) {
            $table->id();
            $table->string('pregNo')->unique();
            $table->string('fullName');
            $table->string('emailAddress')->unique();
            $table->string('phoneNumber');
            $table->string('age');
            $table->string('gender');
            $table->string('username');
            $table->string('password');
            $table->timestamp('dateRegistered_at')->useCurrent();
            $table->string('treatmentStatus');
            $table->string('assignedDoctorID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_patients');
    }
}
