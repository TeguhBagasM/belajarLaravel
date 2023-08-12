@extends('layout.mainlayout')

@section('title', 'Students List')

@section('content')
        <div class="container-fluid">
            <div class=" row mb-5 mt-5 pt-2">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="float-left font-weight-bold text-dark pt-2">Students List</h4>
                            <a href="/student-add" class=" p-2 btn btn-sm btn-dark text-white float-right">Add New Student</a>
                        </div>
                        <div class="mt-4 col-12 col-sm-6 col-md-4">
                            <form action="" method="get">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..." name="keyword" class="form-control">
                                    <button class="btn btn-primary"><i class="fa fa-search text-light"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (Session::has('status1'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message1')}}
                                    </div>
                                @elseif (Session::has('status2'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('message2')}}
                                    </div>
                                @endif
                                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-light">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Nim</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($studentList as $data)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->nim}}</td>
                                            <td>{{$data->class->nama_kelas}}</td>
                                            <td>
                                                @if ($data->gender == 'L')
                                                   <i class="fa fa-male"></i> Male
                                                @else
                                                    <i class="fa fa-female"></i> Female
                                                @endif
                                            </td>
                                            <td>
                                                <a href="student/{{$data->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="student-ubah/{{$data->id}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="student-destroy/{{$data->id}}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-5">
                                {{$studentList->withQueryString()->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
@endsection