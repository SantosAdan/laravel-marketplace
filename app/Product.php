<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function ads(){
        return $this->belongsTo('App\Advertisement');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }

}
