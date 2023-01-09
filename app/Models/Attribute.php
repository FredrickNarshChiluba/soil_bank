<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Product;

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
        'name', 'price', 'product_id', 'start', 'employee_id','end'
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

    // public function project(){
    //     return $this->belongsTo(Product::class);
    // }

    public function task()
    {
        return $this->belongsTo(Product::class);
    }
     public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }

}
