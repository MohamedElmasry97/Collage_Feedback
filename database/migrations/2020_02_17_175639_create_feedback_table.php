<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration {

	public function up()
	{
		Schema::create('feedbacks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('degree');
			$table->integer('feedback_model_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('feedbacks');
	}
}
