@extends('layout.mainlayout')

@section('title', 'Add New Student')

@section('content')
<div class="container-fluid">
        <div class=" row mb-5 mt-5 pt-2">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="float-left font-weight-bold text-dark pt-2">Add New Student</h4>
                    </div>
                    <div class="card-body"> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="student" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label class="col-sm-2" for="nama">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control form-control-warning" id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="nim">Nim</label>
                            <div class="col-sm-10">
                                <input type="number" name="nim" class="form-control form-control-warning" id="nim">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control form-control-warning" id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="photo">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control" id="photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="class_id">Class</label>
                                <div class="col-sm-10">
                                    <select name="class_id" id="class_id" class="form-control">
                                        <option value="" disable>Select one</option>
                                            @foreach ($class as $kelas)
                                                <option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="gender">Gender</label>
                                <div class="col-sm-10">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" disable>Select one</option>
                                        <option value="L">Male</option>
                                        <option value="P">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                <div class="float-right">
                                    <a href="students" class="btn btn-secondary">Back</a>
                                </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection