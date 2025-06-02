<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['name', 'price', 'description', 'category_id', 'productImage'];

    /**
     * Define the relationship with the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Define the relationship with the Review model.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Accessor for the product name.
     */
    public function getNameAttribute($value)
    {
        return is_array($value) ? json_encode($value) : $value;
    }

    /**
     * Accessor for the product price.
     */
    public function getPriceAttribute($value)
    {
        return is_array($value) ? 0 : (float) $value;
    }
}
