<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('details', function(Blueprint $table)
		{
			$table->foreign('car_id', 'fk_Details_cars1')->references('id')->on('cars')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('order_id', 'fk_Details_orders1')->references('id')->on('orders')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('employee_id', 'fk_details_employees1')->references('id')->on('employees')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('movement_id', 'fk_details_movements1')->references('id')->on('movements')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('details', function(Blueprint $table)
		{
			$table->dropForeign('fk_Details_cars1');
			$table->dropForeign('fk_Details_orders1');
			$table->dropForeign('fk_details_employees1');
			$table->dropForeign('fk_details_movements1');
		});
	}

}
