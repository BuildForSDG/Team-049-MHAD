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
            $table->string('pregNo', 100)->index();
            $table->string('docRegNo', 100)->index();
            $table->text('complainTitle');
            $table->longText('complainBody');
            $table->timestamp('complainDate')->useCurrent();
            $table->char('complainStatus', 4);
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
