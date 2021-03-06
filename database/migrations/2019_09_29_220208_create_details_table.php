<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('order_id')->index('fk_Details_orders1_idx');
			$table->integer('car_id')->index('fk_Details_cars1_idx');
			$table->integer('employee_id')->index('fk_details_employees1_idx');
			$table->integer('movement_id')->index('fk_details_movements1_idx');
			$table->dateTime('departure_date');
			$table->dateTime('reentry_date')->nullable();
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
		Schema::drop('details');
	}

}
