<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nutrients extends Model
{
    //
    protected $table = 'nutrients';

    /**
     * 
     * @var array
     *  
           
     */
    protected $fillable = [
        'Soil_texture',
        'Soil_type',
        'Organic_Carbons',
        'Organic_Carbon',
        'Soil_phps',
        'Soil_php',
        'Nitrogens',
        'Nitrogen',
        'Phosphoruss',
        'Phosphorus',
        'Potassiums',
        'Potassium',
        'Cation_Exchange_Capacitys',
        'Cation_Exchange_Capacity',
    	'field_name',
        'Land_size',
        'field_unit',
        'land_location_cordinates',
        'farmer_name',
        'farmer_email',
        'farmer_address',
        'farmer_contact'
    ];
}
