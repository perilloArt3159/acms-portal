<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "member_category";

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s',
        'deleted_at'        => 'datetime:Y-m-d H:i:s',
    ];

    public function createdByUser()
    {
        return $this->belongsTo("App\Models\User", 'created_by_user_id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo("App\Models\User", 'updated_by_user_id');
    }
}
