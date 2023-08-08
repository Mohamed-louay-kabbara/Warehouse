<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitTable extends Migration {

	public function up()
	{
		Schema::create('Unit', function(Blueprint $table) {
			$table->id('id');
			$table->timestamps();
			$table->string('Unit_type');
		});
	}

	public function down()
	{
		Schema::drop('Unit');
	}
}