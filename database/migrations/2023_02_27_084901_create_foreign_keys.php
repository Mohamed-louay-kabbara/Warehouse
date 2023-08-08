<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
	}

	public function down()
	{
		Schema::table('Matter', function(Blueprint $table) {
			$table->dropForeign('Matter_CategoryId_foreign');
		});
		Schema::table('input', function(Blueprint $table) {
			$table->dropForeign('input_matter_id_foreign');
		});
		Schema::table('input', function(Blueprint $table) {
			$table->dropForeign('input_Bill_id_foreign');
		});
		Schema::table('input', function(Blueprint $table) {
			$table->dropForeign('input_Unit_id_foreign');
		});
		Schema::table('Entry_dates', function(Blueprint $table) {
			$table->dropForeign('Entry_dates_input_id_foreign');
		});
		Schema::table('export', function(Blueprint $table) {
			$table->dropForeign('export_matter_id_foreign');
		});
	}
}