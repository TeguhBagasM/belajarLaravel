<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\StudentEkskul;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekskul = Extracurricular::with('students')->get();
        return view('admin/extracurricular', ['ekskulList' => $ekskul]);
    }

    public function show($id)
    {
        $extracurricular  = Extracurricular::with('students')
            ->findOrFail($id);
        return view('admin/ekskul-detail', ['ekskulShow' => $extracurricular]);
    }
    public function create()
    {
        return view('admin/ekskul-add');
    }

    public function store(Request $request)
    {
        $class = Extracurricular::create($request->all());
        if ($class) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New UKM Success');
        }
        return redirect('extracurricular');
    }
    public function ubah(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('admin/ekskul-ubah', ['ekskul' => $ekskul]);
    }

    public function update(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        $ekskul->update($request->all());
        if ($ekskul) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Update UKM Success');
        }
        return redirect('extracurricular');
    }

    public function destroy($id)
    {
        $deleteEkskul = Extracurricular::findOrFail($id);
        $deleteEkskul->delete();

        if ($deleteEkskul) {
            Session::flash('status2', 'success');
            Session::flash('message2', 'Delete UKM Success');
        }

        return redirect('extracurricular');
    }
}
