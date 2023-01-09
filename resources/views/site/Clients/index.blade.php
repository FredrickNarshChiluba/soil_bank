@extends('site.Employee')
@section('title') CLIENT @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> CLIENT</h1>
            <p>-CLIENT INFORMATION</p>
        </div>
       
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
                            <th> NAME </th>
                            <th class="text-center">EMAIL </th>
                            <th class="text-center"> ADDRESS </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <th> PHONE </th>
                            
                            <th class="text-center"> image </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->email }}</td>
                                    <td>{{ $employ->address }}</td>
                                    <td>{{ $employ->Phone }}</td>
                                    <!-- <td>{{ $employ->url }}</td> -->
                                    <td><img src=""  class="img-thumbnail" width="75" />photo</td>
                                    
                                  
                                    <!-- <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group"> -->
                                            <!-- <a href="{{ route('site.Employees.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a> -->
                                            <!-- <a href="{{ route('site.Employees.edit', $employ->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                                        <!-- </div>
                                    </td> -->
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
