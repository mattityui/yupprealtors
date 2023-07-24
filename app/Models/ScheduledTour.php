<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScheduledTour
 * 
 * @property int $id
 * @property int $user_id
 * @property int $property_image_id
 * @property Carbon $tour_date
 * @property Carbon $tour_time
 * @property string $tour_contact_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property PropertyImage $property_image
 * @property User $user
 *
 * @package App\Models
 */
class ScheduledTour extends Model
{
	protected $table = 'scheduled_tour';

	protected $casts = [
		'user_id' => 'int',
		'property_image_id' => 'int',
		'tour_date' => 'datetime',
		'tour_time' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'property_image_id',
		'tour_date',
		'tour_time',
		'tour_contact_number'
	];

	public function property_image()
	{
		return $this->belongsTo(PropertyImage::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
