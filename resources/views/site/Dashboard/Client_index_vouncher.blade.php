@extends('site.Employee')
@section('title')ADD LAND @endsection
@section('content')
    <div class="app-title">
        <div>
           <h1><i class="fa fa-briefcase"></i>Add Soil Sample details</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="">
        <div class="col-md-10  mx-auto">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body row">
                    <div class="col-md">

                        <div class="form-group">
                            <label class="control-label" for="vouncher">VOUNCHER <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('vouncher ') is-invalid @enderror" type="text" name="vouncher" id="vouncher" value="{{ old('vouncher') }}"/>
                            @error('vouncher') {{ $message }} @enderror
                        </div>

                        
                    </div>
                        
                    </div>
                    <div class="tile-footer">
                    
                    <div  style="margin-left: 420px;">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>VALIDATE</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('site.Dashboard.Client_index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
