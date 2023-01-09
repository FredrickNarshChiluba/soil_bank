@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col">
           
        </div>
        <div class="col-md-10">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.Employees.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Company Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter Company name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $employee->name) }}"
                                    />
                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email">EMAIL</label>
                                            <input
                                                class="form-control @error('email') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Company email"
                                                id="email"
                                                name="email"
                                                value="{{ old('email', $employee->email) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="Department">Business Type</label>
                                             <input
                                                class="form-control @error('Type') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Business Type"
                                                id="Type"
                                                name="Type"
                                                value="{{ old('Type', $employee->Type) }}"
                                            />                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('Department') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="Company">Company Owner</label>
                                            <input
                                                class="form-control @error('Company') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Company Information"
                                                id="Company"
                                                name="Company"
                                                value="{{ old('Company', $employee->Company) }}"
                                            />                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('Company') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="Role">Company Size</label>
                                            <input
                                                class="form-control @error('Role') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Company size"
                                                id="Company"
                                                name="Company"
                                                value="{{ old('Role', $employee->Role) }}"
                                            />                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('Company') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                              
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Employee</button>
                                        <a class="btn btn-danger" href="{{ route('admin.CompanyInfo.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                        <input type="hidden" name="id" value="{{ $employee->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ($employee->images)
                                <hr>
                                <div class="row">
                                    @foreach($employee->images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('storage/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                                    <a class="card-link float-right text-danger" href="{{ route('admin.Employees.images.delete', $image->id) }}">
                                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
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
