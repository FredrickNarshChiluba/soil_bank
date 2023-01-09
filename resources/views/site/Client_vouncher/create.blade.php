@extends('site.EmployeeS')
@section('title')VOUNCHER @endsection
@section('content')
    <div class="app-title">
        <div>
           <h1><i class="fa fa-briefcase"></i><b>WELCOME TO E-SOIL DATA BANK</b></h1>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">FILL THE FORM WITH THE RECEIVED VOUNCHER FROM ADMIN</h3>
                
                <form action="{{ route('site.Client_vouncher.stores') }}" method="POST" role="form" enctype="multipart/form-data">
                
                    @csrf
                    <div class="tile-body row">
 
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                              <div class='col-md-6'>

                                  <div class="form-group">
                                  <label class="control-label" for="vouncher">RECEIVED VOUNCHER <span class="m-l-5 text-danger"> *</span></label>
                                  <input style='width:150%;' class="form-control @error('vouncher ') is-invalid @enderror" placeholder='Enter received vouncher ' type="text" name="vouncher" id="vouncher" value="{{ old('vouncher') }}"/>
                                  @error('vouncher') {{ $message }} @enderror
                                  </div>                            
                        
                            </div>
                    <div class="footer">
                    <div style='margin-left:250px;'>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SUBMIT</button>
                        &nbsp;&nbsp;&nbsp;
                        <!-- <strong> Have vouncher? <a href="{{route('site.Client_vouncher.create')}}">click here</a></strong> -->
                        <!-- <a class="btn btn-secondary" href="{{ route('site.Employees.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
