<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(
            User::class, 
            'role_users', 
            'role_id', 
            'user_id')
        ->using(RoleUser::class)
        ->withTimestamps();
    }

}
