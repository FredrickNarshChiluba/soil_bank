<!DOCTYPE html>
<html>
   <head>
   <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
   <script>
    function autoRefresh()
    {
        window.location = window.location.href="/Client_based";
    }
    // 60*60*1000
    var time=500000000;
     setInterval('autoRefresh()',time );
    </script>
   <title>@yield('title') - {{ config('app.name') }}</title>
      <meta http-equiv = "refresh"  content =" url = '/Client_based'" />
      <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
   </head>
   <body>
   <body class="app sidebar-mini rtl">
   @include('site.Emplo.header')
   @include('site.Emplo.sidebar')
     
    <main class="app-content" id="app">
    <div class="row">
                <div class="col-sm-12">
                    <h3 class="pull-left page-title"><i class="fa fa-user"></i> change password</h3>
                    
                </div>
            </div>    
        
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <div class="text-center profile-image">
                            <img src="@if($user->url){{asset($user->url)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" class="rounded-circle" alt="">
                        </div>
                        <p class="text-info text-center mt-4">{{$user->name}} </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-body">                        
                        <form class="form-layout form-layout-1" action="{{url('/user/change_password/post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group mb-2">
                                <label class="form-control-label">Passoword: <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-control-label">Confirm password: <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="{{__('page.confirm_password')}}">
                            </div>
                            <div class="form-layout-footer text-right mt-5">
                                <button type="submit" class="btn btn-primary tx-20"><i class="fa fa-floppy-o mr-2"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    </script>
    
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    @stack('scripts')
    
</body>
<div class="align-items-center" id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy; E-SOIL DATA BANK {{now()->format( 'Y')}}
                <!-- </div> -->
                <!-- <div> -->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
                <div > <a target="_blank" href="https://billbrain.tech/">powered by Billbrain techenologies ltd</a>
               </div>
            </div>
        </div>
    </footer>
    </div>
</html>