<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhadSyslogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhad_syslogs', function (Blueprint $table) {
            $table->id();
            $table->string('method', 100);
            $table->text('resources_url');
            $table->string('response_status');
            $table->string('response_time', 50);
            $table->timestamp('access_date')->useCurrent();
            $table->string('access_by', 100)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mhad_syslogs');
    }
}
