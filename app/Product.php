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
        return $this->belongsTo(Order::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
