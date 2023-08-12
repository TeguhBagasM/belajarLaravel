<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = Matkul::get();
        return view('teacher/matkul', ['matkulList' => $matkul]);
    }

    public function show($id)
    {
        $matkul = Matkul::with('teacher')
            ->findOrFail($id);
        return view('teacher/matkul-detail', ['matkulShow' => $matkul]);
    }

    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('teacher/matkul-add', ['teacher' => $teacher]);
    }

    function store(Request $request)
    {
        $matkul = Matkul::create($request->all());
        if ($matkul) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New Subject Success');
        }
        return redirect('matkul');
    }

    public function ubah(Request $request, $id)
    {
        $matkul = Matkul::with('teacher')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $matkul->teacher_id)->get(['id', 'name']);
        return view('teacher/matkul-ubah', ['matkul' => $matkul, 'teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());
        if ($matkul) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Update Subjects Success');
        }
        return redirect('matkul');
    }

    public function destroy($id)
    {
        $deleteMatkul = Matkul::findOrFail($id);
        $deleteMatkul->delete();

        if ($deleteMatkul) {
            Session::flash('status2', 'success');
            Session::flash('message2', 'Delete Subjects Success');
        }

        return redirect('matkul');
    }
}
