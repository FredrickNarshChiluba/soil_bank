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
     <h1> Edit Profile</h1>
    <main class="app-content" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
               <form method="post" action="users/2">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <div class="tile-body" style='margin-left:150px'>
    
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
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
        </div>
    </div>
</div>
           
 
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
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
        </div>
    </div>
</div>
                                   
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
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
        </div>
    </div>
    
</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
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
        </div>
        
    </div>
    
</div>

<div class="" style='margin-left:140px'>
    <div class="col-md-6">
    <div class="input-group">
            <div class="form-group">
                <label style='margin-left:60px' class="" for=""><img width="90px" height="90px" src="{{ asset(Auth::user()->url) }}"></label>
                <input type="FILE" class="form-control @error('PHOTO') is-invalid @enderror" name="PHOTO" id="PHOTO" >

                @error('message')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>

            <div class="invalid-feedback active">
            <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
</div>

</div>

<div class="tile-footer">
<div class="row d-print-none mt-2">
    <div class="col-12 text-center">
        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save changes</button>
       
    </div>
</div>
</div>
</form>

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