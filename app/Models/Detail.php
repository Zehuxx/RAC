<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 22:14:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detail
 * 
 * @property int $id
 * @property int $order_id
 * @property int $car_id
 * @property \Carbon\Carbon $departure_date
 * @property \Carbon\Carbon $reentry_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Car $car
 * @property \App\Models\Order $order
 *
 * @package App\Models
 */
class Detail extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'order_id' => 'int',
		'car_id' => 'int'
	];

	protected $dates = [
		'departure_date',
		'reentry_date'
	];

	protected $fillable = [
		'order_id',
		'car_id',
		'departure_date',
		'reentry_date'
	];

	public function car()
	{
		return $this->belongsTo(\App\Models\Car::class);
	}

	public function order()
	{
		return $this->belongsTo(\App\Models\Order::class);
	}
}
