<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productts extends Model
{
    //
    protected $table = 'productts';

        protected $fillable = [
        'metricName',
         'visualizationLink',
          'visualizationname',
           'description'
    ];
}
