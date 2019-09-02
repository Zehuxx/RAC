<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 22:14:15 +0000.
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
