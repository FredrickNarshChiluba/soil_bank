<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    //
    protected $table = 'resources';

        protected $fillable = [
        'metricName',
         'visualizationLink',
          'visualizationname',
           'description'
    ];
}
