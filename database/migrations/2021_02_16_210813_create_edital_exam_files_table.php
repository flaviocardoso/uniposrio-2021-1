<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditalExamFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edital_exam_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id');
            $table->integer('collaborator_id');
            $table->json('file_config'); // [{file, lang}]
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
        Schema::dropIfExists('edital_exam_files');
    }
}
