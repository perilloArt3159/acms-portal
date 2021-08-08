<?php

namespace App\Models\Member;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "member_category";

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
                'source' => 'name'
            ]
        ];
    }

    public function createdByUser()
    {
        return $this->belongsTo("App\Models\User", 'created_by_user_id', 'id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo("App\Models\User", 'updated_by_user_id', 'id');
    }

    public function members() 
    {
        return $this->hasMany('App\Models\Member\Member', 'member_category_id', 'id'); 
    }
}
