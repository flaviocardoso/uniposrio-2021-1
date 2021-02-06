<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collaborator_id');
            $table->integer('period_id');
            $table->date('date_exam');
            $table->time('time_start_exam');
            $table->time('duration_exam');
            $table->integer('num_questions_exam')->nullable();
            $table->time('time_start_download_exam');
            $table->time('time_end_download_exam');
            $table->date('date_solicitation_exam');
            $table->date('date_result_exam');
            $table->date('date_review');
            $table->time('time_review');
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
        Schema::dropIfExists('exam_data');
    }
}
