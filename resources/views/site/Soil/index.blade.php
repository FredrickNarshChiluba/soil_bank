@extends('site.Employee')
@section('title') Land @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Land</h1>
            <p>Save Land Details</p>
        </div>
        <a href="{{ route('site.Land.index') }}" class="btn btn-primary pull-right">Land details</a>
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
                            <th> FIELD NAME </th>
                            <th class="text-center">SOIL TYPE </th>
                            <th> SOIL TEXTURE</th>
                            <th class="text-center"> LAND SIZE </th>
                            <!-- <th class="text-center"> Project Duration </th> -->

                            <th class="text-center"> SOIL COLOR </th>
                                                        
                            <th class="text-center"> SIZE UNIT </th>
                            <th style="width:90px; min-width:90px;" class="text-center text-success">MANAGE</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->field_name }}</td>
                                    <td>{{ $employ->soil_type }}</td>
                                    <td>{{ $employ->soil_texture }}</td>
                                    <td>{{ $employ->land_size }}</td>
                                    <td>{{ $employ->soil_color }}</td>
                                    <td>{{ $employ->field_unit }}</td>
                                    
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('site.Soil.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a>
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
