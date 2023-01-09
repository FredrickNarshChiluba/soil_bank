@extends('site.Employee')
@push('scripts')

@endpush

@section('title')GENERATE NEW COUPON @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i>Generate new coupon Key</h1>
    </div>
    <!-- Success message -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <?php
            $request = App\Models\Voucher_request::all();
            $user = App\Models\User::all();
            ?>
            <h3 class="tile-title"></h3>
            <form action="{{ route('site.Vouncher.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">

                    <div class="form-group">
                        <label>Select Client:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="btn-group">
                            <select id="clients" name="clients" class="form-control">
                                <option value="">Select client name</option>

                                @foreach ($request as $course)
                                @foreach($user as $courses_ids)
                                @if($courses_ids->id == $course->user_id && $course->Is_served==0)
                                <option value="{{$courses_ids->id}}" selected> {{ $courses_ids->name }}-<b>(Order price: Ugx {{ $course->price }}, Period:{{ $course->PERIOD }} Hrs)</b></option>
                                @endif
                                @endforeach
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Copoun Category:</label>
                        <div class="btn-group ">
                            <select name="license_period" id="license_period" class="form-control">
                                <option value="">Select period for copoun Key</option>
                                @foreach($usedLicenses as $employees)


                                <option value="{{$employees->PERIOD}}">{{$employees->CATEGORY}}-(Price: Ugx {{$employees->PRICE}},Period:{{$employees->PERIOD}} Hrs)</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>


                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generate Copoun</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('site.Vouncher.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection