<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_specialists', function (Blueprint $table) {
            $table->id();
            $table->string('docRegNo')->unique();
            $table->string('fullName');
            $table->string('emailAddress')->unique();
            $table->string('password');
            $table->string('occupation');
            $table->string('specialty');
            $table->string('gender')->index();
            $table->string('phoneNumber');
            $table->string('age');
            $table->timestamp('dateRegistered')->useCurrent();
            $table->string('activationStatus');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_specialists');
    }
}
