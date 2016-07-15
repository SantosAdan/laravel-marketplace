<?php

namespace Marketplace;

use Illuminate\Database\Eloquent\Model;
use Marketplace\Traits\ImageUploadTrait;

class Photo extends Model
{
    use ImageUploadTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
