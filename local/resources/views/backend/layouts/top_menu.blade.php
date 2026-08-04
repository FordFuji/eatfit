<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{url('/')}}">
                <img class="img-fluid" width="80px" height="35px" 
                    src="{{asset('/files/frontend/images/logo.svg')}}" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                {{-- <li>
                    <div><span id="openclose"></span></div>
                </li> --}}
                {{--<li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li> --}}
            </ul>
            <ul class="nav-right">
                {{--<li class="header-notification">--}}
                {{--<a href="#!">--}}
                {{--<i class="ti-bell"></i>--}}
                {{--<span class="badge bg-c-pink"></span>--}}
                {{--</a>--}}
                {{--<ul class="show-notification">--}}
                {{--<li>--}}
                {{--<h6>Notifications</h6>--}}
                {{--<label class="label label-danger">New</label>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<div class="media">--}}
                {{--<img class="d-flex align-self-center img-radius"--}}
                {{--src="{!! URL::asset('backend/files/assets/images/avatar-2.jpg')!!}" alt="Generic placeholder image">--}}
                {{--<div class="media-body">--}}
                {{--<h5 class="notification-user">John Doe</h5>--}}
                {{--<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer--}}
                {{--elit.</p>--}}
                {{--<span class="notification-time">30 minutes ago</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<div class="media">--}}
                {{--<img class="d-flex align-self-center img-radius"--}}
                {{--src="{!! URL::asset('backend/files/assets/images/avatar-4.jpg')!!}" alt="Generic placeholder image">--}}
                {{--<div class="media-body">--}}
                {{--<h5 class="notification-user">Joseph William</h5>--}}
                {{--<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer--}}
                {{--elit.</p>--}}
                {{--<span class="notification-time">30 minutes ago</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<div class="media">--}}
                {{--<img class="d-flex align-self-center img-radius"--}}
                {{--src="{!! URL::asset('backend/files/assets/images/avatar-3.jpg')!!}" alt="Generic placeholder image">--}}
                {{--<div class="media-body">--}}
                {{--<h5 class="notification-user">Sara Soudein</h5>--}}
                {{--<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer--}}
                {{--elit.</p>--}}
                {{--<span class="notification-time">30 minutes ago</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="">--}}
                {{--<a href="#!" class="displayChatbox">--}}
                {{--<i class="ti-comments"></i>--}}
                {{--<span class="badge bg-c-green"></span>--}}
                {{--</a>--}}
                {{--</li>--}}
                <li class="user-profile header-notification">
                    <a href="#!" class="nav-link">
                        <img src="{{asset('/files/backend/assets/images/avatar-4.jpg')}}" class="img-radius"
                            alt="User-Profile-Image">
                        <span>ADMIN</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        {{-- @if(Session::get('stat_admin') == 'poweradmin') --}}
                        {{-- <li>
                            <a href="">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li> --}}
                        {{-- @endif --}}
                        {{-- <li>
                            <a href="{{url('backoffice/profile')}}">
                        <i class="ti-user"></i> Profile
                        </a>
                        </li> --}}
                        {{--<li>--}}
                        {{--<a href="email-inbox.html">--}}
                        {{--<i class="ti-email"></i> My Messages--}}
                        {{--</a>--}}
                        {{--</li>--}}

                        <li>
                                   <a href="{{url('/')}}" target="_blank" class="nav-link">
                        <i class="ion-earth"></i> Go To Fronend
                        </a>
                        </li>
                        <li><a href="{{url('/logoutBackend')}}" target="_blank" class="nav-link"><i class="ion-earth"></i> Log out</a></li>
                        {{-- <li>

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

                             <i class="ti-layout-sidebar-left"></i> {{ __('Logout') }}
                         </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- <li class="user-profile header-notification">
    <a href="#!" class="dropdown-toggle" >
        <img src="{{asset('/files/backend/assets/images/avatar-4.jpg')}}" class="img-radius"
alt="User-Profile-Image">
<span>Admin Trisak</span>
</a>
<ul class="show-notification profile-notification">
    <li>
        <a href="{{url('/')}}" target="_blank" class="dropdown-item">
            <i class="ion-earth"></i> Go To Fronend
        </a>
    </li>
    <li>

        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

            <i class="ti-layout-sidebar-left"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
</li> --}}
