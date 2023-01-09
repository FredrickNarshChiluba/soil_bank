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
                                    <th> Name </th>
                                    <th> Category </th>
                                    <th > Duration </th>
                                    <th > Deadline </th>


                                    <th > TAsk Name </th>
                                   <th > TAsk D</th> 
                                     <th > Date Of Creation </th> 
                                    <!-- <th>Company Size</th> -->
                                    <th style="width:50px; min-width:50px;" class=" text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                     @foreach($categories as $employ)
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

                                    @foreach($Category as $Categor)
                                    @if($Categor->id == $employ->categories_id)
                                    <td>{{ $Categor->name }}</td>
                                    @endif
                                    @endforeach
                                    <td>@foreach($Category as $Categor)
                                    @if($Categor->id == $employ->categories_id)
                                    {{ $Categor->name }}
                                    @endif
                                    @endforeach
                                </td>

                                    <td>{{ $diff_in_days }}</td>
                                    <td>{{ $employ->end }}</td>
                                    @foreach($attributes as $attribut)

                                    @if($attribut->categories_id == $employ->id)
                                    <td>{{ $attribut->name }}</td>


                                    <td>{{ $employ->CompanyDescription }}</td>
                                    @endif
                                    @endforeach
                                    <td>@foreach($attributes as $attribut)

                                    @if($attribut->categories_id == $employ->id)
                                    {{ $attribut->name }}
                                    @endif
                                    @endforeach
                                </td>
                                    <!-- <td>me</td> -->
                                    <td class="">
                                        @if ($attribut->status == 1)
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
