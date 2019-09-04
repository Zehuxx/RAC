<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 04 Sep 2019 23:00:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $name
 * @property string $rtn
 * @property string $home_address
 * 
 * @property \Illuminate\Database\Eloquent\Collection $customers
 *
 * @package App\Models
 */
class Company extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name',
		'rtn',
		'home_address'
	];

	public function customers()
	{
		return $this->belongsToMany(\App\Models\Customer::class)
					->withPivot('id');
	}
}
