<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Sep 2019 20:26:15 +0000.
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
 * @property \Carbon\Carbon $departure_date
 * @property \Carbon\Carbon $reentry_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Car $car
 * @property \App\Models\Order $order
 * @property \App\Models\Employee $employee
 *
 * @package App\Models
 */
class Detail extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'order_id' => 'int',
		'car_id' => 'int',
		'employee_id' => 'int'
	];

	protected $dates = [
		'departure_date',
		'reentry_date'
	];

	protected $fillable = [
		'order_id',
		'car_id',
		'employee_id',
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
}
