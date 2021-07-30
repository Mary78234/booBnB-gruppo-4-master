<header>
    <nav class="navbar-container">
        <div class="navbar">
            <div class="logo col-12">
                <h1>
                    <a class="boolblue"  href="{{ url('/') }}">
                        BOOLBNB
                    </a>
                </h1>
            </div>
            <div class="menu container col-12">
                <ul class="row">
                    <li class="col-offset-2 col-2">
                        <a href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('user.house.create') }}">
                            Aggiungi casa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.house.index') }}">
                            Vedi case
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.message.index') }}">
                            Messaggi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.sponsor') }}">
                            Sponsorizza
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-menu">
                            <button class="dropdown-btn">
                                Account
                            </button>
                            <div class="dropdown-content">
                                @guest
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                                @else
                                <a class="dropdown-item" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                @endguest
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="menu-search col-12">
                <input type="text" placeholder="Cerca...">
            </div>
            <div class="dropdown-menu responsive col-12 row">
                <button class="dropdown-btn">
                    Menù
                </button>
                <div class="dropdown-content">
                    @guest
                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                    <a class="dropdown-item" href="{{ route('user.home') }}">
                        Dashboard
                    </a>
                    <a class="dropdown-item" href="{{ route('user.house.create') }}">
                        Aggiungi casa
                    </a>
                    <a class="dropdown-item" href="{{ route('user.house.index') }}">
                        Vedi case
                    </a>
                    <a class="dropdown-item" href="{{ route('user.message.index') }}">
                        Messaggi
                    </a>
                    <a class="dropdown-item" href="{{ route('user.sponsor') }}">
                        Sponsorizza
                    </a>
                    <a class="dropdown-item" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="{{ route('user.home') }}">
                        {{ Auth::user()->email }}
                    </a>
                    <div class="dropdown-item" aria-labelledby="navbarDropdown">
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>