<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matkul;
use App\Models\student;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\StudentEkskul;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher/teacher', ['teacherList' => $teacher]);
    }

    // function indexTeacher()
    // {
    //     return view('dashboard-teacher');
    // }

    public function indexTeacher()
    {
        $jumlah_teacher = Teacher::all()->count();
        $jumlah_matkul = Matkul::all()->count();
        $jumlah_student = student::all()->count();
        return view('dashboard-teacher')
            ->with('jumlah_teacher', $jumlah_teacher)
            ->with('jumlah_matkul', $jumlah_matkul)
            ->with('jumlah_student', $jumlah_student);
    }

    public function show($id)
    {
        $teacher = Teacher::with(['class', 'matkul'])
            ->findOrFail($id);
        return view('teacher/teacher-detail', ['teacherShow' => $teacher]);
    }

    public function create()
    {
        return view('teacher/teacher-add');
    }

    public function store(Request $request)
    {
        $class = Teacher::create($request->all());
        if ($class) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New Teacher Success');
        }
        return redirect('teacher');
    }

    function ubah(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher/teacher-ubah', ['teacher' => $teacher]);
    }

    function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        if ($teacher) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Update Teacher Success');
        }
        return redirect('teacher');
    }

    function destroy($id)
    {
        $deleteTeacher = Teacher::findOrFail($id);
        $deleteTeacher->delete();

        if ($deleteTeacher) {
            Session::flash('status2', 'success');
            Session::flash('message2', 'Delete Teacher Success');
        }

        return redirect('teacher');
    }
}
