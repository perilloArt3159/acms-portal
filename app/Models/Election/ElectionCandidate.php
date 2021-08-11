<?php

namespace App\Models\Election;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionCandidate extends Model
{
    use HasFactory;

    //** Variables */

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "election_candidates"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election_id', 
        'member_id'
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

    //** Package Related Functions */

    //...

    //** Accessors & Mutators */

    //...

    //** belongsTo, belongsToMany, hasOne, hasMany relationships */
   
    public function candidate()
    {
        return $this->belongsTo('App\Models\Member\Member', 'member_id', 'id');
    }

    public function election()
    {
        return $this->belongsTo('App\Models\Election\Election', 'election_id', 'id');
    }
}
