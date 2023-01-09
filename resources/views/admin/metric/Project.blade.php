@extends('admin.app')
@section('title')  @endsection
@section('content')
    <div class="app-title">
        <div>
            <p>PROJECT METRICS</p>
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
                            <th> Name </th>
                            
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Visulize</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->Metricname }}</td> 
                                    <!-- {{$employ->visualizationlink}}/{{$employ->id}} -->
                                                                      
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{route('admin.metric.summary')}} " class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                           
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
