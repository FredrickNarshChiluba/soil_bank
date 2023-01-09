    @extends('site.Employee')
    @section('title')VOUNCHER CATEGORY @endsection
    @section('content')
        <div class="app-title">
            <div>
            <h1><i class="fa fa-briefcase"></i><b>WELCOME TO E-SOIL DATA BANK</b></h1>
            </div>
            @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        </div>
        @include('admin.partials.flash')
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="tile">
                <h3 style='text-align:center;' class="tile-title">ADD TOKEN CATEGORY</h3>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    
                    <form class="" action="{{ route('site.Token.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    
                        @csrf
                        <div class="tile-body row">
                                <div class='col-md-6'>

                                <!-- <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">TOKEN CATEGORY(NAME)</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div> -->

                                
                                    <div class="form-group">
                                    <label class="" for="CATEGORY">TOKEN CATEGORY(NAME) <span class="m-l-5 text-danger"> *</span></label>
                                    <input style='width:190%;' class="form-control @error('CATEGORY ') is-invalid @enderror" placeholder='Enter token category ' type="text" name="CATEGORY" id="CATEGORY" value="{{ old('CATEGORY') }}"/>
                                    @error('CATEGORY') {{ $message }} @enderror
                                    </div>  
                                    
                                    <div class="form-group">
                                    <label class="control-label" for="PRICE">TOKEN PRICE <span class="m-l-5 text-danger"> *</span></label>
                                    <input style='width:190%;' class="form-control @error('PRICE ') is-invalid @enderror" placeholder='Enter token price ' type="number" name="PRICE" id="PRICE" value="{{ old('PRICE') }}"/>
                                    @error('PRICE') {{ $message }} @enderror
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label" for="PERIOD">TOKEN PERIOD(HRS) <span class="m-l-9 text-danger"> *</span></label>
                                    <input style='width:190%;' class="form-control @error('PERIOD ') is-invalid @enderror" placeholder='Enter PERIOD(e.g 1 or 2 etc) ' type="number" name="PERIOD" id="PERIOD" value="{{ old('PERIOD') }}"/>
                                    @error('PERIOD') {{ $message }} @enderror
                                    </div>                       
                            
                                </div>
                        <div class="footer">
                        <div style='margin-left:250px;'>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>SUBMIT</button>
                            &nbsp;&nbsp;&nbsp;
                            <!-- <strong> Have vouncher? <a href="{{route('site.Client_vouncher.create')}}">click here</a></strong> -->
                            <a class="btn btn-secondary" href="{{ route('site.Token.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
    @endpush
