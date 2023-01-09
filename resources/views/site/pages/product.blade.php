@extends('site.Employee')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
   
        </div>
        @include('admin.partials.flash')
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        
                                                       

                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                                               <tr>
                                    <th > TAsk Name </th>
                                    
                                    <th >TAsk Duration </th>
                                    <th > Deadline Date </th>
                                    <th> Status </th>

                                    <th style="width:50px; min-width:50px;" class=" text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attributes as $employ)
                                <tr></tr>

                                
                               <!--  <tr>
                                    <td>
                                        @foreach($categories as $category)
                                                @if($category->id == $employ->product_id)
                                                 <td>{{ $category->name }}</td>
                                                        @endif

                                            @endforeach
                                    </td>
                                </tr> -->
                               
                                <tr>
                                     
                                     
                                                @if($employee == $employ->employee_id)
                                @php

                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $employ->end);
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $employ->start);
                                $diff_in_days = $to->diffInDays($from);

                                $start_date=\Carbon\Carbon::parse($employ->start);
                                $end_date=\Carbon\Carbon::parse($employ->end);
                                $result = $start_date->diffInDays($end_date, false);

                                $now =now();
                                $diff = $now->diffInDays($employ->end);

                                $employee = Auth::user()->id;

                                @endphp

                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $diff_in_days }}</td>
                                    <td>{{ $employ->end }}</td>
                                   
                                    <!-- <td>me</td> -->
                                    <td class="">
                                        @if ($employ->status == 1)
                                        <span class="badge badge-success">Done</span>
                                        @else
                                        <span class="badge badge-danger">Pending</span>
                                        @endif

                                        

                                                        


                                        
                                    </td>
                                    <td >
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Work on project</a>
                                        </div>
                                    </td>
                                </tr>
                                 @endif
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
