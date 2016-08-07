<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'seller_id',
        'buyer_id',
        'total',
        'status'
    ];

    public function buyer() {
        return $this->hasOne(User::class, 'id', 'buyer_id');
    }

    public function seller() {
        return $this->hasOne(User::class, 'id', 'seller_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function getQuantity()
    {
        return $this->total / $this->product->price;
    }
}
