<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfoCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info_collaborators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collaborator_id');
            $table->string('nacionalidade');
            $table->string('cpf');
            $table->string('passaporte');
            $table->json('instituion');
            $table->string('departament');
            $table->string('bond');
            $table->string('phone');
            $table->timestamps();

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
        Schema::dropIfExists('personal_info_collaborators');
    }
}
