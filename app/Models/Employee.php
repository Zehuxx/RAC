<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 01 Sep 2019 06:16:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property float $salary
 * @property \Carbon\Carbon $hiring_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Person $person
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property \App\Models\Seller $seller
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Employee extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'salary' => 'float'
	];

	protected $dates = [
		'hiring_date'
	];

	protected $fillable = [
		'salary',
		'hiring_date'
	];

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'id');
	}

	public function orders()
	{
		return $this->hasMany(\App\Models\Order::class);
	}

	public function seller()
	{
		return $this->hasOne(\App\Models\Seller::class, 'id');
	}

	public function user()
	{
		return $this->hasOne(\App\Models\User::class, 'id');
	}
}
