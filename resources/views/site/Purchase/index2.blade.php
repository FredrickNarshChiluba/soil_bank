<!DOCTYPE html>
<html>

<head>
    <title>Issued Coupon</title>
    <meta http-equiv="refresh" content="240; url = '/Client_based'" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>

<body>

    <body class="app sidebar-mini rtl">
        @include('site.Purchase.Emplo.header')
        @include('site.Purchase.Emplo.sidebar')
        <main class="app-content" id="app">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <!-- <th> # </th> -->
                                        <th> COPOUN NUMBER </th>
                                        <th class="text-center">USAGE START TIME</th>
                                        <th class="text-center"> USAGE END TIME </th>
                                        <!-- <th class="text-center"> Project Duration </th> -->
                                        <th> TIME </th>
                                        <th style="width:100px; min-width:100px;" class="text-center ">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees_vouc as $employ)
                                    @if ($employ->code != '')
                                    <tr>

                                        <td>{{ $employ->coupon_id }}</td>
                                        <td>
                                            @if ($employ->usage_start_date != '')
                                            <span class="badge "><a href="">{{ $employ->usage_start_date }}</a></span>
                                            @else
                                            <span class="badge  ">UNUSED</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employ->usage_start_date != '')
                                            <span class="badge "><a href="">{{ $employ->expiry_date }}</a></span>
                                            @else
                                            <span class="badge  ">UNUSED</span>
                                            @endif

                                        </td>
                                        <td>{{ $employ->period }}</td>


                                        <td class="text-center">
                                            @if ($employ->is_used == "0")
                                            <span class="badge badge-success"><a href="">UNUSED</a></span>
                                            @else
                                            <span class="badge badge-danger ">USED</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @else
                                    <tr> <span class="badge badge-success ">NO COPOUN REQUEST MADE YET</span> </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/js/main.js') }}"></script>
        <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
        @stack('scripts')
    </body>
    <div class="align-items-center" id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright &copy; E-SOIL DATA BANK {{now()->format( 'Y')}}
                        <!-- </div> -->
                        <!-- <div> -->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div> <a target="_blank" href="https://billbrain.tech/">powered by Billbrain techenologies ltd</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</html>