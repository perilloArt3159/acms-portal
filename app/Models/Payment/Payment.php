<?php

namespace App\Models\Payment;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    //** Variables */

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "payments"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id',
        'updated_by_user_id', 
        'payment_category_id',
        'code', 
        'name', 
        'description', 
        'amount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s',
        'deleted_at'        => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'code'
            ]
        ];
    }

    //** Package Related Functions */

    //...

    //** Accessors & Mutators */

    //...

    //** belongsTo, belongsToMany, hasOne, hasMany relationships */

    public function createdByUser()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by_user_id', 'id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo('App\Models\Auth\User', 'updated_by_user_id', 'id');
    }

    public function paymentCategory() 
    {
        return $this->belongsTo('App\Models\Payment\PaymentCategory', 'payment_category_id', 'id'); 
    }

    public function userPayments() 
    {
        return $this->hasMany('App\Models\Payment\PaymentUser', 'payment_id', 'id');
    }
}
