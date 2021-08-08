<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLicense extends Model
{
    use HasFactory;

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "member_licenses"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id', 
        'pma_number', 
        'prc_number', 
        'expiration_date', 
        'field_of_practice', 
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
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member\Member', 'member_id', 'id');
    }
}
