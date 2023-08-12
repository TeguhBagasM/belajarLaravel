<?php

namespace App\Models;

use App\Models\Matkul;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function class()
    {
        return $this->hasOne(Classroom::class);
    }
    public function matkul()
    {
        return $this->hasOne(Matkul::class);
    }
}
