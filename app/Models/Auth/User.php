<?php

namespace App\Models\Auth;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Sluggable;

    //** Variables */

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** 
     * The relationships that should always be loaded. 
     * 
     * @var array 
     * 
     */
    protected $with = []; 

    //** Package Related Functions */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    //** Accessors & Mutators */

    //...
    
    //** belongsTo, belongsToMany, hasOne, hasMany relationships */

    public function userPayments()
    {
        return $this->hasMany('App\Models\Payment\UserPayment', 'user_id', 'id');
    }
}
