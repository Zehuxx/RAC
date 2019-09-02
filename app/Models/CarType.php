<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 03:07:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CarType
 * 
 * @property int $id
 * @property string $name
 * @property float $cost
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cars
 * @property \Illuminate\Database\Eloquent\Collection $employees
 *
 * @package App\Models
 */
class CarType extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'cost' => 'float'
	];

	protected $fillable = [
		'name',
		'cost'
	];

	public function cars()
	{
		return $this->hasMany(\App\Models\Car::class);
	}

	public function employees()
	{
		return $this->hasMany(\App\Models\Employee::class);
	}
}
