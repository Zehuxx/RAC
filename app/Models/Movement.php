<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Sep 2019 16:53:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Movement
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $details
 *
 * @package App\Models
 */
class Movement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function details()
	{
		return $this->hasMany(\App\Models\Detail::class);
	}
}
