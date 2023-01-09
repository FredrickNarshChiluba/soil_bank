@extends('site.EmployeeS')
@section('title')VOUNCHER @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i><b>USED AND UNUSED TOKENS</b></h1>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
</div>
@include('admin.partials.flash')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
                            <!-- <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $employ)
                            @if($employ->user_id==auth()->user()->id)
                            <tr>


                                <td>{{ $employ->coupon_id }}</td>
                                <!-- <td>{{ $employ->usage_start_date }}</td> -->
                                <td>{{ $employ->usage_start_date }}</td>
                                <td>{{ $employ->expiry_date }}</td>
                                <td>{{ $employ->period }}</td>


                                <!-- <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('site.Land.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a>
                                        <a href="{{ route('site.Employees.edit', $employ->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td> -->
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '.PERIODss', function() {
            // console.log('yeah that is it');

            var cat_id = $(this).val();
            console.log(cat_id)
            var a = $(this).parent().parent().parent();

            $.ajax({
                type: 'get',
                url: "{{route('findCategoryPrice')}}",
                data: {
                    'id': cat_id
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data.PRICE)

                    a.find('.vouch_price').val(data.PRICE);

                },

                error: function() {

                }
            });
        });
    });
</script>

@endsection
@push('scripts')

@endpush