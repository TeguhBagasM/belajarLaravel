<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\studentCreateRequest;

class studentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $student = student::with('class')
            ->where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nim', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('nama_kelas', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);
        return view('admin/student', ['studentList' => $student]);
        //$student = student::with(['class.waliKelas', 'extracurriculars'])->get();
        //return view('student', ['studentList' => $student]);

        // query builder
        // $student = DB::table('students')->get();

        /*query insert
        DB::table('students')->insert([
            'nama' => 'query',
            'class_id' => 1,
            'gender' => 'L',
            'nim' => '91381'

        ]);
        */

        //eloquent insert
        /*student::create([
            'nama' => 'eloquent',
            'class_id' => 2,
            'gender' => 'L',
            'nim' => '118822'
        ]);
        */
        //eloquent
        //$student = student::all();
        //dd($student);

        //update quert
        /*
        DB::table('students')->where('id', 1)->update([
            'nama' => 'teguh',
            'class_id' => 2
        ]);
        */
        /*student::find(3)->update([
            'nama' => 'epip',
            'class_id' => 1
        ]);
        */
        //delete query
        //DB::table('students')->where('id', 6)->delete();
        //delete eloquent studentnya dari model
        //student::find(5)->delete();

    }
    public function show($id)
    {
        $student = student::with(['class.waliKelas', 'extracurriculars'])
            ->findOrFail($id);
        return view('admin/student-detail', ['studentShow' => $student]);
    }
    public function create()
    {
        $class = Classroom::select('id', 'nama_kelas')->get();
        return view('admin/student-add', ['class' => $class]);
    }

    public function store(studentCreateRequest $request)
    {
        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nim . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);
        }
        $request['image'] = $newName;
        $student = student::create($request->all());
        if ($student) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New Student Success');
        }
        return redirect('students');
        /* cara lama
        $student = new student;
        $student->nama = $request->nama;
        $student->class_id = $request->class_id;
        $student->gender = $request->gender;
        $student->nim = $request->nim;
        $student->save();
        */
    }
    public function ubah(Request $request, $id)
    {
        $student = student::with('class')->findOrFail($id);
        $class = Classroom::where('id', '!=', $student->class_id)->get(['id', 'nama_kelas']);
        return view('admin/student-ubah', ['student' => $student, 'class' => $class]);
    }
    public function update(Request $request, $id)
    {
        $student = student::findOrFail($id);
        $oldPhoto = $student->image;
        $file_path = '/photo/' . $oldPhoto;

        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $strName = preg_replace('/\s+/', '', $request->nim);
            $newName = strtolower($strName) . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);

            $request['image'] = $newName;
            if (isset($oldPhoto) || $oldPhoto != '') {
                if (Storage::exists($file_path)) {
                    Storage::delete($file_path);
                } else {
                    dd('file not found');
                    // Session::flash('nothing', 'success');
                    // Session::flash('messageN', 'File Not Found');
                }
            }
        } else {
            $request['image'] = $oldPhoto;
        }
        $student->update($request->all());
        if ($student) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Update Student Success');
        }
        return redirect('students');
    }

    // public function delete($id)
    // {
    //     $student = student::findOrFail($id);
    //     return view('student-delete', ['student' => $student]);
    // }

    public function destroy($id)
    {
        $deleteStudent = student::findOrFail($id);
        $deleteStudent->delete();
        Storage::delete('photo/' . $deleteStudent->image);

        if ($deleteStudent) {
            Session::flash('status2', 'success');
            Session::flash('message2', 'Delete Student Success');
        }

        return redirect('students');
    }
}
