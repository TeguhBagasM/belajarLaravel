@extends('layout.mainlayout')

@section('title', 'Student Details')

@section('content')

<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3"> 
                    <h4 class="float-left font-weight-bold text-dark pt-2">Student Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-center">
                        @if($studentShow->image != '')
                        <img src="{{asset('storage/photo/'.$studentShow->image)}}" style="border-radius: 50%" width="200px" height="200px" alt="">
                        @elseif($studentShow->gender == 'P')
                        <img src="{{asset('assets/img/cewe.svg')}}" class="circle" width="150px" height="150px" alt="">
                        @else
                        <img src="{{asset('assets/img/cowo.svg')}}" class="circle" width="150px" height="150px" alt=""> 
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-dark text-light">
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Nim</th>
                                    <th>Class</th>
                                    <th>Homeroom Teacher</th>
                                    <th>Gender</th>
                                    <th>UKM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{$studentShow->nama}}</td>
                                    <td>{{$studentShow->email}}</td>
                                    <td>{{$studentShow->nim}}</td>
                                    <td>{{$studentShow->class->nama_kelas}}</td>
                                    <td>{{$studentShow->class->waliKelas->name}}</td>
                                    <td>
                                        @if ($studentShow->gender == 'L')
                                        <i class="fa fa-male"></i> Male
                                        @else
                                        <i class="fa fa-female"></i> Female
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($studentShow->extracurriculars as $eskul)
                                        - {{$eskul->name}} <br>
                                        @endforeach
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <a href="/students" class="btn btn-secondary float-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
@endsection