<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 01 Sep 2019 06:16:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Goal
 * 
 * @property int $id
 * @property int $car_type_id
 * @property int $seller_id
 * @property float $sales_goal
 * @property float $commission
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\CarType $car_type
 * @property \App\Models\Seller $seller
 *
 * @package App\Models
 */
class Goal extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'car_type_id' => 'int',
		'seller_id' => 'int',
		'sales_goal' => 'float',
		'commission' => 'float'
	];

	protected $fillable = [
		'car_type_id',
		'seller_id',
		'sales_goal',
		'commission'
	];

	public function car_type()
	{
		return $this->belongsTo(\App\Models\CarType::class);
	}

	public function seller()
	{
		return $this->belongsTo(\App\Models\Seller::class);
	}
}
