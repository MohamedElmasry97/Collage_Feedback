<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackFormModelTable extends Migration {

	public function up()
	{
		Schema::create('feedback_form_models', function(Blueprint $table) {
			$table->increments('id');
			$table->text('question');
			$table->float('degree');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('feedback_form_models');
	}
}
