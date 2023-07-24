<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * 
 * @property int $id
 * @property string $address
 * @property int $price
 * @property int $room
 * @property int $tb
 * @property int $lot_area
 * @property int $floor_area
 * @property string $type
 * @property string|null $image
 * 
 * @property Collection|PropertyImage[] $property_images
 *
 * @package App\Models
 */
class Property extends Model
{
	protected $table = 'properties';
	public $timestamps = false;

	protected $casts = [
		'price' => 'int',
		'room' => 'int',
		'tb' => 'int',
		'lot_area' => 'int',
		'floor_area' => 'int'
	];

	protected $fillable = [
		'address',
		'price',
		'room',
		'tb',
		'lot_area',
		'floor_area',
		'type',
		'image'
	];

	public function property_images()
	{
		return $this->hasMany(PropertyImage::class);
	}
}
