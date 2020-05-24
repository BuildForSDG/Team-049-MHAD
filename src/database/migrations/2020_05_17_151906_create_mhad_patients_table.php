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
            $table->string('pregNo', 100)->unique();
            $table->string('fullName');
            $table->string('emailAddress')->unique();
            $table->string('phoneNumber', 50);
            $table->string('age', 50);
            $table->string('gender', 50);
            $table->string('username', 100);
            $table->string('password');
            $table->char('require_treatment', 4);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('dateRegistered_at')->useCurrent();
            $table->char('treatmentStatus', 4);
            $table->unsignedInteger('assignedDoctorID');
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
