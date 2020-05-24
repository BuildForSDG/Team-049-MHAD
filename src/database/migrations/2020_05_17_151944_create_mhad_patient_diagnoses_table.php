<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadPatientDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_patient_diagnoses', function (Blueprint $table) {
            $table->id();
            $table->string('pregNo', 100)->index();
            $table->string('phqResult');
            $table->string('diagnosisLevel', 100);
            $table->text('diagnoseSuggest');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('dateDaignosed')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_patient_diagnoses');
    }
}
