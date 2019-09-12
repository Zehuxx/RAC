<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Sep 2019 16:53:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Group
 * 
 * @property int $id
 * @property string $name
 * @property float $commission
 * @property float $sale_goal
 * 
 * @property \Illuminate\Database\Eloquent\Collection $sale_goals
 *
 * @package App\Models
 */
class Group extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'commission' => 'float',
		'sale_goal' => 'float'
	];

	protected $fillable = [
		'name',
		'commission',
		'sale_goal'
	];

	public function sale_goals()
	{
		return $this->hasMany(\App\Models\SaleGoal::class);
	}
}
