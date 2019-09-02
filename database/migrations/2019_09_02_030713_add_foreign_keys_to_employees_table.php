<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employees', function(Blueprint $table)
		{
			$table->foreign('car_type_id', 'fk_employees_car_types1')->references('id')->on('car_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id', 'fk_employees_persons1')->references('id')->on('persons')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employees', function(Blueprint $table)
		{
			$table->dropForeign('fk_employees_car_types1');
			$table->dropForeign('fk_employees_persons1');
		});
	}

}
