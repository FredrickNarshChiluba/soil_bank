@extends('site.Employee')
@section('title')ADD LAND @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-pen"></i>Edit Land Details</h1>
    </div>
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
</div>
@include('admin.partials.flash')
<div class="">
    <div class="">
        <div class="tile">
            <h3 class="tile-title"></h3>
            <form action="{{ route('site.Soil.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body row">
                    <div class="col-md-6">
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="form-group">
                            <label class="control-label" for="Sample_ID">Sample ID <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Sample_ID') is-invalid @enderror" type="text" name="Sample_ID" id="Sample_ID" value="{{ old('Sample_ID',$employee->Sample_ID) }}" />
                            @error('Sample_ID') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Soil_type">Soil Type <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Soil_type') is-invalid @enderror" type="text" name="Soil_type" id="Soil_type" value="{{ old('Soil_type',$employee->Soil_type) }}" />
                            @error('Soil_type') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="soil_color">Soil Color <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('soil_color') is-invalid @enderror" type="text" name="soil_color" id="soil_color" value="{{ old('soil_color',$employee->soil_color) }}" />
                            @error('soil_color') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Soil_texture_sand">Soil Texture(Sand) <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Soil_texture_sand') is-invalid @enderror" type="text" name="Soil_texture_sand" id="Soil_texture_sand" value="{{ old('Soil_texture_sand',$employee->Soil_texture_sand) }}" />
                            @error('Soil_texture_sand') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Soil_texture_clay">Soil Texture(Clay) <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Soil_texture_clay') is-invalid @enderror" type="text" name="Soil_texture_clay" id="Soil_texture_clay" value="{{ old('Soil_texture_clay',$employee->Soil_texture_clay) }}" />
                            @error('Soil_texture_clay') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Soil_texture_silt">Soil Texture(Silt) <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Soil_texture_silt') is-invalid @enderror" type="text" name="Soil_texture_silt" id="Soil_texture_silt" value="{{ old('Soil_texture_silt',$employee->Soil_texture_silt) }}" />
                            @error('Soil_texture_silt') {{ $message }} @enderror
                        </div>
                        <!-- nutrients -->
                        <div class="form-group">
                            <label class="control-label" for="Soil_phps">Soil PHP <span class="m-l-5 text-danger"> *</span></label>
                            <input min="6.00" max="7.20" class="form-control @error('Soil_phps') is-invalid @enderror" type="number" name="Soil_phps" id="Soil_phps" value="{{ old('Soil_phps',$employee->Soil_phps) }}" />
                            @error('Soil_phps') {{ $message }} @enderror

                            <input class="form-control @error('Soil_php ') is-invalid @enderror" type="hidden" name="Soil_php" id="Soil_php " value='Soil_php' value="{{ old('Soil_php') }}" />
                            @error('Soil_php ') {{ $message }} @enderror


                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Organic_Carbon">Soil Organic Carbon <span class="m-l-5 text-danger"> *</span></label>
                            <input min="9.60" max="17.00" class="form-control @error('Organic_Carbon') is-invalid @enderror" type="number" name="Organic_Carbon" id="Organic_Carbon" value="{{ old('Organic_Carbon',$employee->Organic_Carbon) }}" />
                            @error('Organic_Carbon') {{ $message }} @enderror

                            <input class="form-control @error('Organic_Carbon') is-invalid @enderror" type="hidden" name="Organic_Carbons" id="Organic_Carbon" value='Organic_Carbon' value="{{ old('Organic_Carbon') }}" />
                            @error('Organic_Carbon') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Nitrogen">Soil Nitrogen <span class="m-l-5 text-danger"> *</span></label>
                            <input min="0.90" max="1.00" class="form-control @error('Nitrogen') is-invalid @enderror" type="number" name="Nitrogen" id="Nitrogen" value="{{ old('Nitrogen',$employee->Nitrogen) }}" />
                            @error('Nitrogen') {{ $message }} @enderror

                            <input class="form-control @error('Nitrogen') is-invalid @enderror" type="hidden" name="Nitrogens" id="Nitrogen" value='Nitrogen' value="{{ old('Nitrogen') }}" />
                            @error('Nitrogen') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Phosphorus">Soil Phosphorus <span class="m-l-5 text-danger"> *</span></label>
                            <input min="0.20" max="0.60" class="form-control @error('Phosphorus') is-invalid @enderror" type="number" name="Phosphorus" id="Phosphorus" value="{{ old('Phosphorus',$employee->Phosphorus) }}" />
                            @error('Phosphorus') {{ $message }} @enderror

                            <input class="form-control @error('Phosphorus') is-invalid @enderror" type="hidden" name="Phosphoruss" id="Phosphorus" value='Phosphorus' value="{{ old('Phosphorus') }}" />
                            @error('Phosphorus') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Potassium">Soil Potassium (between 1.50-3.00) <span class="m-l-5 text-danger"> *</span></label>
                            <input min="1.50" max="3.00" class="form-control @error('Potassium') is-invalid @enderror" type="number" name="Potassium" id="Potassium" value="{{ old('Potassium',$employee->Potassium) }}" />
                            @error('Potassium') {{ $message }} @enderror

                            <input class="form-control @error('Potassium') is-invalid @enderror" type="hidden" name="Potassiums" id="Potassium" value='Potassium' value="{{ old('Potassium') }}" />
                            @error('Potassium') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Cation_Exchange_Capacity">Soil Cation Exchange Capacity <span class="m-l-5 text-danger"> *</span></label>
                            <input min="75.00" max="200.00" class="form-control @error('Cation_Exchange_Capacity') is-invalid @enderror" type="number" name="Cation_Exchange_Capacity" id="Cation_Exchange_Capacity" value="{{ old('Cation_Exchange_Capacity',$employee->Cation_Exchange_Capacity) }}" />
                            @error('Cation_Exchange_Capacity') {{ $message }} @enderror

                            <input class="form-control @error('Cation_Exchange_Capacity') is-invalid @enderror" type="hidden" name="Cation_Exchange_Capacitys" value='Cation_Exchange_Capacity' id="Cation_Exchange_Capacity" value="{{ old('Cation_Exchange_Capacity') }}" />
                            @error('Cation_Exchange_Capacity') {{ $message }} @enderror
                        </div>

                    </div> &nbsp;&nbsp;&nbsp;
                    <div class="col-md">

                        <div class="form-group">
                            <label class="control-label" for="field_name">Field Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('field_name') is-invalid @enderror" type="text" name="field_name" id="field_name" value="{{ old('field_name',$employee->field_name) }}" />
                            @error('field_name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Land_size">Land Size <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Land_size') is-invalid @enderror" type="text" name="Land_size" id="Land_size" value="{{ old('Land_size',$employee->Land_size) }}" />
                            @error('Land_size') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Field Unit</label>
                            <input class="form-control @error('field_unit') is-invalid @enderror" type="text" id="field_unit" name="field_unit" value="{{ old('field_unit',$employee->field_unit) }}" />
                            @error('field_unit') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">land location district</label>
                            <input class="form-control @error('land_location_district') is-invalid @enderror" type="text" id="land_location_district" value="{{ old('land_location_district',$employee->land_location_district) }}" name="land_location_district" />
                            @error('land_location_district') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">X cordinate Latitude</label>
                            <input class="form-control @error('x_cordinate_lat') is-invalid @enderror" type="text" id="x_cordinate_lat" value="{{ old('x_cordinate_lat',$employee->x_cordinate_lat) }}" name="x_cordinate_lat" />
                            @error('x_cordinate_lat') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Y cordinate Longitude</label>
                            <input class="form-control @error('y_cordinate_long') is-invalid @enderror" type="text" id="y_cordinate_long" value="{{ old('y_cordinate_long',$employee->y_cordinate_long) }}" name="y_cordinate_long" />
                            @error('y_cordinate_long') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Farmer Name</label>
                            <input class="form-control @error('farmer_name') is-invalid @enderror" type="text" id="farmer_name" name="farmer_name" value="{{ old('farmer_name',$employee->farmer_name) }}" />
                            @error('farmer_name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="farmer_email">Farmer Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="email" name="farmer_email" id="farmer_email" value="{{ old('farmer_email',$employee->farmer_email) }}" />
                            @error('farmer_email') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label">Farmer Address</label>
                            <input class="form-control @error('farmer_address') is-invalid @enderror" type="text" id="farmer_address" name="farmer_address" value="{{ old('farmer_address',$employee->farmer_address) }}" />
                            @error('farmer_address') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">Farmer Contact</label>
                            <input class="form-control @error('farmer_contact') is-invalid @enderror" type="text" id="farmer_contact" name="farmer_contact" value="{{ old('farmer_contact',$employee->farmer_contact) }}" />
                            @error('farmer_contact') {{ $message }} @enderror
                        </div>

                    </div>

                </div>
                <div class="tile-footer">

                    <div style="margin-left: 420px;">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SAVE</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('site.Land.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush