<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Sep 2019 03:07:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Movement
 * 
 * @property int $id
 * @property int $detail_id
 * @property \Carbon\Carbon $departure_date
 * @property \Carbon\Carbon $reentry_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Detail $detail
 *
 * @package App\Models
 */
class Movement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'detail_id' => 'int'
	];

	protected $dates = [
		'departure_date',
		'reentry_date'
	];

	protected $fillable = [
		'detail_id',
		'departure_date',
		'reentry_date'
	];

	public function detail()
	{
		return $this->belongsTo(\App\Models\Detail::class);
	}
}
