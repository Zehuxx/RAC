<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Sep 2019 16:53:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $customer_id
 * @property float $cost
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Customer $customer
 * @property \Illuminate\Database\Eloquent\Collection $details
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'customer_id' => 'int',
		'cost' => 'float'
	];

	protected $fillable = [
		'customer_id',
		'cost'
	];

	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class);
	}

	public function details()
	{
		return $this->hasMany(\App\Models\Detail::class);
	}
}
