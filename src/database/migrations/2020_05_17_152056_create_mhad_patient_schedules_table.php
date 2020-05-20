<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadPatientSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_patient_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('pregNo')->index();
            $table->string('docRegNo')->index();
            $table->string('schDate');
            $table->mediumText('schVenue');
            $table->longText('schPurpose');
            $table->longText('docComment');
            $table->string('schStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_patient_schedules');
    }
}
