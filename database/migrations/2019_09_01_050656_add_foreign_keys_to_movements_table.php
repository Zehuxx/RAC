<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMovementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('movements', function(Blueprint $table)
		{
			$table->foreign('detail_id', 'fk_movements_Details1')->references('id')->on('details')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('movements', function(Blueprint $table)
		{
			$table->dropForeign('fk_movements_Details1');
		});
	}

}
