<?php

namespace Marketplace;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Marketplace\Traits\ImageUploadTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use ImageUploadTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'street',
        'photo_url',
        'street_number',
        'district',
        'city',
        'state',
        'zipcode',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Set the default photo.
     * @param $photo
     */
    public function setDefaultPhoto($photo)
    {
        $this->attributes[$photo] = 'users/default.jpg';
    }

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id', 'id');
    }

}
