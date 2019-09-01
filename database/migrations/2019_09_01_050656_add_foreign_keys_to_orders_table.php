<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->foreign('customer_id', 'fk_orders_customers1')->references('id')->on('customers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('employee_id', 'fk_orders_employees1')->references('id')->on('employees')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('order_type_id', 'fk_orders_order_types1')->references('id')->on('order_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->dropForeign('fk_orders_customers1');
			$table->dropForeign('fk_orders_employees1');
			$table->dropForeign('fk_orders_order_types1');
		});
	}

}
