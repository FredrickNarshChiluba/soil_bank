<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;

class Employee extends Model
{
     /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'Phone',
        'password',
        'address',
        'Role',
        'image',
        'url',
    ];

            
            public function getImageAttribute()
        {
           return $this->image;
        }
        

    
}
