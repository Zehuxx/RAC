<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('goals', function(Blueprint $table)
		{
			$table->foreign('car_type_id', 'fk_goals_car_types1')->references('id')->on('car_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('seller_id', 'fk_goals_sellers1')->references('id')->on('sellers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('goals', function(Blueprint $table)
		{
			$table->dropForeign('fk_goals_car_types1');
			$table->dropForeign('fk_goals_sellers1');
		});
	}

}
