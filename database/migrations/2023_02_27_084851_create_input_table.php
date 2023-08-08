<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputTable extends Migration {

	public function up()
	{
		Schema::create('input', function(Blueprint $table) {
			$table->id('id');
			$table->date('created_date');
			$table->text('Entry_type');
			$table->text('user_name');
            $table->integer('Count');
			$table->bigInteger('matter_id')->unsigned();
			$table->bigInteger('Bill_id')->unsigned();
			$table->foreign('Bill_id')->references('id')->on('Bill')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->bigInteger('Unit_id')->unsigned();
			$table->foreign('Unit_id')->references('id')->on('Unit')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->foreign('matter_id')->references('id')->on('Matter')
			->onDelete('cascade')
			->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('input');
	}
}