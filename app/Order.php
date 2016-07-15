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
    protected $fillable = [];

    public function buyer(){
        return $this->belongsTo('Marketplace\User', 'id', 'buyer_id');
    }

    public function seller(){
        return $this->belongsTo('Marketplace\User', 'id', 'seller_id');
    }

    public function products(){
        return $this->hasOne('Marketplace\Product');
    }
}
