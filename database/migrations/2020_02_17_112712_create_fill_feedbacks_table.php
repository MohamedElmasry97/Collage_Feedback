<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fill_feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('feedback_model_id')->unsigned();
            $table->integer('instructor_id')->unsigned();
            $table->float('mean');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fill_feedbacks');
    }
}
