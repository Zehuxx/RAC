<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 22:14:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SaleGoal
 * 
 * @property int $id
 * @property int $employee_id
 * @property int $car_type_id
 * @property float $commission
 * @property float $sale_goal
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\CarType $car_type
 * @property \App\Models\Employee $employee
 *
 * @package App\Models
 */
class SaleGoal extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'employee_id' => 'int',
		'car_type_id' => 'int',
		'commission' => 'float',
		'sale_goal' => 'float'
	];

	protected $fillable = [
		'employee_id',
		'car_type_id',
		'commission',
		'sale_goal'
	];

	public function car_type()
	{
		return $this->belongsTo(\App\Models\CarType::class);
	}

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class);
	}
}
