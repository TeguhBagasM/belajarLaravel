<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/fontawesome/css/all.min.css')}}">
    </head>
    <body>
        <body>
            <!-- navbar -->
            <nav class="navbar navbar-expand-md navbar-light">
                <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="mynavbar">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- top nav -->
                            <div class=" col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-3 top-navbar ">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h4 class="text-light text-uppercase mt-5">STMIK Mardira Indonesia</h4>
                                    </div>
        
                                    <h4 class="text-light text-uppercase mt-5">Welcome {{ Auth::user()->role->name }}</h4>
                                </div>
                            </div>
                            <!-- akhir top-nav -->
                            <!-- sidebar -->
                            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark ">
                                <img href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border" src="../../assets/img/logo.jpg" alt="logo" width="110" height="130">
                                <div class="bottom-border mt-n3 pb-2">
                                    <a href="#" class="nav-link text-white text-uppercase sidebar-link text-center">{{ Auth::user()->name }}</a>
                                </div>
                                <ul class="navbar-nav flex-column mt-4">
                                    <li class="nav-item">
                                        <a href="/" class="nav-link text-white p-3 mb-2 current">
                                            <i class="fa fa-home text-light fa-lg mr-3"></i>Home
                                        </a>
                                    </li>
        
                                    <li class="nav-item">
                                        <a class="nav-link text-white p-3 mb-2 current" href="/students">
                                            <i class="fa fa-user-graduate text-light fa-lg mr-3"></i>Students
                                        </a>
                                    </li>
        
                                    <li class="nav-item">
                                        <a href="/classroom" class="nav-link text-white p-3 mb-2 sidebar-link">
                                            <i class="fa fa-university text-light fa-lg mr-3"></i>Class
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        </div>
                                    </li>
        
                                    <li class="nav-item">
                                        <a href="/extracurricular" class="nav-link text-white p-3 mb-2 sidebar-link">
                                            <i class="fa fa-graduation-cap text-light fa-lg mr-3"></i>UKM
                                        </a>
                                    </li>
        
                                    <li class="nav-item">
                                        <a href="/user" class="nav-link text-white p-3 mb-2 sidebar-link">
                                            <i class="fas fa-user text-light fa-lg mr-3"></i>Users
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="/member-ukm" class="nav-link text-white p-3 mb-2 sidebar-link">
                                            <i class="fas fa-user text-light fa-lg mr-3"></i>Member UKM
                                        </a>
                                    </li> --}}
        
                                    <li class="nav-item">
                                        <a href="/logout" class="nav-link text-white p-3 mb-2 sidebar-link" onClick="return confirm('Are You Sure?');">
                                            <i class="fa fa-sign-out text-light fa-lg mr-3"></i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
            <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/daterangepicker.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();
        $("[data-toggle=tooltip]").tooltip();
    });


    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({

            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
</script>
</body>
</html>