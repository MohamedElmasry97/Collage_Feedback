<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollageTable extends Migration {

	public function up()
	{
		Schema::create('collages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('collage_name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('collages');
	}
}
