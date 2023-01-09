@extends('admin.app')
@section('title')  @endsection
@section('content')
   
      @include('admin.partials.flash')
       <form action="" method="POST" role="form">
          @csrf
      <div class="row">
        
          <!-- <div class="row"> -->
            <div class="col-md-3">
              <h2>Resource Metric</h2>
              <table id="books" cellpadding='10px'>
                <thead>
                  <tr>
                    <th>
                      <!-- Metric Name -->
                    </th>
                <!-- <th>datasource</th>
                <th>datasource</th>
                <th>datasource</th>
                <th>visualizationname</th>
                <th>YEAR</th> -->
              </tr>
            </thead>
            <tbody>
              <tbody>
              </table>

            </div>  
            <div class="col-md-3">
             <!-- team metrics -->
             <h2>Team Metric</h2>
             <table id="team" cellpadding='10px' >
              <thead>
                <tr>
                  <th>
                    <!-- Metric Name -->
                  </th>
                <!-- <th>datasource</th>
                <th>datasource</th>
                <th>datasource</th>
                <th>visualizationname</th>
                <th>YEAR</th> -->
              </tr>
            </thead>
            <tbody>
              <tbody>
              </table>
            </div>  
            <!-- </div> -->

            <!-- <div class="row"> -->

              <div class="col-md-3">

                <!-- project metrics -->
                <h2>project Metric</h2>
                <table id="project" cellpadding='10px' >
                  <thead>
                    <tr>
                      <th>
                        <!-- Metric Name -->
                      </th>
                <!-- <th>datasource</th>
                <th>datasource</th>
                <th>datasource</th>
                <th>visualizationname</th>
                <th>YEAR</th> -->
              </tr>
            </thead>
            <tbody>
              <tbody>
              </table>
            </div>
           
            <!-- project metrics -->
            <div class="col-md-3">
              <h2>Business Metric</h2>
              <table id="business" cellpadding='10px'>
                <thead>
                  <tr>
                    <th>
                      <!-- Metric Name -->
                    </th>
                <!-- <th>datasource</th>
                <th>datasource</th>
                <th>datasource</th>
                <th>visualizationname</th>
                <th>YEAR</th> -->
              </tr>
            </thead>
            <tbody>
              <tbody>
              </table>

            </div>
        
        </div>
        <div class="tile-footer">
              <div class="row d-print-none mt-2">
                <div class="col-12 text-center">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Project</button>

                </div>
              </div>
            </div>
          </form>
        @endsection
        @push('scripts')


    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    @endpush
