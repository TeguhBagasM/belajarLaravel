@extends('layout.mainlayout')

@section('title', 'Add New Member')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Add New Member</h4>
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
        <form action="student-ekskul" method="post">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2" for="student_id">Student</label>
                    <div class="col-sm-10">
                        <select name="student_id" id="student_id" class="form-control">
                            <option value="" disable>Select one</option>
                                @foreach ($student as $bagmar)
                                    <option value="{{$bagmar->id}}">{{$bagmar->nama}} - {{$bagmar->nim}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            <div class="form-group row">
                <label class="col-sm-2" for="extracurricular_id">UKM</label>
                <div class="col-sm-10">
                <select name="extracurricular_id" id="extracurricular_id" class="form-control">
                    <option disable>Select one</option>
                    @foreach ($ekskul as $bagmar)
                        <option value="{{$bagmar->id}}">{{$bagmar->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="extracurricular" class="btn btn-secondary">Back</a>
            </div>
        </div>
</form>
</div>
</body>
</html>
@endsection