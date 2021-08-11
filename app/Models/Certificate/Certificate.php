<?php

namespace App\Models\Certificate;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    //** Variables */

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "certificates"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id',
        'updated_by_user_id',
        'signee_id', 
        'name', 
        'file_template'
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

    public function createdByUser()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by_user_id', 'id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo('App\Models\Auth\User', 'updated_by_user_id', 'id');
    }

    public function signee() 
    {
        return $this->belongsTo('App\Models\Certificate\CertificateSignee', 'signee_id', 'id');
    }
}
