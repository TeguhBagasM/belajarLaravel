<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'teacher_id',
    ];


    protected $table = 'class';

    public function students()
    {
        return $this->hasMany(student::class, 'class_id', 'id');
    }
    public function waliKelas()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
