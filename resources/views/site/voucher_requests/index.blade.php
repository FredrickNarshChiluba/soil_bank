@extends('site.Employee')
@section('title') Employee @endsection
@section('content')
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <!-- <th> # </th> -->
                            <th>REQUESTED BY </th>
                            <th class="text-center">DATE OF REQUEST </th>
                            <th class="text-center"> PERIOD </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <th> PRICE </th>
                            <th>REASON</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($voucher_requests as $requests)
                        <?php
                        $user = App\Models\User::where(['id' => $requests->user_id])->get();
                        $userval=$user['0'];
                        ?>
                        <tr>
                            <td>{{ $userval->name }}</td>
                            <td>{{ $requests->created_date }}</td>
                            <td>{{ $requests->PERIOD }}</td>
                            <td>{{ $requests->price }}</td>
                            <td>{{$requests->REASON}}</td>




                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Second group">
                                    <a href="{{ route('site.voucher_requests.edit', $requests->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a>

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
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
@endpush