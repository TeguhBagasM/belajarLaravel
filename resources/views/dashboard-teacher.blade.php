@extends('layout.teacherlayout')

@section('title', 'Teacher')

@section('content')

<div class="container-fluid">
    <div class="row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto mt-5">
          {{-- @if (Session::has('statusLog'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('massageLog')}}
                    </div>
                @endif --}}
                <h2 class="text-center">Dashboard</h2>
                <div class="row pt-md-2 mt-md-5 mb-5">
                  <div class="col-lg-4 col-sm-6">
                      <div class="hal-dashboard rounded pt-3">
                        <div class="p-4 text-center">
                          <i class="fa fa-3x fa-user-graduate text-warning mb-4"></i>
                          <h5>Student</h5>
                          <h3 class="flex-shrink-0 display-6 text-warning mb-0">{{ $jumlah_student }}</h3>
                        </div>
                      </div>
                    </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="hal-dashboard rounded pt-3">
                        <div class="p-4 text-center">
                          <i class="fa fa-3x fa-user-graduate text-warning mb-4"></i>
                          <h5>Teacher</h5>
                          <h3 class="flex-shrink-0 display-6 text-warning mb-0">{{ $jumlah_teacher }}</h3>
                        </div>
                      </div>
                    </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="hal-dashboard rounded pt-3">
                        <div class="p-4 text-center">
                          <i class="fa fa-3x fa-book text-warning mb-4"></i>
                          <h5>Matkul</h5>
                          <h3 class="flex-shrink-0 display-6 text-warning mb-0">{{ $jumlah_matkul }}</h3>
                        </div>
                      </div>
                    </div>
                
                </div>
        </div>
    </div>
</div>
    @endsection
