<header class="app-header">
    <!-- <a class="app-header__logo" href=""> -->
        <!-- <h5><b>E-SOIL DATA BANK</b></h5> -->
        <!-- {{ config('app.name') }} -->
        <img class="logo rounded" height="55px" width="auto" src="{{ asset('frontend/images/PAAT-Logo-1.png') }}" alt="logo">
    <!-- </a> -->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <i class="fa fa-bell-o">
                    <span class="badge badge-bell badge-danger" style="color: white;margin-top:1px;white-space: normal;">
                        @if(auth()->user()->unreadNotifications->count())
                        {{ auth()->user()->unreadNotifications->count() }}
                        @endif
                    </span></i> </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <!-- <li class="app-notification__title">
                
                </li> -->
                <div class="app-notification__content">
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <b>
                    <li><a href="{{route('markRead')}}">mark all as read</a></li></b>
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    <li> <a href="{{route('markRead')}}">{{$notification->data['data']}}</a></li>
                    @endforeach
                    @foreach(auth()->user()->readNotifications as $notification)
                    <li style="background-color:lightgray"> <a href="#">{{$notification->data['data']}}</a></li>
                    @endforeach
                    <!-- <p class="app-notification__message">
                                    Mail server not working
                                </p>
                                <p class="app-notification__meta">5 min ago</p> -->
                </div>
                </a>
        </li>

        </div>
        <!--  <li class="app-notification__footer">
                    <a href="#">See all notifications.</a>
                </li> -->
    </ul>
    </li>
    <!-- User Menu-->
    <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
                <a class="dropdown-item" href=""><i class="fa fa-cog fa-lg"></i> Settings</a>
            </li>
            <li>
                @if(auth()->user()->Role == 'Admin' || auth()->user()->Role == 'Super Admin' || auth()->user()->Role == 'Data Entrant' || auth()->user()->Role == 'Technician')
                <a class="dropdown-item" href="usersc/{{auth()->user()->id}}">profile</a>
                @else
                <a class="dropdown-item" href="{{url('profiles')}}">profile</a>
                @endif
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user fa-lg"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
    </ul>
</header>