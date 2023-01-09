@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.CompanyInfo.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Company Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Company">Company Owner <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Company') is-invalid @enderror" type="text" name="Company" id="Company" value="{{ old('Company') }}"/>
                            @error('Company') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Company Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}"/>
                            @error('Company') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('CompanyDescription') is-invalid @enderror" name="CompanyDescription" placeholder="Your Company Description" rows="6" cols="50" required></textarea>
                            @error('CompanyDescription') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Business Type</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Type" required>
                                <option value="" disabled selected>Select Business Type</option>
                                <option value="Information Technology">Software Development</option>
                                <option value="Sales And Marketing">Sales & Marketing</option>
                                <option value="Others">Others</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label><b>Company Size</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="Role" required>
                                <option value="" disabled selected>Select Range</option>
                                <option value="Programmer">0-5</option>
                                <option value="Graphics Designer">5-10</option>
                                <option value="Data Scientist">10-15</option>
                                <option value="IT Consultant">15-20</option>
                                <option value="Network Administrator">20-50</option>
                                <option value="Digital Marketer">50 and above</option>
                              </select>
                        </div>
                        <label class="control-label" for="date">Date Of Creation <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('date') is-invalid @enderror" type="date" name="date" id="password" value="{{ old('date') }}"/>
                            @error('date') {{ $message }} @enderror
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
