<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertiesCondo
 * 
 * @property int $condo_id
 * @property string $condo_address
 * @property int $condo_price
 * @property int $condo_floor_area
 * @property string $condo_type
 * 
 * @property Collection|PropertyImage[] $property_images
 *
 * @package App\Models
 */
class PropertiesCondo extends Model
{
	protected $table = 'properties_condo';
	protected $primaryKey = 'condo_id';
	public $timestamps = false;

	protected $casts = [
		'condo_price' => 'int',
		'condo_floor_area' => 'int'
	];

	protected $fillable = [
		'condo_address',
		'condo_price',
		'condo_floor_area',
		'condo_type'
	];

	public function property_images()
	{
		return $this->hasMany(PropertyImage::class, 'property_condo_id');
	}
}
