<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'title',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
