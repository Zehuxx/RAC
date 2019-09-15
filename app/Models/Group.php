<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Sep 2019 03:56:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Group
 * 
 * @property int $id
 * @property int $car_type_id
 * @property string $name
 * @property float $commission
 * @property float $sale_goal
 * 
 * @property \App\Models\CarType $car_type
 * @property \Illuminate\Database\Eloquent\Collection $sale_goals
 *
 * @package App\Models
 */
class Group extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'car_type_id' => 'int',
		'commission' => 'float',
		'sale_goal' => 'float'
	];

	protected $fillable = [
		'car_type_id',
		'name',
		'commission',
		'sale_goal'
	];

	public function car_type()
	{
		return $this->belongsTo(\App\Models\CarType::class);
	}

	public function sale_goals()
	{
		return $this->hasMany(\App\Models\SaleGoal::class);
	}
}
