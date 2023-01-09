<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmers extends Model
{
     protected $table = 'farmers';

    /**
     * 
     * @var array
     */
    protected $fillable = [ 
        'farmer_name',
        'farmer_address',
        'farmer_contact'
    ];
    public function land()
    {
        return $this->belongsTo(Land::class, 'land_id');
    }
}