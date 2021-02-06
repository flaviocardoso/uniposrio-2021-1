<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collaborator_id');
            $table->integer('period_id');
            $table->date('start');
            $table->date('end');
            $table->timestamps();

            $table->foreign('period_id')
                ->references('id')
                ->on('period_data');

            $table->foreign('collaborator_id')
                ->references('id')
                ->on('collaborators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_data');
    }
}
