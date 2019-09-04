<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_customer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->index('fk_company_customer_companies1_idx');
			$table->integer('customer_id')->index('fk_company_customer_customers1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_customer');
	}

}
