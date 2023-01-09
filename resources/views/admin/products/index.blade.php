@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')


    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add Product</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th> Category </th>
                            <th> Budget </th>
                            <th class="text-center"> Deadline </th>
                            <th class="text-center"> Time(DAYS) </th>
                            <th class="text-center"> Left Days </th>
                            <td>Status</td>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                    @php
                                     
                                        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $product->end);
                                        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $product->start);
                                        $diff_in_days = $to->diffInDays($from);

                                        $start_date=\Carbon\Carbon::parse($product->start);
                                        $end_date=\Carbon\Carbon::parse($product->end);
                                         $result = $start_date->diffInDays($end_date, false);

                                        $now =now();
                                        $diff = $now->diffInDays($product->end);

                                        @endphp

                                <tr>
                                    <td>{{ $product->name }}</td>
                                    @foreach($categories as $category)
                                                @if($category->id === $product->categories_id)
                                                 <td>{{ $category->name }}</td>
                                                        @endif

                                            @endforeach
                                    <td> UGSHs:{{ $product->price }}</td>
                                    <td> {{$product->end}}</td>
                                    <td> {{$diff_in_days}}</td>
                                    <td> {{$diff}}</td>
                                    <td>
                                         @if ($product->status == 0)
                                        <span class="badge badge-success"><a href="">Done</a></span>
                                        @else
                                        <span class="badge badge-danger">Pending</span>
                                        @endif
                                    </td>
                                     
                                     
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
