<?php

namespace App\Models\Member;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberContact extends Model
{
    use HasFactory;

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "member_contacts"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id', 
        'mailing_address', 
        'contact_number', 
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
