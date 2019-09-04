<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 04 Sep 2019 23:00:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Person
 * 
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property \Carbon\Carbon $birth_date
 * @property string $home_address
 * @property string $phone
 * @property string $identification_card
 * @property string $gender
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Customer $customer
 * @property \App\Models\Employee $employee
 *
 * @package App\Models
 */
class Person extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'persons';

	protected $dates = [
		'birth_date'
	];

	protected $fillable = [
		'name',
		'last_name',
		'birth_date',
		'home_address',
		'phone',
		'identification_card',
		'gender'
	];

	public function customer()
	{
		return $this->hasOne(\App\Models\Customer::class, 'id');
	}

	public function employee()
	{
		return $this->hasOne(\App\Models\Employee::class, 'id');
	}
}
