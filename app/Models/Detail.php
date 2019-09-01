<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 01 Sep 2019 06:16:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detail
 * 
 * @property int $id
 * @property int $order_id
 * @property int $car_id
 * @property int $available
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Car $car
 * @property \App\Models\Order $order
 * @property \Illuminate\Database\Eloquent\Collection $movements
 *
 * @package App\Models
 */
class Detail extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'order_id' => 'int',
		'car_id' => 'int',
		'available' => 'int'
	];

	protected $fillable = [
		'order_id',
		'car_id',
		'available'
	];

	public function car()
	{
		return $this->belongsTo(\App\Models\Car::class);
	}

	public function order()
	{
		return $this->belongsTo(\App\Models\Order::class);
	}

	public function movements()
	{
		return $this->hasMany(\App\Models\Movement::class);
	}
}
