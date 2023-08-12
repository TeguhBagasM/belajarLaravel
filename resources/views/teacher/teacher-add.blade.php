@extends('layout.teacherlayout')

@section('title', 'Add New Teacher')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Add New Teacher</h4>
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
        <form action="teacher" method="post">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control form-control-warning" id="name">
                </div>
            </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="teacher" class="btn btn-secondary">Back</a>
            </div>
        </div>
</form>
</div>
</body>
</html>
@endsection