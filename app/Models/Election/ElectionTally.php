<?php

namespace App\Models\Election;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionTally extends Model
{
    use HasFactory;

    //** Variables */

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "election_tallies"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'candidate_id', 
        'user_id'
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


    //** Accessors & Mutators */

    //...

    //** belongsTo, belongsToMany, hasOne, hasMany relationships */

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'user_id', 'id');
    }

    public function candidate()
    {
        return $this->belongsTo('App\Models\Election\ElectionCandidate', 'candidate_id', 'id');
    }
}
