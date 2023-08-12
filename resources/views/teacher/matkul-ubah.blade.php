@extends('layout.mainlayout')

@section('title', 'Subjects Update')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Subjects Update</h4>
                </div>
                <div class="card-body">
        <form action="/matkul/{{$matkul->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2" for="nama">Subjects</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$matkul->name}}" name="name" class="form-control form-warning" required id="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2" for="teacher_id">Teacher</label>
                    <div class="col-sm-10">
                    <select name="teacher_id" required id="teacher_id" class="form-control">
                        <option value="{{$matkul->teacher->id}}">{{$matkul->teacher->name}}</option>
                            @foreach ($teacher as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button class="btn btn-success" type="submit">Update</button>
                    <a href="/classroom" class="btn btn-secondary">Back</a>
                </div>
            </div>
</form>
</div>
</body>
</html>
@endsection