<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistantCourseTable extends Migration {

	public function up()
	{
		Schema::create('assistant_course', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('course_id')->unsigned();
			$table->integer('assistant_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('assistant_course');
	}
}
