<!DOCTYPE html>
<html>
   <head>
   <title>Soil Sample Details</title>
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
   <title>Soil Sample Details</title>
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
    <h3 style='text-align:center;' class="tile-title"><b>Soil Sample details</b></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
               
                <form action="{{ route('site.Soil.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body row">
                    <div class="col-md-6">
                    <input type="hidden" name="id" value="{{ $employee->id }}">

                         <div class="form-group">
                            <label class="control-label" for="Soil_type">Soil Type <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Soil_type') is-invalid @enderror" type="text" name="Soil_type" id="Soil_type" value="{{ old('Soil_type',$employee->Soil_type) }}" readonly/>
                            @error('Soil_type') {{ $message }} @enderror
                        </div>

                        
                        <div class="form-group">
                            <label class="control-label" for="Soil_texture">Soil Texture  <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Soil_texture') is-invalid @enderror" type="text" name="Soil_texture" id="Soil_texture" value="Clay:{{ old('Soil_texture',$employee->Soil_texture_clay) }},  Sand:{{ old('Soil_texture',$employee->Soil_texture_sand) }}, Silt:{{ old('Soil_texture',$employee->Soil_texture_silt) }}"readonly/>
                            @error('Soil_texture') {{ $message }} @enderror
                        </div>
                        <!-- nutrients -->
                        <div class="form-group">
                            <label class="control-label" for="Soil_phps">Soil PH <span class="m-l-5 text-danger"> *</span></label>
                            <input min="6.00" max="7.20" class="form-control @error('Soil_phps') is-invalid @enderror" type="number" name="Soil_phps" id="Soil_phps" value="{{ old('Soil_phps',$employee->Soil_phps) }}"readonly/>
                            @error('Soil_phps') {{ $message }} @enderror

                            <input  class="form-control @error('Soil_php ') is-invalid @enderror" type="hidden" name="Soil_php" id="Soil_php " value='Soil_php' value="{{ old('Soil_php') }}"/>
                            @error('Soil_php ') {{ $message }} @enderror

                            
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Organic_Carbon">Soil Organic Carbon  <span class="m-l-5 text-danger"> *</span></label>
                            <input min="9.60" max="17.00" class="form-control @error('Organic_Carbon') is-invalid @enderror" type="number" name="Organic_Carbon" id="Organic_Carbon" value="{{ old('Organic_Carbon',$employee->Organic_Carbon) }}"readonly/>
                            @error('Organic_Carbon') {{ $message }} @enderror

                            <input class="form-control @error('Organic_Carbon') is-invalid @enderror" type="hidden" name="Organic_Carbons" id="Organic_Carbon" value='Organic_Carbon' value="{{ old('Organic_Carbon') }}"/>
                            @error('Organic_Carbon') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Nitrogen">Soil Nitrogen <span class="m-l-5 text-danger"> *</span></label>
                            <input min="0.90" max="1.00" class="form-control @error('Nitrogen') is-invalid @enderror" type="number" name="Nitrogen" id="Nitrogen" value="{{ old('Nitrogen',$employee->Nitrogen) }}"readonly/>
                            @error('Nitrogen') {{ $message }} @enderror

                            <input  class="form-control @error('Nitrogen') is-invalid @enderror" type="hidden" name="Nitrogens" id="Nitrogen" value='Nitrogen' value="{{ old('Nitrogen') }}"/>
                            @error('Nitrogen') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Phosphorus">Soil Phosphorus  <span class="m-l-5 text-danger"> *</span></label>
                            <input min="0.20" max="0.60" class="form-control @error('Phosphorus') is-invalid @enderror" type="number" name="Phosphorus" id="Phosphorus" value="{{ old('Phosphorus',$employee->Phosphorus) }}"readonly/>
                            @error('Phosphorus') {{ $message }} @enderror

                            <input class="form-control @error('Phosphorus') is-invalid @enderror" type="hidden" name="Phosphoruss" id="Phosphorus" value='Phosphorus' value="{{ old('Phosphorus') }}"/>
                            @error('Phosphorus') {{ $message }} @enderror
                        </div>

                        

                    </div> &nbsp;&nbsp;&nbsp;
                    <div class="col-md" > 

                    <div class="form-group">
                            <label class="control-label" for="Potassium">Soil Potassium (between 1.50-3.00) <span class="m-l-5 text-danger"> *</span></label>
                            <input min="1.50" max="3.00" class="form-control @error('Potassium') is-invalid @enderror" type="number" name="Potassium" id="Potassium" value="{{ old('Potassium',$employee->Potassium) }}" readonly/>
                            @error('Potassium') {{ $message }} @enderror

                            <input  class="form-control @error('Potassium') is-invalid @enderror" type="hidden" name="Potassiums" id="Potassium" value='Potassium' value="{{ old('Potassium') }}"/>
                            @error('Potassium') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Cation_Exchange_Capacity">Soil Cation Exchange Capacity  <span class="m-l-5 text-danger"> *</span></label>
                            <input min="75.00" max="200.00" class="form-control @error('Cation_Exchange_Capacity') is-invalid @enderror" type="number" name="Cation_Exchange_Capacity" id="Cation_Exchange_Capacity" value="{{ old('Cation_Exchange_Capacity',$employee->Cation_Exchange_Capacity) }}"readonly/>
                            @error('Cation_Exchange_Capacity') {{ $message }} @enderror

                            <input  class="form-control @error('Cation_Exchange_Capacity') is-invalid @enderror" type="hidden" name="Cation_Exchange_Capacitys" value='Cation_Exchange_Capacity' id="Cation_Exchange_Capacity" value="{{ old('Cation_Exchange_Capacity') }}"/>
                            @error('Cation_Exchange_Capacity') {{ $message }} @enderror
                        </div>                   

                    <div class="form-group">
                            <label class="control-label" for="field_name">Field Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('field_name') is-invalid @enderror" type="text" name="field_name" id="field_name" value="{{ old('field_name',$employee->field_name) }}"readonly/>
                            @error('field_name') {{ $message }} @enderror
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label" for="Land_size">Land Size <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Land_size') is-invalid @enderror" type="text" name="Land_size" id="Land_size" value="{{ old('Land_size',$employee->Land_size) }}"readonly/>
                            @error('Land_size') {{ $message }} @enderror
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label">Field Unit</label>
                            <input class="form-control @error('field_unit') is-invalid @enderror" type="text" id="field_unit" name="field_unit" value="{{ old('field_unit',$employee->field_unit) }}"readonly/>
                            @error('field_unit') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                        <label class="control-label">land location cordinates</label>
                            <input class="form-control @error('land_location_cordinates') is-invalid @enderror" type="text" id="land_location_cordinates" value="Latitude: {{ old('land_location_cordinates',$employee->x_cordinate_lat) }}, Longitude: {{ old('land_location_cordinates',$employee->y_cordinate_long) }}" name="land_location_cordinates"readonly/>
                            @error('land_location_cordinates') {{ $message }} @enderror
                        </div>
                        <label class="control-label">land location District</label>
                            <input class="form-control @error('land_location_district') is-invalid @enderror" type="text" id="land_location_district" value="{{ old('land_location_district',$employee->land_location_district) }}" name="land_location_district"readonly/>
                            @error('land_location_district') {{ $message }} @enderror
                        </div>

                       
                        

                    </div>
                        
                    </div>
                    <div class="tile-footer">
                    
                    <div  style="margin-left: 420px;">
                        <!-- <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SAVE</button> -->
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('site.Purchase.index1') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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