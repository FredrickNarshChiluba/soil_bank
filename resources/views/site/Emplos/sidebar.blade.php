<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
 <div class="w3-container w3-row">
  <div class="w3-col s12 w3-center">
   <img class="w3-circle w3-margin-right" style="width:100px" src="{{ asset('frontend/images/avatar3.png') }}">
 </div>
 <div class="w3-col s12 w3-bar w3-center">
   
  <p class="app-menu__label" style="color: white;" >
  
   <span class="caret"></span> </p>
  <span class="app-menu__label" style="color: white;">{{ Auth::user()->name }}</span>
     <!--  <a href="#" class="w3-bar-item w3-button " style="width:33%"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-user"></i></a>
      <a href= --><!-- !-- php" class="w3-bar-item w3-button" style="width:33%"><i class="fa fa-power-off"></i></a> --> 
    </div>
  </div>
  
  <ul class="app-menu">
    <li>
      <a class="app-menu__item {{ Route::currentRouteName() == 'site.dashboard' ? 'active' : '' }}" href="{{ route('site.Dashboard.Client_index') }}">
        <i class="app-menu__icon  fa fa-address-card-o"></i>
        <span class="app-menu__label">DASHBOARD<z/span>
      </a>
    </li>
    <li>
      <a class="app-menu__item {{ Route::currentRouteName() == 'site.dashboard' ? 'active' : '' }}" href="{{ route('site.Dashboard.my_token') }}">
        <i class="app-menu__icon  fa fa-qrcode fa-lg"></i>
        <span class="app-menu__label">My Access tokens<z/span>
      </a>
    </li>

    <!-- <li class="dropdown">
      <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-tachometer"></i> <span class="app-menu__label">PROFILE</span><i class="fa fa-caret-down"></i> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href=""><i class="fa fa-qrcode fa-lg"></i> EDIT PROFILE</a>
        </li>
        <li>
          <a class="dropdown-item" href=" "><i class="fa fa-shopping-bag fa-lg"></i> CHANGE PASSWORD</a>
        </li>
      </ul>
    </li>    -->
              <li>
                <a class="app-menu__item {{ Route::currentRouteName() == 'auth.user' ? 'active' : '' }}" href="/Client_Update/{{auth::user()->id}}">
                  <i class="app-menu__icon fa fa-shopping-bag"></i>
                  <span class="app-menu__label">EDIT PROFILE</span>
                </a>
              </li>

              <li>
                <a class="app-menu__item {{ Route::currentRouteName() == 'site.products.index' ? 'active' : '' }}" href="{{url('change_password')}}">
                  <i class="app-menu__icon fa fa-lock"></i>
                  <span class="app-menu__label">CHANGE PASSWORD</span>
                </a>
              </li>
<!--               
              <li>
                <a class="app-menu__item {{ Route::currentRouteName() == 'site.Clients.index' ? 'active' : '' }}" href="{{route('site.Clients.index')}}">
                  <i class="app-menu__icon fa fa-shopping-bag"></i>
                  <span class="app-menu__label">CLIENTS</span>
                </a>
              </li>

              <li>
                <a class="app-menu__item {{ Route::currentRouteName() == 'site.Farmer.index' ? 'active' : '' }}" href="{{route('site.Farmer.index')}}">
                  <i class="app-menu__icon fa fa-shopping-bag"></i>
                  <span class="app-menu__label">FARMERS</span>
                </a>
              </li>

              <li>
                <a class="app-menu__item {{ Route::currentRouteName() == 'site.Employees.index' ? 'active' : '' }}" href="{{route('site.Employees.index')}}">
                  <i class="app-menu__icon fa fa-shopping-bag"></i>
                  <span class="app-menu__label">EMPLOYEES</span>
                </a>
              </li>
              
              <li> -->
                <!-- <a class="app-menu__item {{ Route::currentRouteName() == 'site.settings' ? 'active' : '' }}" href="">
                  <i class="app-menu__icon fa fa-cogs"></i>
                  <span class="app-menu__label">LOGOUT</span>
                </a> -->
                <a class="app-menu__item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user fa-lg"></i>
                                            <span class="app-menu__label">&nbsp;&nbsp;LOGOUT</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
              </li>
            </ul>
          </aside>
