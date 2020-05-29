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
            $table->string('docRegNo', 100)->unique();
            $table->string('fullName', 100)->nullable();
            $table->string('emailAddress', 50)->unique();
            $table->string('password', 100);
            $table->string('occupation', 100)->nullable();
            $table->string('specialty')->nullable();
            $table->string('gender', 50)->index();
            $table->string('phoneNumber', 50)->nullable();
            $table->string('age', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('state', 150)->nullable();
            $table->string('country', 150)->nullable();
            $table->string('zip_code', 50)->nullable();
            $table->timestamp('dateRegistered')->useCurrent();
            $table->char('activationStatus', 4);
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
        Schema::dropIfExists('mhad_specialists');
    }
}
