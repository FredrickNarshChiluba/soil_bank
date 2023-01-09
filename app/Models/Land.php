<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
     protected $table = 'land';

    /**
     * 
     * @var array
     *  
           
     */
    protected $fillable = [
    	'field_name',
        'Land_size',
        'field_unit',
        'land_location_cordinates',
        'farmer_name',
        'farmer_email',
        'farmer_address',
        'farmer_contact'
    ];
    public function farmer()
    {
        return $this->hasMany(Farmers::class);
    }
    public function soil()
    {
        return $this->hasMany(Soil::class);
    }
}