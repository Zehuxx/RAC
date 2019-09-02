<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 22:14:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $order_type_id
 * @property int $employee_id
 * @property int $customer_id
 * @property string $description
 * @property float $cost
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Customer $customer
 * @property \App\Models\Employee $employee
 * @property \App\Models\OrderType $order_type
 * @property \Illuminate\Database\Eloquent\Collection $details
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'order_type_id' => 'int',
		'employee_id' => 'int',
		'customer_id' => 'int',
		'cost' => 'float'
	];

	protected $fillable = [
		'order_type_id',
		'employee_id',
		'customer_id',
		'description',
		'cost'
	];

	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class);
	}

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class);
	}

	public function order_type()
	{
		return $this->belongsTo(\App\Models\OrderType::class);
	}

	public function details()
	{
		return $this->hasMany(\App\Models\Detail::class);
	}
}
