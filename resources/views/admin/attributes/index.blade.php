@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> CREATE TASKS</h1>
            <p>
                <!-- {{ $subTitle }} -->List of all TASKS
            </p>
        </div>
        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary pull-right">Add TASKS</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> Task Name </th>
                            <th> Project </th>
                            <th class="text-center"> Deadline </th>
                            <th class="text-center"> Assined To </th>
                            <th class="text-center"> Status </th>
                            
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->name }}</td>

                                   
                                    
                                     @foreach($categories as $category)
                                                @if($category->id == $attribute->product_id)
                                                 <td>{{ $category->name }}</td>
                                                        @endif

                                            @endforeach    

                                            
                                    <!-- <td>{{ $attribute->price }}</td> -->
                                    <td>{{ $attribute->end }}</td>
                                   @foreach($employee as $employ)
                                                @if($employ->id == $attribute->employee_id)
                                                 <td>{{ $employ->name }}</td>
                                                        @endif

                                                        

                                            @endforeach 
                                  <!--   <td class="text-center">
                                        @if ($attribute->is_filterable == 1)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td> -->
                                    <td class="text-center">
                                        @if ($attribute->status == 1)
                                            <span class="badge badge-success">Done</span>
                                        @else
                                            <span class="badge badge-danger">Waiting</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.attributes.delete', $attribute->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
