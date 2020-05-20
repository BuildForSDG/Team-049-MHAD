<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadPatientComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_patient_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('pregNo')->index();
            $table->string('docRegNo')->index();
            $table->text('complainTitle');
            $table->longText('complainBody');
            $table->timestamp('complainDate')->useCurrent();
            $table->string('complainStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_patient_complaints');
    }
}
