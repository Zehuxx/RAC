<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('car_type_id')->index('fk_goals_car_types1_idx');
			$table->integer('seller_id')->index('fk_goals_sellers1_idx');
			$table->float('sales_goal', 10, 0);
			$table->float('commission', 10, 0);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goals');
	}

}
