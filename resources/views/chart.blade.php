@extends('admin.app')
@section('content')

<div id="chartPie" style="height: 350px;">



</div>
@foreach($products as $product)
{{$product->name}}<br>
@foreach($attributes as $attribute)
@if( $attribute->product_id == $product->id)

@if( $attribute->status == 1)
{{$attribute->name}}  <span style="color: green;"> done</span><br>
@else
{{$attribute->name}}  <span style="color: yellow;"> pending</span><br>
@endif
@endif
@endforeach

@endforeach



<div>


</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>

<script>
  $(function(){
    'use strict'
    
    /**************** PIE CHART ************/
    var pieData = [{
      name:<?php echo json_encode($name); ?>,
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
  // println(pieChart);
  pieChart.setOption(pieOption);

/** making all charts responsive when resize **/

});
</script>

