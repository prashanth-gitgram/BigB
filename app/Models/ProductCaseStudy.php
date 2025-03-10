<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCaseStudy extends Model
{
    protected $fillable = [
        'product_id',
        'study_details',
        'approved_by',
        'status'
    ];

    protected $casts = [
        'study_details' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
