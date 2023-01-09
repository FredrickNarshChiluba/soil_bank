

@extends('admin.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
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
<a href="{{route('piechart',$product->id)}}"> <button type="button" class="btn btn-primary">View piechart</button></a><br>
@endforeach
            </div>
        </div>
    </div>
</div>
@endsection