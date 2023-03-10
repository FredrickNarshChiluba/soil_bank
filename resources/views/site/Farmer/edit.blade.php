@extends('site.Employee')
@section('title') Employee @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Edit FARMER Detail</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <!-- <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li> -->
                   <!--  <li class="nav-item"><a class="nav-link" href="#attributes" data-toggle="tab">Attributes</a></li> -->
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('site.Farmer.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Farmer Information</h3>
                             
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="farmer_name">Name</label>
                                    <input
                                        class="form-control @error('farmer_name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter  farmer name"
                                        id="farmer_name"
                                        name="name"
                                        value="{{$employee->name }}"
                                    />
                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('farmer_name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="farmer_email">EMAIL</label>
                                            <input
                                                class="form-control @error('farmer_email') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter  farmer email"
                                                id="farmer_email"
                                                name="email"
                                                value="{{ $employee->email }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('farmer_email') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                                <div class="row">  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="farmer_address">ADDRESS</label>
                                            <input
                                                class="form-control @error('farmer_address') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Employee farmer_address"
                                                id="farmer_address"
                                                name="address"
                                                value="{{$employee->address }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('farmer_address') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="farmer_contact">PHONE</label>
                                            <input
                                                class="form-control @error('farmer_contact') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Employee farmer_contact"
                                                id="farmer_contact"
                                                name="Phone"
                                                value="{{$employee->Phone}}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('farmer_contact') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                              
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Farmer</button>
                                        <a class="btn btn-danger" href="{{ route('site.Farmer.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
