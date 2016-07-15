<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
