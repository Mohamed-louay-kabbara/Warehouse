<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration {

	public function up()
	{
		Schema::create('Category', function(Blueprint $table) {
			$table->id('id');
			$table->timestamps();
			$table->string('Name');
		});
	}

	public function down()
	{
		Schema::drop('Category');
	}
}