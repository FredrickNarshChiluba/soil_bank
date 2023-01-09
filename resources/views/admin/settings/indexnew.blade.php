@extends('admin.app')
@section('title')  @endsection
@section('content')

@include('admin.partials.flash')
<form action="{{url('admin/update/{id}')}} " method="POST">

  @csrf
  <div class="tile" style="background-color: #6c757d;">
    <div class="row d-print-none ">
      <div class="col-12 text-center">
        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Synchronize XML </button>

      </div>
    </div>
  </div>

  <div class="row" >
    <div class="col-6">
     <div class="w3-card-2">
       <div class="w3-container w3-margin-0 w3-teal"> <h2 class="w3-center"><span class="w3-text-orange">Business</span> Metrics</h2></div>
       <div class="w3-container" style="margin-top: 10px">
         @foreach($business as $employ)


         <input type="hidden" id="id_input" name="nameBus[]" value=" {{$employ->id}} ">
         <input data-id="{{$employ->id}}" data-config="Business" class="toggle-class w3-check metric-config" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="bus[]" value="{{$employ->id}}" @if($employ->status) checked @endif id='status' ><label>{{ $employ->Metricname }} </label><br/>

              <!-- <input
               class="form-control"
               type="checkbox"
               id="Metricname"
               name="Metricname"
               value="{{ $employ->id }}"
                @if(old('Metricname', $employ->Metricname))checked @endif
                /> -->
                
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-5" style="margin-left: 20px;">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-purple"> <h2 class="w3-center"><span class="w3-text-orange">Resource</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($resour as $employ)
               <input type="hidden" id="id_input" name="Res[]" value=" {{$employ->id}} ">
               <input  class="toggle-class w3-check metric-config" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="nameRes[]" value="{{$employ->id}}"  @if($employ->status) checked @endif id='status' ><label>{{ $employ->Metricname }} </label><br/>
               @endforeach
             </div>
           </div>
         </div>&nbsp;<br>
         
       </div>

       <div class="row" style="margin-top: 10px">
         <div class="col-6">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-cyan"> <h2 class="w3-center"><span class="w3-text-orange">project</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($project as $employ)
               <input type="hidden" name="proj[]" value=" {{$employ->id}} ">
               <input  value="{{$employ->id}}" class="toggle-class w3-check metric-config" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="nameproj[]" @if($employ->status) checked @endif id='status' ><label>{{ $employ->Metricname }} </label><br/>
               @endforeach
             </div>
           </div>
         </div>

         <div class="col-6">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-blue"> <h2 class="w3-center"><span class="w3-text-orange">Product</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($product as $employ)


               <input type="hidden" name="prod[]" value=" {{$employ->id}} ">
               <input  value="{{$employ->id}}" class="toggle-class w3-check metric-config" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="nameprod[]" @if($employ->status) checked @endif id='status' ><label>{{ $employ->Metricname }} </label><br/>
               @endforeach
             </div>
           </div>
         </div>

<!--          <div class="col-6">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-green"> <h2 class="w3-center"><span class="w3-text-orange">product</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($product as $employ)
               <input
               class="form-control metric-config"
               data-config="BUS"
               data-status=" {{$employ->status}}"
               type="checkbox"
               data-id="{{ $employ->id }}"
               name="product"
               value="{{ $employ->id }}"
               @if($employ->status==1) ? 'checked':''  @endif

               />
               <label>{{ $employ->Metricname }} </label><br>
               @endforeach
             </div>
           </div>
         </div> -->
       </div>

       <div class="row" style="margin-top: 10px">

         <div class="col-6">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-indigo"> <h2 class="w3-center"><span class="w3-text-orange">Team</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
              @foreach($team as $employ)
              <input type="hidden" id="id_input" value=" {{$employ->id}} ">
              <input data-id="{{$employ->id}}" data-config="Resource" value="{{$employ->Metricname}}" class="toggle-class w3-check metric-config" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="status" @if($employ->status) checked @endif id='status' ><label>{{ $employ->Metricname }} </label><br/>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </div>

  </form>
  @endsection
  @push('scripts')

  <script type="text/javascript">
    $(document).ready(function () {
    // body...
    $('#status').click(function(){
      var checkBoxe = $('#status');
      checkBoxe.prop("checked",!checkBoxe.prop("checked"));
    });

    var checkedValue=$('#status').val();
    var id =$('#id_input').val();
    var xhr= new XMLHttpRequest();
    xhr.open("GET", '{{url('update/{id}')}}'+'/'+checkedValue+'/'+id,true );
    xhr.setRequestHeader('Content-Type','');
    xhr.send();
    xhr.onload=function(){
     // alert(this.responseText);
   } 
 });
</script>

    <!--  
     <script>
       $(document).ready(function(){
    //selector for the business metric congurator
    $(".metric-config").change(function(){
        //getting the values to pass into the ajax call
        var configName = $(this).data('config');
        var metricID = $(this).data('id');
        var metricStatus = $(this).data('status');

        $.ajax({
          //the beginning of the ajax process
          url: 'Admin/SettingController@update',
          method : 'post',
          data : {configName : configName, metricID : metricID, metricStatus : metricStatus },
          success: function(response){
              //show a notification or something
              //alert(response);
              $("#notifyT").html(response + "!").show().fadeOut(2000);
            }
          });

      });
  // $(function() {
  //   $('#Metricname').change(function() {
  //       var status = $(this).prop('checked') == true ? 1 : 0; 
  //       var user_id = $(this).data('id'); 
  //        console.log(status);
  //       $.ajax({
  //           type: "GET",
  //           dataType: "json",
  //           url: 'admin/update/{id}',
  //           data: {'status': status, 'user_id': user_id},
  //           success: function(data){
  //             console.log(data.success)
  //           }
  //       });
  //   })
  // })

</script>
-->

<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
