@extends('site.Employee')
@section('title')ADD EMPLOYEE @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i>Create User Account</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <h3 class="tile-title"></h3>
            <form action="{{ route('site.Employees.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="name">Full Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" />
                        @error('name') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="address">Address <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}" />
                        @error('address') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="Phone">Mobile contact <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('Phone') is-invalid @enderror" type="text" name="Phone" id="Phone" value="{{ old('Phone') }}" />
                        @error('Phone') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" />
                        @error('email') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password') }}" />
                        @error('email') {{ $message }} @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Profile Photo</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" />
                        @error('image') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                        <select name="Role" class="selectpicker">
                            <option selected disabled>Assign user role</option>
                            <option value="Admin">Admin</option>
                            <option value="Client">Client</option>
                            <option value="Farmer">Farmer</option>
                            <option value="Data Entrant">Data Entrant</option>
                            <option value="Technician">Technician</option>
                        </select>

                        <!-- <input class="w3-check" name="Role" value=1 type="checkbox"> Check To Grant Admin Rights -->
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save User</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('site.Employees.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush