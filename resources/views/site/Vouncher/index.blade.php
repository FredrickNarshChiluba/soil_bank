@extends('site.Employee')
@section('title') Copoun @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i>  Copoun</h1>

             <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
            
        </div>
        <a href="{{ route('site.Vouncher.create') }}" class="btn btn-primary pull-right">Generate Copoun</a>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <!-- <th> # </th> -->
                            <th> COPOUN KEY </th>
                            <th class="text-center">STARTED ON </th>
                            <th class="text-center"> EXPIRY DATE </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <th> PERIOD </th>
                            
                            <!-- <th class="text-center"> FARMER CONTACT </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($usedLicenses as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->coupon_id }}</td>
                                    <!-- <td>{{ $employ->usage_start_date }}</td> -->
                                    <td>{{ $employ->usage_start_date }}</td>
                                    <td>{{ $employ->expiry_date }}</td>
                                    <td>{{ $employ->period }}</td>
                                    
                                  
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
