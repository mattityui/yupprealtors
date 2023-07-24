<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertiesLot
 * 
 * @property int $lot_id
 * @property string $lot_address
 * @property int $lot_price
 * @property int $lot_area
 * @property string $lot_type
 * @property string|null $lot_image
 * 
 * @property Collection|PropertyImage[] $property_images
 *
 * @package App\Models
 */
class PropertiesLot extends Model
{
	protected $table = 'properties_lot';
	protected $primaryKey = 'lot_id';
	public $timestamps = false;

	protected $casts = [
		'lot_price' => 'int',
		'lot_area' => 'int'
	];

	protected $fillable = [
		'lot_address',
		'lot_price',
		'lot_area',
		'lot_type',
		'lot_image'
	];

	public function property_images()
	{
		return $this->hasMany(PropertyImage::class, 'property_lot_id');
	}
}
