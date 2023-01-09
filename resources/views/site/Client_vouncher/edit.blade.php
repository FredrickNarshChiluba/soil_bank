@extends('site.Employee')
@section('title') Land information @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Edit Land Details</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
    <div class="col-md-2">
                <!-- <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                     <li class="nav-item"><a class="nav-link" href="#attributes" data-toggle="tab">Attributes</a></li> -->
                <!-- </ul>-->
            <!-- </div> -->
        </div> 
        <div class="col-md-10">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('site.Land.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Land Information</h3>
                            <hr>
                            <div class="tile-body">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label class="control-label" for="field_name">Name</label>
                                    <input
                                        class="form-control @error('field_name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter employee name"
                                        id="field_name"
                                        field_name="field_name"
                                        value="{{ old('field_name', $employee->field_name) }}"
                                    />
                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('field_name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Land Size</label>
                                            <input
                                                class="form-control @error('email') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Land  size"
                                                id="Land_size"
                                                name="Land_size"
                                                value="{{ old('Land_size', $employee->Land_size) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('Land_size') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="field_unit">Field Unit</label>
                                            <input
                                                class="form-control @error('field_unit') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter  field unit"
                                                id="field_unit"
                                                name="field_unit"
                                                value="{{ old('field_unit', $employee->field_unit) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('field_unit') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="farmer_name">Farmer Name</label>
                                            <input
                                                class="form-control @error('farmer_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Employee farmer_name"
                                                id="farmer_name"
                                                name="farmer_name"
                                                value="{{ old('farmer_name', $employee->farmer_name) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('farmer_name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                              
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Employee</button>
                                        <a class="btn btn-danger" href="{{ route('site.Land.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
