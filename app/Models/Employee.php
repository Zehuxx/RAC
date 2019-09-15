<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Sep 2019 03:56:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $id
 * @property float $salary
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Person $person
 * @property \Illuminate\Database\Eloquent\Collection $details
 * @property \Illuminate\Database\Eloquent\Collection $sale_goals
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

	protected $fillable = [
		'salary'
	];

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'id');
	}

	public function details()
	{
		return $this->hasMany(\App\Models\Detail::class);
	}

	public function sale_goals()
	{
		return $this->hasMany(\App\Models\SaleGoal::class);
	}

	public function user()
	{
		return $this->hasOne(\App\Models\User::class, 'id');
	}
}
