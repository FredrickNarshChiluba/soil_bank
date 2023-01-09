<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="w3-container w3-row">
    <div class="w3-col s12 w3-center">
      <img class="w3-circle w3-margin-right" style="width:100px" src="{{ Auth::user()->url }}">
    </div>
    <div class="w3-col s12 w3-bar w3-center">
      <p class="app-menu__label" style="color: white;">
        <span class="caret"></span>
      </p>
      <span class="app-menu__label" style="color: white;">{{ Auth::user()->name }}</span>
      <!--  <a href="#" class="w3-bar-item w3-button " style="width:33%"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-user"></i></a>
      <a href= -->
      <!-- !-- php" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-power-off"></i></a> -->
    </div>
  </div>
  <ul class="app-menu">
    <li>
      <a class="app-menu__item {{ Route::currentRouteName() == 'site.dashboard' ? 'active' : '' }}" href="/Dashboard">
        <i class="app-menu__icon  fa fa-address-card-o"></i>
        <span class="app-menu__label">&nbsp;&nbsp;DASHBOARD</span>
      </a>
    </li>
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-globe" aria-hidden="true"></i> <span class="app-menu__label">&nbsp;&nbsp;&nbsp;SOIL SAMPLE&nbsp;</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href=" {{route('site.Land.index')}} "><i class="fa fa-eye"></i>&nbsp;&nbsp; VIEW SOIL SAMPLE</a></li>
        <li><a class="dropdown-item" href=" {{route('site.Land.create')}} "><i class="fa fa-shopping-bag fa-lg"></i> &nbsp;&nbsp;&nbsp; ADD SOIL SAMPLE</a></li>
      </ul>
    </li>
    @if(Auth::user()->Role=='Admin')
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-tachometer"></i><span class="app-menu__label">&nbsp;&nbsp;&nbsp; COPOUNS &nbsp;</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href=" {{route('site.Vouncher.index')}} "><i class="fa fa-eye"></i>&nbsp;&nbsp; VIEW COPOUN</a>
        </li>
        <li>
          <a class="dropdown-item" href="{{route('site.Token.index')}}"><i class="fa fa-qrcode fa-lg"></i>&nbsp;&nbsp; COPOUN CATEGORY</a>
        </li>
        <li>
          <a class="dropdown-item" href="{{route('site.Vouncher.create')}}"><i class="fa fa-shopping-bag fa-lg"></i>&nbsp;&nbsp; GENERATE COPOUN</a>
        </li>
      </ul>
    </li>
    @endif
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span class="app-menu__label">&nbsp;&nbsp;&nbsp; CLIENTS &nbsp;</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href=" {{route('site.Employees.index')}} "><i class="fa fa-eye"></i>&nbsp;&nbsp; VIEW CLIENTS</a>
        </li>
        <li>
          <a class="dropdown-item" href=" {{route('site.Employees.create')}} "><i class="fa fa-shopping-bag fa-lg"></i> &nbsp;&nbsp;ADD CLIENTS</a>
        </li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">&nbsp;&nbsp;FARMERS</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href=" {{route('site.Farmer.index')}} "><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp; VIEW FARMERS</a>
        </li>
        <li>
          <a class="dropdown-item" href=" {{route('site.Employees.create')}} "><i class="fa fa-shopping-bag fa-lg"></i>&nbsp;&nbsp; ADD FARMERS</a>
        </li>
      </ul>
    </li>
    <!-- <li>
      <a class="app-menu__item {{ Route::currentRouteName() == 'site.Farmer.index' ? 'active' : '' }}" href="{{route('site.Farmer.index')}}">
        <i class="app-menu__icon fa fa-users"></i>
        <span class="app-menu__label">&nbsp;&nbsp;FARMERS</span>
      </a>
    </li> -->
    @if(Auth::user()->Role=='Admin')
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href=" " id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-tachometer"></i><span class="app-menu__label">&nbsp;&nbsp;&nbsp; EMPLOYEES &nbsp;</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href=" {{route('site.Employees.index')}} "><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp; VIEW EMPLOYEES</a>
        </li>
        <li>
          <a class="dropdown-item" href=" {{route('site.Employees.create')}} "><i class="fa fa-shopping-bag fa-lg"></i>&nbsp;&nbsp; ADD EMPLOYEES</a>
        </li>
      </ul>
    </li>
    @endif
    @if(Auth::user()->Role=='Admin')
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-tachometer"></i><span class="app-menu__label">&nbsp;&nbsp;&nbsp; COUPON REQUESTS &nbsp;</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href=" {{route('site.voucher_requests.index')}} "><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp; VIEW REQUESTS</a>
        </li>
      </ul>
    </li>
    @endif
    <!-- <a class="app-menu__item {{ Route::currentRouteName() == 'site.settings' ? 'active' : '' }}" href="">
                  <i class="app-menu__icon fa fa-cogs"></i>
                  <span class="app-menu__label">LOGOUT</span>
                </a> -->
    <li class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" role="button" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-tachometer"></i><span class="app-menu__label">&nbsp;&nbsp;&nbsp; PROFILE &nbsp;</span> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href="{{url('/profiles')}}"><i class="fa fa-qrcode fa-lg"></i> &nbsp;&nbsp;EDIT PROFILE</a>
        </li>
        <li>
          <a class="dropdown-item" href="{{route('user.change_password')}}"><i class="fa fa-shopping-bag fa-lg"></i>&nbsp;&nbsp; CHANGE PASSWORD</a>
        </li>
      </ul>
    </li>
    <a class="app-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user fa-lg"></i>
      <span class="app-menu__label">&nbsp;&nbsp;&nbsp;LOGOUT
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    </li>
  </ul>
</aside>