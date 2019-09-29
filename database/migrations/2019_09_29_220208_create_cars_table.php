<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('state_id')->index('fk_cars_states_idx');
			$table->integer('car_brand_id')->index('fk_cars_car_brands1_idx');
			$table->integer('model_id')->index('fk_cars_models1_idx');
			$table->integer('car_type_id')->index('fk_cars_car_types1_idx');
			$table->integer('location_id')->nullable()->index('fk_cars_locations1_idx');
			$table->string('reserved', 70)->nullable();
			$table->string('chassis', 45);
			$table->string('license_plate', 45);
			$table->date('year');
			$table->string('image')->nullable();
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
		Schema::drop('cars');
	}

}
