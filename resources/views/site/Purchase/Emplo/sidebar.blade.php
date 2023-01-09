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
      <a class="app-menu__item {{ Route::currentRouteName() == 'site.Purchase.index1' ? 'active' : '' }}" href="{{ route('site.Purchase.index1') }}">
        <i class="app-menu__icon  fa fa-address-card-o"></i>
        <span class="app-menu__label {{ Route::currentRouteName() == 'site.Purchase.index2' ? 'active' : '' }}">&nbsp;&nbsp;SOIL SAMPLES</span>
      </a>
    </li>
    <!-- <li class="dropdown">
      <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-cc"></i> <span class="app-menu__label">&nbsp;&nbsp;&nbsp;COPOUNS &nbsp;&nbsp;</span><i class="fa fa-caret-down"></i> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href="{{route('site.Dashboard.Client_index')}}"><i class="fa fa-group fa-lg"></i> &nbsp;&nbsp;REQUEST FOR COPOUN</a>
        </li> -->
        <!-- <li>
          <a class="app-menu__item" href="{{route('site.Dashboard.Client_index')}}"><i class="fa fa-eye"></i>&nbsp;&nbsp;  VIEW COPOUN</a>
        </li> -->
        <li>
          <a class="app-menu__item" href="{{route('site.Purchase.index2')}}"><i class="fa fa-eye"></i>&nbsp;&nbsp;  VIEW COPOUN</a>
        </li>
        
      <!-- </ul>
    </li> -->
           

       <li class="dropdown">
      <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> <span class="app-menu__label">&nbsp;&nbsp;&nbsp;PROFILE&nbsp;&nbsp;</span><i class="fa fa-caret-down"></i> </a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li>
          <a class="dropdown-item" href="usersc/{{Auth::user()->id}}"><i class="fa fa-group fa-lg"></i> &nbsp;&nbsp;EDIT PROFILE</a>
        </li>
        <li>
          <a class="dropdown-item" href=""><i class="fa fa-key"></i>&nbsp;&nbsp; CHANGE PASSWORD</a>
        </li>
        <!-- <li>
          <a class="dropdown-item" href=""><i class="fa fa-group fa-lg"></i> Team</a>
        </li>
        <li>
          <a class="dropdown-item" href=""><i class="fa fa-cog fa-lg"></i> Product</a>
        </li>
        <li>
          <a class="dropdown-item" href=""><i class="fa fa-globe fa-lg"></i> Resources</a>
        </li> -->
      </ul>
    </li>
              <li>
                <a class="app-menu__item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user fa-lg"></i>
                                            <span class="app-menu__label">&nbsp;&nbsp;&nbsp;LOGOUT</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
              </li>
            </ul>
          </aside>
