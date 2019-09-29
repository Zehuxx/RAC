<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Sep 2019 21:59:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detail
 * 
 * @property int $id
 * @property int $order_id
 * @property int $car_id
 * @property int $employee_id
 * @property int $movement_id
 * @property \Carbon\Carbon $departure_date
 * @property \Carbon\Carbon $reentry_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Car $car
 * @property \App\Models\Order $order
 * @property \App\Models\Employee $employee
 * @property \App\Models\Movement $movement
 *
 * @package App\Models
 */
class Detail extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'order_id' => 'int',
		'car_id' => 'int',
		'employee_id' => 'int',
		'movement_id' => 'int'
	];

	protected $dates = [
		'departure_date',
		'reentry_date'
	];

	protected $fillable = [
		'order_id',
		'car_id',
		'employee_id',
		'movement_id',
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

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class);
	}

	public function movement()
	{
		return $this->belongsTo(\App\Models\Movement::class);
	}
}
