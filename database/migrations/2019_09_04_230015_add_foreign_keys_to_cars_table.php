<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cars', function(Blueprint $table)
		{
			$table->foreign('car_brand_id', 'fk_cars_car_brands1')->references('id')->on('car_brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('car_type_id', 'fk_cars_car_types1')->references('id')->on('car_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('location_id', 'fk_cars_locations1')->references('id')->on('locations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('model_id', 'fk_cars_models1')->references('id')->on('models')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('state_id', 'fk_cars_states')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cars', function(Blueprint $table)
		{
			$table->dropForeign('fk_cars_car_brands1');
			$table->dropForeign('fk_cars_car_types1');
			$table->dropForeign('fk_cars_locations1');
			$table->dropForeign('fk_cars_models1');
			$table->dropForeign('fk_cars_states');
		});
	}

}
