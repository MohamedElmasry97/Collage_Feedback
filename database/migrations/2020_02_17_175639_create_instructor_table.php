<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration {

	public function up()
	{
		Schema::create('instructors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('pin_code');
			$table->string('password');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('instructors');
	}
}
