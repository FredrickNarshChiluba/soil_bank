<!DOCTYPE html>
<html>
   <head>
   <title>Soil Data</title>
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
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <!-- <th> # </th> -->
                            <th> FIELD NAME </th>
                            <th class="text-center">SOIL TYPE</th>
                            <th class="text-center"> SOIL TEXTURE </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <th> LAND SIZE </th>
                            <th style="width:150px; width:150px;" class="">VIEW DETAILS</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->field_name }}</td>
                                    <td>{{ $employ->Soil_type }}</td>
                                    <td>{{ $employ->Soil_texture }}</td>
                                    <td>{{ $employ->Land_size }}</td>
                                    
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('site.Soil.Client_soil', $employ->id) }}" class="btn btn-sm btn-primary">VIEW</a>
                                            <!-- <a href="{{ route('site.Employees.edit', $employ->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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