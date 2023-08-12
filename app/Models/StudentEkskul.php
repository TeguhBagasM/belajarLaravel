<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEkskul extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'extracurricular_id',
    ];

    public function students()
    {
        return $this->belongsToMany(student::class, 'id');
    }
    // public function extracurriculars()
    // {
    //     return $this->belongsToMany(Extracurricular::class, 'student_id', 'extracurricular_id');
    // }
}
