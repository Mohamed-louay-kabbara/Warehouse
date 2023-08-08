<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterTable extends Migration {

	public function up()
	{
		Schema::create('Matter', function(Blueprint $table) {
			$table->id('id');
			$table->integer('number');
			$table->timestamps();
			$table->string('Nmae');
			$table->bigInteger('Count');
			$table->text('Notes');
			$table->bigInteger('CategoryId')->unsigned();
			$table->foreign('CategoryId')->references('id')->on('Category')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('Matter');
	}
}
