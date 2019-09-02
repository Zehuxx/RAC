<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 22:14:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $location_code
 * @property int $availability
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cars
 *
 * @package App\Models
 */
class Location extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'availability' => 'int'
	];

	protected $fillable = [
		'location_code',
		'availability'
	];

	public function cars()
	{
		return $this->hasMany(\App\Models\Car::class);
	}
}
