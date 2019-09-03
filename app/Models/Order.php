<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Sep 2019 20:26:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $order_type_id
 * @property int $customer_id
 * @property float $cost
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Customer $customer
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
		'customer_id' => 'int',
		'cost' => 'float'
	];

	protected $fillable = [
		'order_type_id',
		'customer_id',
		'cost'
	];

	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class);
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
