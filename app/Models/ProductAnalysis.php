<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAnalysis extends Model
{

    protected $table = 'product_analysis';

    protected $fillable = [
        'product_id',
        'analysis_details',
        'status',
        'approved_by'
    ];

    protected $casts = [
        'analysis_details' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
