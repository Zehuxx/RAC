<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Sep 2019 20:26:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CarBrand
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cars
 *
 * @package App\Models
 */
class CarBrand extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function cars()
	{
		return $this->hasMany(\App\Models\Car::class);
	}
}
