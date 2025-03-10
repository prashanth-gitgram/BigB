<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'image',
        'inspiration',
        'status',
        'approved_by'
    ];

    // auto generate slug
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function CaseStudy(){
        return $this->hasOne(ProductCaseStudy::class, 'product_id');
    }

    public function Analysis(){
        return $this->hasOne(ProductAnalysis::class, 'product_id');
    }
}
