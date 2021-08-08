<?php

namespace App\Models\Member;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    /**
     * Define Table Name.
     *
     * @var string
     */
    protected $table = "members"; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "member_category_id", 
        "first_name", 
        "last_name", 
        "middle_name", 
        "birth_date", 
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
                'source' => 'fullname'
            ]
        ];
    }

    /**
     * Generate Fullname Attribute.
     *
     * @var string
     */
    public function getFullnameAttribute(): string
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }

    public function memberCategory()
    {
        return $this->belongsTo('App\Models\Member\MemberCategory', 'member_category_id', 'id');
    }

    public function contact() 
    {
        return $this->hasOne('App\Member\MemberContact', 'member_id', 'id'); 
    }

    public function license() 
    {
        return $this->hasOne('App\Member\MemberLicense', 'member_id', 'id'); 
    }
}
