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
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'price',
        'quantity',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }

}
