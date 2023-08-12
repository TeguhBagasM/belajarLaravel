@extends('layout.mainlayout')

@section('title', 'Classroom Detail')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Classroom Detail</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-dark text-light">
                                <tr class="text-center">
                                    <th>Class Name</th>
                                    <th>Teacher</th>
                                    <th>Students</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{$classShow->nama_kelas}}</td>
                                    <td>{{$classShow->waliKelas->name}}</td>
                                    <td>
                                        @foreach ($classShow->students as $kelas)
                                            - {{$kelas->nama}} <br>
                                        @endforeach
                                    </td>
                                </tr>
                                                
                            </tbody>
                        </table>
                        <a href="/classroom" class="btn btn-secondary float-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection