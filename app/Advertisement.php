<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function product(){
        return $this->hasOne('App\Product');
    }
}
