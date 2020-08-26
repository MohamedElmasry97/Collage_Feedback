<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('pin_code');
            $table->string('api_token', 60)->unique()->nullable();
            $table->enum('department_name', ['CS', 'IS', 'General']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('students');
    }
}
