<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projectts extends Model
{
    //
    protected $table = 'projectts';

        protected $fillable = [
        'metricName',
         'visualizationLink',
          'visualizationname',
           'description'
    ];
}
