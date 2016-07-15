<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id',
    ];

    // Relationships
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
