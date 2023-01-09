<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'categories_id','name', 'description', 'price','start', 'end',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'categories_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        // $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
            public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    // public function tasks()
    // {
    //     return $this->hasMany(Attribute::class);
    // }
    // public function products()
    // {
    //     return $this->hasMany(Attribute::class);
    // }
     public function products()
    {
        return $this->belongsToMany(Attribute::class, 'product_categories', 'category_id', 'product_id');
    }
}
