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
        'Sample_ID',
        'Soil_texture_sand',
        'Soil_texture_clay',
        'Soil_texture_silt',
        'Soil_type',
        'soil_color',
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
        'land_location_district',
        'x_cordinate_lat',
        'y_cordinate_long',
        'farmer_name',
        'farmer_email',
        'farmer_address',
        'farmer_contact'
    ];
}
