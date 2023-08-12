<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    public function index()
    {
        $class = Classroom::get();
        return view('admin/classroom', ['classList' => $class]);
        //$class = Classroom::with('students', 'waliKelas')->get();
        //return view('classroom', ['classList' => $class]);
    }
    public function show($id)
    {
        $classroom  = Classroom::with('students', 'waliKelas')
            ->findOrFail($id);
        return view('admin/classroom-detail', ['classShow' => $classroom]);
    }

    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('admin/classroom-add', ['teacher' => $teacher]);
    }

    public function store(Request $request)
    {
        $class = Classroom::create($request->all());
        if ($class) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New Class Success');
        }
        return redirect('classroom');
    }
    public function ubah(Request $request, $id)
    {
        $class = Classroom::with('waliKelas')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id', 'name']);
        return view('admin/classroom-ubah', ['class' => $class, 'teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $class = Classroom::findOrFail($id);
        $class->update($request->all());
        if ($class) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Update Class Success');
        }
        return redirect('classroom');
    }

    // public function delete($id)
    // {
    //     $class = Classroom::findOrFail($id);
    //     return view('admin/classroom-delete', ['class' => $class]);
    // }
    public function destroy($id)
    {
        $deleteClass = Classroom::findOrFail($id);
        $deleteClass->delete();

        if ($deleteClass) {
            Session::flash('status2', 'success');
            Session::flash('message2', 'Delete Class Success');
        }

        return redirect('classroom');
    }
}
