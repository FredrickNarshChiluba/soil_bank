@extends('admin.app')
@section('title')  @endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
<script>
$(function(){
  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: <?php echo json_encode($name); ?>,
    type: 'pie',
    radius: '80%',
    center: ['50%', '57.5%'],
    data: <?php echo json_encode($Data); ?>,
    label: {
      normal: {
        fontFamily: 'Roboto, sans-serif',
        fontSize: 11
      }
    },
    labelLine: {
      normal: {
        show: false
      }
    },
    markLine: {
      lineStyle: {
        normal: {
          width: 1
        }
      }
    }
  }];
  var pieOption = {
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/>{b}: {c} ({d}%)',
      textStyle: {
        fontSize: 11,
        fontFamily: 'Roboto, sans-serif'
      }
    },
    legend: {},
    series: pieData
  };
  var pie = document.getElementById('chartPie');
  var pieChart = echarts.init(pie);
  pieChart.setOption(pieOption);
   /** making all charts responsive when resize **/
});
</script>
</head>
<body>
  <!-- {{!! $Data !!}} -->

<div id="chartPie" style="height: 350px;">
@foreach($products as $product)
{{$product->name}}
@endforeach 
</div>


@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
