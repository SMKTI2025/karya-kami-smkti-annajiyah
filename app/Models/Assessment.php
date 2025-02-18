<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessments';
    protected $fillable = [
        'role_user_id', 
        'work_id',
        'score',
        'comment'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,
        'user_id');
    }

    public function work()
    {
        return $this->belongsTo(Work::class, 
        'work_id');
    }

    public function roleUser() {
        return $this->belongsTo(
            RoleUser::class, 
            'role_user_id'
        ); 
    }
}
