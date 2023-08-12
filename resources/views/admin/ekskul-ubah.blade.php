@extends('layout.mainlayout')

@section('title', 'UKM Update')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">UKM Update</h4>
                </div>
                <div class="card-body">
        <form action="/ekskul/{{$ekskul->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$ekskul->name}}" name="name" class="form-control form-warning" required id="name">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button class="btn btn-success" type="submit">Update</button>
                    <a href="/extracurricular" class="btn btn-secondary">Back</a>
                </div>
            </div>
</form>
</div>
</body>
</html>
@endsection