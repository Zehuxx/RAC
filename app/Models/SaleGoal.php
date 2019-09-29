<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Sep 2019 21:59:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SaleGoal
 * 
 * @property int $id
 * @property int $employee_id
 * @property int $group_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Employee $employee
 * @property \App\Models\Group $group
 *
 * @package App\Models
 */
class SaleGoal extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'employee_id' => 'int',
		'group_id' => 'int'
	];

	protected $fillable = [
		'employee_id',
		'group_id'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class);
	}

	public function group()
	{
		return $this->belongsTo(\App\Models\Group::class);
	}
}
