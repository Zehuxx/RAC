<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Sep 2019 16:53:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Car
 * 
 * @property int $id
 * @property int $state_id
 * @property int $car_brand_id
 * @property int $model_id
 * @property int $car_type_id
 * @property int $location_id
 * @property string $chassis
 * @property string $license_plate
 * @property \Carbon\Carbon $year
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\CarBrand $car_brand
 * @property \App\Models\CarType $car_type
 * @property \App\Models\Location $location
 * @property \App\Models\Model $model
 * @property \App\Models\State $state
 * @property \Illuminate\Database\Eloquent\Collection $details
 *
 * @package App\Models
 */
class Car extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'state_id' => 'int',
		'car_brand_id' => 'int',
		'model_id' => 'int',
		'car_type_id' => 'int',
		'location_id' => 'int'
	];

	protected $dates = [
		'year'
	];

	protected $fillable = [
		'state_id',
		'car_brand_id',
		'model_id',
		'car_type_id',
		'location_id',
		'chassis',
		'license_plate',
		'year',
		'image'
	];

	public function car_brand()
	{
		return $this->belongsTo(\App\Models\CarBrand::class);
	}

	public function car_type()
	{
		return $this->belongsTo(\App\Models\CarType::class);
	}

	public function location()
	{
		return $this->belongsTo(\App\Models\Location::class);
	}

	public function model()
	{
		return $this->belongsTo(\App\Models\Model::class);
	}

	public function state()
	{
		return $this->belongsTo(\App\Models\State::class);
	}

	public function details()
	{
		return $this->hasMany(\App\Models\Detail::class);
	}
}
