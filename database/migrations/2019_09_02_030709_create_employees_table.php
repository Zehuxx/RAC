<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->integer('id')->index('fk_employees_persons1_idx');
			$table->integer('car_type_id')->nullable()->index('fk_employees_car_types1_idx');
			$table->float('salary', 10, 0);
			$table->float('commission', 10, 0)->nullable();
			$table->float('sales_goal', 10, 0)->nullable();
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
		Schema::drop('employees');
	}

}
