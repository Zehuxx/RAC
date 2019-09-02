<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 03:07:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Customer
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Person $person
 * @property \Illuminate\Database\Eloquent\Collection $companies
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App\Models
 */
class Customer extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int'
	];

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'id');
	}

	public function companies()
	{
		return $this->belongsToMany(\App\Models\Company::class)
					->withPivot('id');
	}

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class);
	}
}
