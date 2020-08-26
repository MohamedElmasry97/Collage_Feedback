<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration {

	public function up()
	{
		Schema::create('course_student', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('course_student');
	}
}
