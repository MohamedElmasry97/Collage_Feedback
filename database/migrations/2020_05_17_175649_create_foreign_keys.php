<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('collage_id')->references('id')->on('collages')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });


        Schema::table('course_instructor', function (Blueprint $table) {
            $table->foreign('instructor_id')->references('id')->on('instructors')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('course_instructor', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('course_student', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('course_student', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('feedback_student', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('feedback_student', function (Blueprint $table) {
            $table->foreign('feedback_id')->references('id')->on('feedbacks')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('feedback_instructor', function (Blueprint $table) {
            $table->foreign('instructor_id')->references('id')->on('instructors')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('feedback_instructor', function (Blueprint $table) {
            $table->foreign('feedback_id')->references('id')->on('feedbacks')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('statistics', function (Blueprint $table) {
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('statistics', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign('feedback_model_id')->references('id')->on('feedback_models')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->foreign('feedback_model_id')->references('id')->on('feedback_models')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign('departments_collage_id_foreign');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_department_id_foreign');
        });
        Schema::table('course_instructor', function (Blueprint $table) {
            $table->dropForeign('course_instructor_instructor_id_foreign');
        });
        Schema::table('course_instructor', function (Blueprint $table) {
            $table->dropForeign('course_instructor_course_id_foreign');
        });
        Schema::table('course_student', function (Blueprint $table) {
            $table->dropForeign('course_student_course_id_foreign');
        });
        Schema::table('course_student', function (Blueprint $table) {
            $table->dropForeign('course_student_student_id_foreign');
        });
        Schema::table('feedback_student', function (Blueprint $table) {
            $table->dropForeign('feedback_student_student_id_foreign');
        });
        Schema::table('feedback_student', function (Blueprint $table) {
            $table->dropForeign('feedback_student_feedback_id_foreign');
        });
        Schema::table('feedback_instructor', function (Blueprint $table) {
            $table->dropForeign('feedback_instructor_instructor_id_foreign');
        });
        Schema::table('feedback_instructor', function (Blueprint $table) {
            $table->dropForeign('feedback_instructor_feedback_id_foreign');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->dropForeign('fill_feedbacks_course_id_foreign');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->dropForeign('fill_feedbacks_student_id_foreign');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->dropForeign('fill_feedbacks_instructor_id_foreign');
        });
        Schema::table('fill_feedbacks', function (Blueprint $table) {
            $table->dropForeign('fill_feedbacks_feedback_model_id_foreign');
        });
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropForeign('statistics_instructor_id_foreign');
        });
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropForeign('statistics_course_id_foreign');
        });
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropForeign('feedbacks_feedback_model_id_foreign');
        });
    }
}
