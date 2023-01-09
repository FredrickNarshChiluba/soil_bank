<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

/**
 * Class Attribute
 * @package App\Models
 */
class Attribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'categories_id', 'start', 'employee_id','end'
    ];

    /**
     * @var array
     */
    protected $casts  = [
        'is_filterable' =>  'boolean',
        'is_required'   =>  'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   
    public function Attribute(){
        return $this->belongsTo(Employee::class);
    }
}
