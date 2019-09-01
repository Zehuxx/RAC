<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_customer', function(Blueprint $table)
		{
			$table->foreign('company_id', 'fk_company_customer_companies1')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('customer_id', 'fk_company_customer_customers1')->references('id')->on('customers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_customer', function(Blueprint $table)
		{
			$table->dropForeign('fk_company_customer_companies1');
			$table->dropForeign('fk_company_customer_customers1');
		});
	}

}
