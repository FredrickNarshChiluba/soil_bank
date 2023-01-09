@extends('admin.app')
@section('title')  @endsection
@section('content')
    <!-- <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Employee</h1>
            <p>-Create Employee Account</p>
        </div>
        <a href="{{ route('admin.Employees.create') }}" class="btn btn-primary pull-right">Add Employee</a>
      </div> -->
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
            
          <!-- </div> -->




        </div>
        <div class="tile-footer">
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Project</button>

                </div>
              </div>
            </div>
          </form>
        @endsection
        @push('scripts')


        <script type="text/javascript">
          let xmlContent ='';
          let tableBooks=document.getElementById('books')
      // let tableteam=document.getElementById('team')
      fetch('./../data.xml').then((response)=>{
        response.text().then((xml)=>{
          xmlContent =xml;

          let parser=new DOMParser();

          let xmlDom= parser.parseFromString(xmlContent,'application/xml');
          let books = xmlDom.querySelectorAll('resources>Metric');//calling child element inside CATALOG
          books.forEach(bookXmlNode => {

            let row = document.createElement('tr');

            // TITLE
            let td=document.createElement('td');
            td.innerText=bookXmlNode.children[0].innerHTML;
            // checkbox
            var checkbox = document.createElement('input');
            checkbox.setAttribute('type', 'checkbox');
            checkbox.setAttribute('value', 'yes');
            checkbox.setAttribute('name', 'resources[]');
            row.appendChild(checkbox);
            row.appendChild(td);
            tableBooks.children[1].appendChild(row);


          });


        });
      });

      let tableteam=document.getElementById('team')
      fetch('./../data.xml').then((response)=>{
        response.text().then((xml)=>{
          xmlContent =xml;

          let parser=new DOMParser();

          let xmlDom= parser.parseFromString(xmlContent,'application/xml');
          let books = xmlDom.querySelectorAll('team>Metric');//calling child element inside CATALOG
          books.forEach(bookXmlNode => {

            let row = document.createElement('tr');

            // TITLE
            let td=document.createElement('td');
            td.innerText=bookXmlNode.children[0].innerHTML;
            // checkbox
            var checkboxs = document.createElement('input');
            checkboxs.setAttribute('type', 'checkbox');
            checkboxs.setAttribute('value', 'yes');
            row.appendChild(checkboxs);
            row.appendChild(td);
            tableteam.children[1].appendChild(row);


          });


        });
      });

      let tableprojec=document.getElementById('project')
      fetch('./../data.xml').then((response)=>{
        response.text().then((xml)=>{
          xmlContent =xml;

          let parser=new DOMParser();

          let xmlDom= parser.parseFromString(xmlContent,'application/xml');
          let books = xmlDom.querySelectorAll('project>Metric');//calling child element inside CATALOG
          books.forEach(bookXmlNode => {

            let row = document.createElement('tr');

            // TITLE
            let td=document.createElement('td');
            td.innerText=bookXmlNode.children[0].innerHTML;

            // checkbox
            var checkboxp = document.createElement('input');
            checkboxp.setAttribute('type', 'checkbox');
            checkboxp.setAttribute('value', 'yes');
            row.appendChild(checkboxp);
            row.appendChild(td);
            tableprojec.children[1].appendChild(row);


          });


        });
      });

      let tablebusiness=document.getElementById('business')
      fetch('./../data.xml').then((response)=>{
        response.text().then((xml)=>{
          xmlContent =xml;

          let parser=new DOMParser();

          let xmlDom= parser.parseFromString(xmlContent,'application/xml');
          let books = xmlDom.querySelectorAll('business>Metric');//calling child element inside CATALOG
          books.forEach(bookXmlNode => {

            let row = document.createElement('tr');

            // TITLE
            let td=document.createElement('td');
            td.innerText=bookXmlNode.children[0].innerHTML;

            // checkbox
            var checkboxss = document.createElement('input');
            checkboxss.setAttribute('type', 'checkbox');
            checkboxss.setAttribute('value', 'yes');
            row.appendChild(checkboxss);
            row.appendChild(td);
            tablebusiness.children[1].appendChild(row);


          });


        });
      });



    </script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    @endpush
