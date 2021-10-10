<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('users.search') }}">{{ __('app.search_your_family') }}</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?';?>
                <li><a href="{{ url(url()->current() . $mark . 'lang=en') }}">English</a></li>
                <li><a href="{{ url(url()->current() . $mark . 'lang=ar') }}">العربية</a></li>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{{ __("auth.login") }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __("auth.register") }}</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if (is_system_admin(auth()->user()))
                                <li><a href="{{ route('backups.index') }}">{{ __('backup.list') }}</a></li>
                            @endif
                            <li><a href="{{ route('profile') }}">{{ __('app.my_profile') }}</a></li>
                            <li><a href="{{ route('password.change') }}">{{ __('auth.change_password') }}</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
				    {{ __("auth.logout") }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
