@extends('site.Employee')
@section('title') FARMERS @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> FARMERS</h1>
            <!-- <p>-Create Employee Account</p> -->
        </div>
        <!-- <a href="{{ route('site.Farmer.create') }}" class="btn btn-primary pull-right">Add Employee</a> -->
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
                            <th>FARMER NAME </th>
                            <th class="text-center">FARMER EMAIL </th>
                            <th class="text-center">FARMER ADDRESS </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <!-- <th>FARMER PHONE </th> -->
                            
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->email }}</td>
                                    <td>{{ $employ->address }}</td>
                                   
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('site.Farmer.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a>&nbsp;
                                            <a href="{{ route('site.Farmer.delete', $employ->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash">DELETE</i></a>
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
