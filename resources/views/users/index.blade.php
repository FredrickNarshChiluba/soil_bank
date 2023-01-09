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
    @include('site.Purchase.Emplo.header')
    @include('site.Purchase.Emplo.sidebar')
     
    <main class="app-content" id="app">
<div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <div class="text-center profile-image">
                        <label style='margin-left:60px' class="" for=""><img width="90px" height="90px" src="{{ asset(Auth::user()->url) }}"></label>
                        <input type="FILE" class="form-control @error('PHOTO') is-invalid @enderror" name="PHOTO" id="PHOTO" >

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <p class="text-info text-center mt-4">{{Auth::user()->name}}</p>
                        <h3 class="text-primary text-center"><span class="badge badge-primary"></span></h3>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-body">                        
                        <form class="form-layout form-layout-1" action="{{route('users.index.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                            <label class="control-label" for="name">Name</label>
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                type="text"
                                placeholder="Enter employee name"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                            />

                            <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-2">
                            <label class="control-label" for="address">ADDRESS</label>
                            <input
                                class="form-control @error('address') is-invalid @enderror"
                                type="text"
                                placeholder="Enter address"
                                id="address"
                                name="address"
                                value="{{ old('address', $user->address) }}"
                            />
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('address') <span>{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-2">
                            <label class="control-label" for="Contact">Contact</label>
                            <input
                                class="form-control @error('Contact') is-invalid @enderror"
                                type="text"
                                placeholder="Enter  field unit"
                                id="Contact"
                                name="Contact"
                                value="{{ old('Contact', $user->Phone) }}"
                            />
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('Contact') <span>{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mb-2">
                            <label class="control-label" for="email">EMAIL</label>
                            <input
                                class="form-control @error('email') is-invalid @enderror"
                                type="text"
                                placeholder="Enter user email"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                            />
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                            </div>
                            </div>
                            
                            <div class="form-group mb-2">
                                <label class="form-control-label">photo:</label>                                
                                <label class="custom-file wd-100p">
                                    <input type="file" name="picture" id="file2" class="file-input-styled" accept="image/*">
                                </label>
                            </div> 
                            
                            <div class="form-layout-footer text-right mt-5">
                                <button type="submit" class="btn btn-primary tx-20"><i class="fa fa-floppy-o mr-2"></i> {{__('page.save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
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