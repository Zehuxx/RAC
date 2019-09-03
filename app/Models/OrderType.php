<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Sep 2019 20:26:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OrderType
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * 
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App\Models
 */
class OrderType extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description'
	];

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class);
	}
}
