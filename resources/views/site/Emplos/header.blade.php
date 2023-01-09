<header class="app-header">
    <!-- <a class="app-header__logo" href=""> <h5><b>E-SOIL DATA BANK</b></h5> -->
    <img class="logo rounded" height="55px" width="auto" src="{{ asset('frontend/images/PAAT-Logo-1.png') }}" alt="logo">
    <!-- {{ config('app.name') }} -->
    </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    @if(auth()->user()->unreadNotifications->count())
                    {{ auth()->user()->unreadNotifications->count() }}
                    @endif
                </li>

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
                                {{ auth()->user()->unreadNotifications->count() }}



                                @foreach(auth()->user()->unreadNotifications as $notification)

                                {{ $notification->data['data'] }}

                                @endforeach
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Transaction complete
                                </p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a>
                    </li>
                </div>
                <li class="app-notification__footer">
                    <a href="#">See all notifications.</a>
                </li>
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
                    @if(auth()->user()->Role==1)
                    <a class="dropdown-item" href="{{url('profiles')}}"><i class="fa fa-users "></i>&nbsp;&nbsp;profile</a>
                    @else
                    <a class="dropdown-item" href="{{url('profile')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;profile</a>
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