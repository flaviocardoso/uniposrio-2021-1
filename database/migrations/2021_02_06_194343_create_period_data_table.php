<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collaborator_id');
            $table->string('semetre', 10);
            $table->year('ano');
            $table->string('registro');
            $table->boolean('active');
            $table->timestamps();
            $table->unique(['semetre', 'ano']);

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
        Schema::dropIfExists('period_data');
    }
}
