@extends('layout.mainlayout')

@section('title', 'Student Update')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Student Update</h4>
                </div>
                <div class="card-body">
                    <form action="/student/{{$student->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2" for="nama">Name</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$student->nama}}" name="nama" class="form-control form-warning" required id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="nim">Nim</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$student->nim}}" name="nim" class="form-control" required id="nim">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" value="{{$student->email}}" name="email" class="form-control form-warning" required id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="photo">Previous Photo</label>
                            <div class="col-sm-10">
                                @if($student->image != '')
                                <img src="{{asset('storage/photo/'.$student->image)}}" style="border-radius: 50%" width="100px" height="100px" alt="">
                                @elseif($student->gender == 'P')
                                <img src="{{asset('assets/img/cewe.svg')}}" width="100px" height="100px" alt="">
                                @else
                                <img src="{{asset('assets/img/cowo.svg')}}" width="100px" height="150px" alt=""> 
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 mt-2" for="photo">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control" id="photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="class_id">Class</label>
                                <div class="col-sm-10">
                                <select name="class_id" required id="class_id" class="form-control">
                                    <option value="{{$student->class->id}}">{{$student->class->nama_kelas}}</option>
                                        @foreach ($class as $kelaz)
                                            <option value="{{$kelaz->id}}">{{$kelaz->nama_kelas}}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="gender">Gender</label>
                                <div class="col-sm-10">
                                <select name="gender" required id="gender" class="form-control">
                                <option value="{{$student->gender}}">{{$student->gender}}</option>
                                    @if ($student->gender == 'L')
                                        <option value="P">Female</option>
                                    @else
                                    <option value="L">Male</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                        <button class="btn btn-success" type="submit">Update</button>
                        <a href="/students" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
            </form>
            </div>
</body>
</html>
@endsection