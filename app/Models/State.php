<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 03:07:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class State
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cars
 *
 * @package App\Models
 */
class State extends Eloquent
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
