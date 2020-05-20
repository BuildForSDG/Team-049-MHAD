<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadPhqAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_phq_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('qid')->index();
            $table->text('answer');
            $table->string('scorevalue');
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
        Schema::dropIfExists('mhad_phq_answers');
    }
}
