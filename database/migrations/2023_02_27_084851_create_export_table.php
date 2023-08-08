<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportTable extends Migration {

	public function up()
	{
		Schema::create('export', function(Blueprint $table) {
			$table->id('id');
			$table->integer('ex_count');
			$table->text('opration_type');
			$table->bigInteger('matter_id')->unsigned();
			$table->foreign('matter_id')->references('id')->on('Matter')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->date('ex_date');
		});
	}

	public function down()
	{
		Schema::drop('export');
	}
}