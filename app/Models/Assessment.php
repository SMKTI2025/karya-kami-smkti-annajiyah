<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessments';
    protected $fillable = [
        'work_id',
        'score',
        'comment'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 
        'work_id');
    }
    
}
