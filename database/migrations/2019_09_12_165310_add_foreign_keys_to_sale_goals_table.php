<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSaleGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sale_goals', function(Blueprint $table)
		{
			$table->foreign('car_type_id', 'fk_sale_goals_car_types1')->references('id')->on('car_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('employee_id', 'fk_sale_goals_employees1')->references('id')->on('employees')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('group_id', 'fk_sale_goals_groups1')->references('id')->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sale_goals', function(Blueprint $table)
		{
			$table->dropForeign('fk_sale_goals_car_types1');
			$table->dropForeign('fk_sale_goals_employees1');
			$table->dropForeign('fk_sale_goals_groups1');
		});
	}

}
