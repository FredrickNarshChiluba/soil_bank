<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soil extends Model
{
     protected $table = 'soils';

    /**
     * @var array
     */
    protected $fillable = [
        'soil_id',
        'land_id',
        'soil_type',
        'soil_texture'
    ];

    public function land(){
        return $this->belongsTo(Land::class);
    }

}
