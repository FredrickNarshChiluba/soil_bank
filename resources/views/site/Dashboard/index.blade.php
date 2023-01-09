@extends('site.Employee')
@section('title') Dashboard @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Clients</h4>
                <h3>{{$employees_vou_ipsd->count()}}</h3>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon">
            <i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
                <h4>UNUSED COPOUNS</h4>
                <p><b>{{$employees_vou_ips->count()}}</b></p>


            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
                <h4>USED COPOUNS</h4>
                <p><b>{{$employees_vou_ip->count()}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-star fa-3x"></i>
            <div class="info">
                <h4>Soil Samples</h4>
                <p><b>{{$employees_vou_ipsdd->count()}}</b></p>

            </div>
        </div>
    </div>
</div>
<div class="container text-center my-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Manage SOIL SAMPLE</h1>
                    <p class="card-text">Add and Edit/Modify SOIL SAMPLE information.</p>
                    <a href="{{route('site.Land.index')}}" class="btn btn-primary">SOIL SAMPLE</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Manage Clients</h1>
                    <p class="card-text">Add and Edit/Modify Employee information.</p>
                    <a href="{{route('site.Clients.index')}}" class="btn btn-primary">CLIENTS</a>
                </div>
            </div>
        </div>
    </div><br>
    @if(Auth::user()->Role=='Admin')
    <div class="row">

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Generate Copoun</h1>
                    <p class="card-text">Generate copouns for clients.</p>
                    <a href="{{route('site.Vouncher.index')}}" class="btn btn-primary">COPOUNS</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Manage Employees</h1>
                    <p class="card-text">Add and Edit/Modify Employee information.</p>
                    <a href="{{route('site.Employees.index')}}" class="btn btn-primary">EMPLOYEE</a>
                </div>
            </div>
        </div>

    </div>
    @endif
</div>
<!-- <iframe id="metric_container" width="100%" height="800" src="https://datastudio.google.com/embed/reporting/1B6kF_YtOzMphw7SiCZ21gMKMKmyj-dwf/page/ML2o" frameborder="0" style="border:0" allowfullscreen></iframe> -->
</div>
@endsection