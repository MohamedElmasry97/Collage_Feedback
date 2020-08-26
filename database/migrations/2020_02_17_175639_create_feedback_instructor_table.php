<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackInstructorTable extends Migration {

	public function up()
	{
		Schema::create('feedback_instructor', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('instructor_id')->unsigned();
			$table->integer('feedback_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('feedback_instructor');
	}
}
