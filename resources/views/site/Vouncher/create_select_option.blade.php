@extends('site.Employee')
@section('title')GENERATE NEW COPOUN @endsection
@section('content')
    <div class="app-title">
        <div>
           <h1><i class="fa fa-briefcase"></i>Genereate new copoun Key</h1>
        </div>
         <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    </div>
    
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <form action="{{ route('site.Vouncher.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    
                    <div class="form-group">
                    <label>Select Client:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <div class="btn-group">                    
                            <select id="PERIODss"  name="PERIODss" class ="form-control">
                                <option value="">Select client name</option>
                                @foreach($client_reques as $client_reques1)
                                @foreach($employees_vouc as $employees_voucc)
                                
                                @if($employees_voucc->id==$client_reques1->user_id)
                                <option value='{{$employees_voucc->id}}'>{{$employees_voucc->name}}</option>
                                @else
                                <h3>No copoun requests</h3>
                                @endif
                                
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label>Copoun Category:</label>
                    <div class="btn-group ">
                        <select  name="license_period" id="license_period" class ="form-control">
                            <option value="">Select period for copoun Key</option>
                            <!-- <option value="">SILVER</option>
                            <option value="1 Hour">SILVER</option>
                            <option value="2 Hour">BRONZE</option>
                            <option value="3 Hour">GOLD</option> -->
                            @foreach($category as $employees)
                              
                              <option value="{{$employees->PERIOD}}">{{$employees->CATEGORY}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    
                    </div>
                    
                 
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generate Copoun</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('site.Vouncher.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
                     
                     $("#PERIODss").select2({
                     placeholder: "Select a period",
                     allowClear: true
                 });
               
               
               $("#PERIODss").on('select2:select',function(e){
                 selc = e.target.value;
                 console.log('selc');
         $.get('/Vouncher/Copoun_baseds?selc=' + selc,function(data){

         $.each(data,function(index, selected_price){
           console.log(selected_price.PERIOD);

         $("#license_period").val(selected_price.PERIOD);

});
});
});

</script>

@endsection
@push('scripts')

@endpush
