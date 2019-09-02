<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_goals', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('employee_id')->index('fk_sale_goals_employees1_idx');
			$table->integer('car_type_id')->index('fk_sale_goals_car_types1_idx');
			$table->float('commission', 10, 0);
			$table->float('sale_goal', 10, 0);
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
		Schema::drop('sale_goals');
	}

}
