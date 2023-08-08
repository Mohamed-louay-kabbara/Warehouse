<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration {

	public function up()
	{
		Schema::create('Bill', function(Blueprint $table) {
			$table->id('id');
            $table->date('created_date');
			$table->text('Resource_name');
			$table->double('price');
			$table->integer('count');
		});
	}

	public function down()
	{
		Schema::drop('Bill');
	}
}