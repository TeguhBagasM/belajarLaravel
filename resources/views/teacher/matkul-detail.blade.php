@extends('layout.teacherlayout')

@section('title', 'Subjects Detail')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Subjects Detail</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-dark text-light">
                                <tr class="text-center">
                                    <th>Subjects</th>
                                    <th>Teacher</th>
                                    <th>SKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{$matkulShow->name}}</td>
                                    <td>{{$matkulShow->teacher->name}}</td>
                                    <td>{{$matkulShow->sks}}</td>
                                </tr>
                                                
                            </tbody>
                        </table>
                        <a href="/matkul" class="btn btn-secondary float-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection