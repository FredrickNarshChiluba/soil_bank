@extends('admin.app')
@section('title')  @endsection
@section('content')

@include('admin.partials.flash')
<form action="{{url('admin/update/{id}')}} " method="POST">

  @csrf
  <div class="tile" style="background-color: #6c757d;">
    <div class="row d-print-none mt-2">
      <div class="col-12 text-center">
        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Synchronize XML </button>

      </div>
    </div>
  </div>


  <div class="w3-col m4">
   <div class="w3-card-2">
     <div class="w3-container w3-margin-0 w3-teal"> <h2 class="w3-center"><span class="w3-text-orange">Business</span> Metrics</h2></div>
     <div class="w3-container" style="margin-top: 10px">
       @foreach($business as $employ)

       <label>{{ $employ->Metricname }} </label>
       <input data-id="{{$employ->id}}" data-config="Resource" class="toggle-class w3-check metric-config" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle"  @if(old('status', $employ->status))checked @endif><br/>
        
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
          </div>&nbsp;
          <div class="w3-col m4">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-purple"> <h2 class="w3-center"><span class="w3-text-orange">Resource</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($resour as $employ)
              <!-- <input
               class="form-control"
               type="checkbox"
               id="Metricname"
               name="Metricname"
               value="{{ $employ->Metricname }}"
               /> -->
               @if(isset($reminder_email))
               <input type="checkbox" name="Metricname" id="Metricname" checked>
               @endif
               <label>{{ $employ->Metricname }} </label>
               @endforeach
             </div>
           </div>
         </div>&nbsp;<br>

         <div class="w3-col m4">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-gray"> <h2 class="w3-center"><span class="w3-text-orange">Team</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($team as $employ)
               <input type="hidden" name="name[]" value="{{$employ->id}}" />
               <input
               class="form-control"
               type="checkbox"
               id="Metricname"
               name="values[{{$employ->id}}]"
               value="{{$employ->status}}"

               />
               <label>{{ $employ->Metricname }} </label>
               @endforeach
             </div>
           </div>
         </div>

         <div class="w3-col m4">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-cyan"> <h2 class="w3-center"><span class="w3-text-orange">project</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($project as $employ)
               <input type="hidden" name="name[]" value="{{$employ->id}}" />
               <input
               class="form-control"
               type="checkbox"
               id="Metricname"
               name="value[{{$employ->id}}]"
               value="{{$employ->status}}"

               />
               <label>{{ $employ->Metricname }} </label>
               @endforeach
             </div>
           </div>
         </div>
         
         <div class="w3-col m4">
           <div class="w3-card-2">
             <div class="w3-container w3-margin-0 w3-green"> <h2 class="w3-center"><span class="w3-text-orange">product</span> Metrics</h2></div>
             <div class="w3-container" style="margin-top: 10px">
               @foreach($product as $employ)
               <input
               class="form-control"
               type="checkbox"
               id="Metricname"
               name="Metricname"
               value="{{ $employ->Metricname }}"
               />
               <label>{{ $employ->Metricname }} </label>
               @endforeach
             </div>
           </div>
         </div>
         
       </div>
       
     </form>
     @endsection
     @push('scripts')

     
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
  //   $('.toggle-class').change(function() {
  //       var status = $(this).prop('checked') == true ? 1 : 0; 
  //       var user_id = $(this).data('id'); 
  //        console.log(status);
  //       $.ajax({
  //           type: "GET",
  //           dataType: "json",
  //           url: '/update',
  //           data: {'status': status, 'user_id': user_id},
  //           success: function(data){
  //             console.log(data.success)
  //           }
  //       });
  //   })
  // })

</script>


<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
