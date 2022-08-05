<?php

namespace App\Models\Subject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name','subject_id'
        
    ];

    public function students()
    {
        return $this->hasMany(Comment::class);
    }
}
