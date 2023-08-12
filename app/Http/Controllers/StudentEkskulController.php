<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\StudentEkskul;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;

class StudentEkskulController extends Controller
{
    // public function index()
    // {
    //     $studentEkskul = StudentEkskul::with('students')->get();
    //     return view('admin/member-ukm', ['member' => $studentEkskul]);
    //     //$class = Classroom::with('students', 'waliKelas')->get();
    //     //return view('classroom', ['classList' => $class]);
    // }
    public function create()
    {
        $ekskul = Extracurricular::select('id', 'name')->get();
        $student = student::select('id', 'nama', 'nim')->get();
        return view('admin/student-ekskul-add', ['student' => $student, 'ekskul' => $ekskul]);
    }
    public function store(Request $request)
    {
        $ekskul = StudentEkskul::create($request->all());
        if ($ekskul) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New Member Success');
        }
        return redirect('extracurricular');
    }
    public function destroy($id)
    {
        $deleteMember = StudentEkskul::findOrFail($id);
        $deleteMember->delete();

        if ($deleteMember) {
            Session::flash('status2', 'success');
            Session::flash('message2', 'Delete Member Success');
        }

        return redirect('ekskul-detail');
    }
}
