@extends('admin.app')
<!-- @section('title') {{ $pageTitle }} @endsection -->
@section('content')
    <div class="app-title">
        <div>
            <!-- <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1> -->
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <!-- <h3 class="tile-title">{{ $subTitle }}</h3> -->
                <form action="{{ route('admin.Employees.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Full Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password') }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Employee Department</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Department" required>
                                <option value="" disabled selected>Select Employee Department</option>
                                <option value="Information Technology">IT Department</option>
                                <option value="Sales And Marketing">Sales & Marketing</option>
                                <option value="Accounting And Finance">Finance Department</option>
                                <option value="Technical Team">Technical Team</option>
                                <option value="Others">Others</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label><b>Employee Role</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Role" required>
                                <option value="" disabled selected>Select Employee Role</option>
                                <option value="Programmer">Programmer</option>
                                <option value="Graphics Designer">Graphics Designer</option>
                                <option value="Data Scientist">Data Scientist</option>
                                <option value="IT Consultant">IT Consultant</option>
                                <option value="Network Administrator">Network Administrator</option>
                                <option value="Digital Marketer">Digital Marketer</option>
                                <option value="Q/A Tester">Q/A Tester</option>
                                <option value="Others">Others</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <input class="w3-check" name="AdminRights" type="checkbox"> Check To Grant Admin Rights
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Employee</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.brands.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
