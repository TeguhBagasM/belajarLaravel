@extends('layout.mainlayout')

@section('title', 'UKM Detail')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">UKM Detail</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (Session::has('status1'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('massage1')}}
                            </div>
                        @elseif (Session::has('status2'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('massage2')}}
                            </div>
                        @endif
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-dark text-light">
                                <tr class="text-center">
                                    <th>UKM Name</th>
                                    <th>Member</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{$ekskulShow->name}}</td>
                                    <td>
                                        @foreach ($ekskulShow->students as $ekskul)
                                                - {{$ekskul->nama}} <br>
                                        @endforeach
                                    </td>
                                    {{-- <td><a href="member-destroy/{{$data->id}}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td> --}}
                                </tr>
                                
                            </tbody>
                        </table>
                        <a href="/extracurricular" class="btn btn-secondary float-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection