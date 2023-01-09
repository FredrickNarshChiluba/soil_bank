<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini rtl">
    @include('admin.partials.header')
    @include('admin.partials.side')
    <main class="app-content" id="app">
        @yield('content')
    </main>

   <!--  <script type="text/javascript">
   $(document).ready(function(){
    //selector for the business metric congurator
    $(".metric-config").change(function(){
        //getting the values to pass into the ajax call
        var configName = $(this).data('config');
        var id = $(this).data('id');
        var status = $(this).data('status');

      $.ajax({
          //the beginning of the ajax process
          url: 'ajax_bot/metrics_updater.php',
          method : 'post',
          data : {configName : configName, id : id, status : status },
          success: function(response){
              //show a notification or something
              //alert(response);
              $("#notifyT").html(response + "!").show().fadeOut(2000);
          }
      });

    });    </script> -->
    
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
            checkbox.setAttribute('name', 'resources[]');
            checkbox.setAttribute('value',bookXmlNode.children[0].innerHTML);
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
            checkboxs.setAttribute('value', '');
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
            checkboxp.setAttribute('value', '');
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
            checkboxss.setAttribute('value', '');
            row.appendChild(checkboxss);
            row.appendChild(td);
            tablebusiness.children[1].appendChild(row);


          });


        });
      });


  


    



    </script>
    
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
