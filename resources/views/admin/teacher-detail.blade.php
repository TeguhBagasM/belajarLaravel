@extends('layout.mainlayout')

@section('title', 'Teacher Detail')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Teacher Detail</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-dark text-light">
                                <tr class="text-center">
                                    <th>Teacher Name</th>
                                    <th>Teach in Class</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{$teacherShow->name}}</td>
                                    <td>
                                        @if ($teacherShow->class)
                                            {{$teacherShow->class->nama_kelas}}
                                        @else
                                            not homeroom teacher
                                        @endif
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <a href="/teacher" class="btn btn-secondary float-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection