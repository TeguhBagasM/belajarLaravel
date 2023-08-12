@extends('layout.mainlayout')

@section('title', 'User List')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">User List</h4>
                    <a href="/user-add" class="btn btn-dark float-right mb-2 ml-5">Add New User</a>
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
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userList as $data)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td><a href="user-detail/{{$data->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="user-ubah/{{$data->id}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="user-destroy/{{$data->id}}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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