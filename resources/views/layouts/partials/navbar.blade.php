<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a  href="{{ url('/') }}" class="mr-10">
            <img src="/img/hblogo-white.png" class="navbar-brand p-6">
            <span class="text-white text-xl">Home Buyer Nation</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'font-weight-bold text-dark' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    @unlessrole('esp|buyer')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('home-for-sale') ? 'font-weight-bold text-dark' : '' }}" href="{{ route('home-for-sale.index') }}">{{ __('Homes') }}</a>
                        </li>
                    @endunlessrole
                @endauth
                @hasrole('agent')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('agent/buyers') ? 'font-weight-bold text-dark' : '' }}" href="{{route('agent-profile-list')}}">{{ __('Buyers') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('search') ? 'font-weight-bold text-dark' : '' }}" href="{{ url('/search') }}">{{ __('Search') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('agent/invite/list') ? 'font-weight-bold text-dark' : '' }}" href="{{ route('agent.invite.list') }}">{{ __('Invitations') }}</a>
                    </li>
                    <!--li class="nav-item">
                        <a class="nav-link" href="#">{{ __('Messages') }}</a>
                    </li-->
                @endhasrole

                @hasrole('buyer')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('buyer/profile*') ? 'font-weight-bold text-dark' : '' }}" href="{{ route('buyer.profile.index') }}">{{ __('Home Search') }}</a>
                    </li>
                @endhasrole
                @hasrole('agent|admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('buyer/profile*') ? 'font-weight-bold text-dark' : '' }}"
                           href="{{ route('home-for-sale.search') }}">{{ __('Home Search') }}</a>
                    </li>
                @endhasrole
                @hasrole('agent|esp|buyer')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('buyer/profile*') ? 'font-weight-bold text-dark' : '' }}"
                           href="{{ route('tutorial') }}"
                        >{{ __('Tutorial') }}</a>
                    </li>
                @endhasrole
                @hasrole('admin')
                <li class="nav-item">
                    <a class="nav-link" href="\nova">Nova</a>
                </li>
                @endhasrole
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">{{ __('About HBNation') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item">
                        <a class="nav-link" readonly="">{{ Auth::user()->registration_id }}</a>
                    </li>

                    <li class="nav-item">
                        <dropdown-menu label="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                           <a class="dropdown-item" href="{{ route('user.account') }}">{{ __('My Account') }}</a>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                       </dropdown-menu>

                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
