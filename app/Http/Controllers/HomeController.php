<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\StudentEkskul;
use App\Models\Extracurricular;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    public function home()
    {
        $jumlah_student = student::all()->count();
        $jumlah_kelas = Classroom::all()->count();
        $jumlah_ukm = Extracurricular::all()->count();
        $jumlah_teacher = Teacher::all()->count();
        $jumlah_member = StudentEkskul::all()->count();
        $jumlah_user = User::all()->count();
        return view('home')->with('jumlah_student', $jumlah_student,)
            ->with('jumlah_kelas', $jumlah_kelas)
            ->with('jumlah_ukm', $jumlah_ukm)
            ->with('jumlah_teacher', $jumlah_teacher)
            ->with('jumlah_member', $jumlah_member)
            ->with('jumlah_user', $jumlah_user);
    }
}
