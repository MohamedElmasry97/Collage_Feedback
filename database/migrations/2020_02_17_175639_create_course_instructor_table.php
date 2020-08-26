<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseInstructorTable extends Migration {

	public function up()
	{
		Schema::create('course_instructor', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('instructor_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('course_instructor');
	}
}
