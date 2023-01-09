@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
         <div>
            <h1><i class="fa fa-shopping-bag"></i> Company</h1>
            <p>-Informance</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                      <!--  
                            <h3 class="tile-title">Company Information</h3>
                            <hr> -->
                             @foreach($employee as $employ)
                            <div class="tile-body">
                                <div class="form-group">
                                    <strong><label class="control-label" for="name">Name:</label></strong> {{ $employ->name }}
                                    
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                           <strong> <label class="control-label" for="email">EMAIL:</label></strong>
                                            {{ $employ->email }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <strong> <label class="control-label" for="Department">Business Type:</label></strong> 
                                             {{ $employ->Type }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <strong>  <label class="control-label" for="Company">Company Owner:</label></strong>
                                            {{ $employ->Company }}
                                                                                      
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong><label class="control-label" for="Company">Company Profile:</label></strong>
                                            {{ $employ->CompanyDescription }}
                                                                                      
                                            
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <strong> <label class="control-label" for="Role">Company created date:</label></strong>
                                            {{ $employ->date }}
                                            
                                        </div>
                                    </div>
                                </div>
                              
                              
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 btn btn-success" style="text-align: center;">
                                       <!--  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>EDIT</button> -->
                                        <a href="{{ route('admin.CompanyInfo.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>EDIT</a>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
