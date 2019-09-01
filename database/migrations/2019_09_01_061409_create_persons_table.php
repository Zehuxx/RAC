<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persons', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 45);
			$table->string('last_name', 45);
			$table->date('birth_date');
			$table->string('home_address', 45)->nullable();
			$table->string('phone', 20);
			$table->string('identification_card', 35);
			$table->char('gender', 1);
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
		Schema::drop('persons');
	}

}
