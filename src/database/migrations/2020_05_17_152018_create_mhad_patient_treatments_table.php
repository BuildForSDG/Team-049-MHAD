<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadPatientTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_patient_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('pregNo', 100)->index();
            $table->mediumText('targetSymptom');
            $table->longText('prescDesc');
            $table->timestamp('dateTreated')->useCurrent();
            $table->longText('comment');
            $table->longText('patientFeedback');
            $table->char('status', 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_patient_treatments');
    }
}
