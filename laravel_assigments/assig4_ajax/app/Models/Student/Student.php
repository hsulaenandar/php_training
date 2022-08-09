<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','phone_no','address','subject_id'
        
    ];
    protected $hidden = ['created_at','updated_at'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
