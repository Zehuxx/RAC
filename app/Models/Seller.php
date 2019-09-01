<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 01 Sep 2019 06:16:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Seller
 * 
 * @property int $id
 * @property int $state
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Employee $employee
 * @property \Illuminate\Database\Eloquent\Collection $goals
 *
 * @package App\Models
 */
class Seller extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'state' => 'int'
	];

	protected $fillable = [
		'state'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'id');
	}

	public function goals()
	{
		return $this->hasMany(\App\Models\Goal::class);
	}
}
