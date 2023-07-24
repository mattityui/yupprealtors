<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyImage
 * 
 * @property int $id
 * @property int|null $property_id
 * @property int|null $property_condo_id
 * @property int|null $property_lot_id
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property PropertiesCondo|null $properties_condo
 * @property Property|null $property
 * @property PropertiesLot|null $properties_lot
 * @property Collection|ScheduledTour[] $scheduled_tours
 *
 * @package App\Models
 */
class PropertyImage extends Model
{
	protected $table = 'property_images';

	protected $casts = [
		'property_id' => 'int',
		'property_condo_id' => 'int',
		'property_lot_id' => 'int'
	];

	protected $fillable = [
		'property_id',
		'property_condo_id',
		'property_lot_id',
		'image'
	];

	public function properties_condo()
	{
		return $this->belongsTo(PropertiesCondo::class, 'property_condo_id');
	}

	public function property()
	{
		return $this->belongsTo(Property::class);
	}

	public function properties_lot()
	{
		return $this->belongsTo(PropertiesLot::class, 'property_lot_id');
	}

	public function scheduled_tours()
	{
		return $this->hasMany(ScheduledTour::class);
	}
}
