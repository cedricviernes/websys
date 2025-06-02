<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function getNameAttribute($value)
    {
        // Ensure it always returns a string
        return is_array($value) ? json_encode($value) : $value;
    }
    
    public function getPriceAttribute($value)
    {
        return is_array($value) ? 0 : (float) $value;
    }
}
