<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table = "works";
    protected $fillable = [
        'title', 
        'description', 
        'category',
        'image',
        'source_code',
        'video',
        'documentation',
        'meta_tags',
        'usage_guide',
    ];

    public function assessments(){
        return $this->hasMany(Assessment::class);
    }

    public function averageScore(){
        return $this->assessments()->avg('score');
    }
    
}
