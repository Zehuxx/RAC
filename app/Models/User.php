<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Sep 2019 16:53:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property int $role_id
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Employee $employee
 * @property \App\Models\Role $role
 *
 * @package App\Models
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'role_id' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'role_id',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'id');
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}
}
