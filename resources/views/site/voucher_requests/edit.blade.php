@extends('site.Employee')
@section('title') Employee @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}" />
@endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-shopping-bag"></i> Edit Voucher Request</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row user">
    <div class="col-md-3">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>


            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <div class="tile">
                    <form action="{{ route('site.voucher_requests.update') }}" method="POST" role="form">
                        @csrf
                        <h3 class="tile-title">Request Information</h3>
                        <hr>
                        <?php
                        $user = App\Models\User::where(['id' => $requests->user_id])->get();
                        $userval = $user['0'];
                        ?>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="name">USER NAME</label>
                                <input type="text" id="user_id" name="user_id" value="{{ old('user_id', $userval->name) }}" disabled />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">USER ID</label>
                                <input type="text" placeholder="Enter user id" id="user_id" name="user_id" value="{{ old('user_id', $requests->user_id) }}" />
                                <input type="hidden" name="id" value="{{ $requests->id }}">
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="created_date">DATE WHEN CREATED </label>
                                        <input type="date" placeholder="Enter date email" id="created_date" name="created_date" value="{{ old('created_date', $requests->created_date) }}" />

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="period">PERIOD</label>
                                        <input type="text" placeholder="Enter period" id="period" name="PERIOD" value="{{ old('period', $requests->PERIOD) }}" />

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="price">PRICE</label>
                                        <input type="text" placeholder="Enter price" id="price" name="price" value="{{ old('price', $requests->price) }}" />

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="reason">REASON</label>
                                        <input type="text" placeholder="Enter reason" id="reason" name="REASON" value="{{ old('reason', $requests->REASON) }}" />

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Voucher Request</button>
                                    <a class="btn btn-danger" href="{{ route('site.voucher_requests.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>

@endpush