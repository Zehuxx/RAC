<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Sep 2019 20:26:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
