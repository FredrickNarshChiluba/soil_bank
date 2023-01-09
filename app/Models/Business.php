<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $table = 'businesses';

        protected $fillable = [
        'metricName',
         'visualizationLink',
          'visualizationname',
           'description'
    ];
    public function setCategoryAttribute($value)
    {
        $this->attributes['metricName'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['metricName'] = json_decode($value);

    }
}
