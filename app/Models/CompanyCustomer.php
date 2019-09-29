<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Sep 2019 21:59:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompanyCustomer
 * 
 * @property int $id
 * @property int $company_id
 * @property int $customer_id
 * 
 * @property \App\Models\Company $company
 * @property \App\Models\Customer $customer
 *
 * @package App\Models
 */
class CompanyCustomer extends Eloquent
{
	protected $table = 'company_customer';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'customer_id' => 'int'
	];

	protected $fillable = [
		'company_id',
		'customer_id'
	];

	public function company()
	{
		return $this->belongsTo(\App\Models\Company::class);
	}

	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class);
	}
}
