<header class="section-header">
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <a href="{{ url('/') }}">
                            <img class="logo" src="{{ asset('frontend/images/PAAT-Logo-1.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4">
                </div>
               <div class="col-lg-6 col-sm-7">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="" class="icontext">
                               
                                <div class="text-wrap">
                                    
                                </div>
                            </a>
                        </div>
                        
                        <div class="widget-header">
                                <a href="{{ url('/') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-secondary round text-white"><i class="fa fa-home"></i></div>
                                    <div class="text-wrap" style="color: orange;"><span>Home </span></div>
                                </a>
                            </div>
                        <div class="widget-header">
                                <a href="{{ route('register') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-secondary round text-white"><i class="fa fa-book"></i></div>
                                    <div class="text-wrap" style="color: orange;"><span>Register </span></div>
                                </a>
                            </div>
                            <div class="widget-header">
                                <a href="{{ route('login') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-secondary round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap" style="color: orange;"><span>Login </span></div>
                                </a>
                            </div>
                            <div class="widget-header">
                                <a href="{{ url('/About_us') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-secondary round text-white"><i class="fa fa-address-card" style="font-size:24px"></i></div>
                                    <div class="text-wrap" style="color: orange;"><span>About us </span></div>
                                </a>
                            </div>
                        
                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 
    @include('site.partials.nav') -->
</header>
