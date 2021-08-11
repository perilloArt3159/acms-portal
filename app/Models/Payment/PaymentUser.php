<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentUser extends Model
{
    use HasFactory;

    //** Variables */

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "payment_user"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id', 
        'updated_by_user_id',
        'user_id', 
        'payment_id', 
        'amount_paid', 
        'file_proof_of_payment', 
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

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'user_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment\Payment', 'payment_id', 'id');
    }
}
