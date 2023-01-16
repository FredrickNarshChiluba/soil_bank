@extends('site.Employee')
@section('title') Land @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Land</h1>
            <p>Save Land Details</p>
        </div>
        <div style="margin-left:190px">
        <a href="{{ route('site.Soil.index') }}" class="btn btn-primary">Soil Sample details</a>
        </div>
        <a href="{{ route('site.Land.create') }}" class="btn btn-primary pull-right">Add Soil Sample details</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <!-- <th> # </th> -->
                            <th> SOIL TYPE </th>
                            <th class="text-center">X CORDINATE LOCATION</th>
                            <th class="text-center">Y CORDINATE LOCATION </th>
                            <th class="text-center"> LOCATION DISTRICT </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <th> FARMER NAME </th>
                            
                            <th class="text-center"> FARMER CONTACT </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->Soil_type }}</td>
                                    <td>{{ $employ->x_cordinate_lat }}</td>
                                    <td>{{ $employ->y_cordinate_long }}</td>
                                    <td>{{ $employ->land_location_district }}</td>
                                    <td>{{ $employ->farmer_name }}</td>
                                    <td>{{ $employ->farmer_contact }}</td>
                                    
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('site.Land.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a>
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
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
