<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Sep 2019 03:56:08 +0000.
 */

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
class User extends Authenticatable
{
	use HasApiTokens, Notifiable;
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
		'id',
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
