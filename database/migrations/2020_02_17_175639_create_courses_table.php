<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
            $table->string('symbolic');
			$table->enum('type', ['practical', 'theoretical', 'hybrid']);
			$table->integer('department_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}
