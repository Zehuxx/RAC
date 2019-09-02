<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 03:07:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property int $car_type_id
 * @property float $salary
 * @property float $commission
 * @property float $sales_goal
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\CarType $car_type
 * @property \App\Models\Person $person
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Employee extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'car_type_id' => 'int',
		'salary' => 'float',
		'commission' => 'float',
		'sales_goal' => 'float'
	];

	protected $fillable = [
		'car_type_id',
		'salary',
		'commission',
		'sales_goal'
	];

	public function car_type()
	{
		return $this->belongsTo(\App\Models\CarType::class);
	}

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'id');
	}

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class);
	}

	public function user()
	{
		return $this->hasOne(\App\Models\User::class, 'id');
	}
}
