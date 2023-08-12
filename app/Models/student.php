<?php

namespace App\Models;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'class_id',
        'image',
        'gender',
        'nim',
    ];

    public function class()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_ekskuls', 'student_id', 'extracurricular_id');
    }
}
