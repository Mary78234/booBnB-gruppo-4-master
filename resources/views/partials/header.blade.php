
    <nav class="navbar-container">
        <div class="navbar">
            <div class="logo col-12">
                <h1>
                    <a class="boolblue"  href="{{ url('/') }}">
                        BOOLBNB
                    </a>
                </h1>
            </div>
            <div id="navbarSupportedContent" class="menu col-12">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <input type="text" placeholder="Cerca...">
                    </li>
                    @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li >
                                <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li >
                            <a  href="{{ route('user.home') }}">Dashboard</a>
                        </li>
                        <li>
                            <a  href="{{ route('user.house.create') }}">Nuova Casa</a>
                        </li>
                        <li >
                            <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>
                        </li>
                        <li>
                            <div  aria-labelledby="navbarDropdown">
                                <a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- <header>
        <nav class="navbar-container">
            <div class="navbar row">
                <div class="logo col-12">
                    <h1>
                        <router-link :to="{name: 'home'}">
                            BOOLBNB
                        </router-link>
                    </h1>
                </div>
                <div class="menu col-12">
                    <ul class="row">
                        <li class="col-offset-3 col-1">
                            <router-link :to="{name: 'home'}">Home</router-link>
                        </li>
                        <li class="col-4">
                            <input type="text" placeholder="Cerca...">
                        </li>
                        <li class="col-1 col-offset-3">
                            <div class="dropdown-menu">
                                <button class="dropdown-btn">
                                    Account
                                </button>
                                <div class="dropdown-content">
                                    <a href="http://localhost:8000/user" class="dropdown-item">Login</a>
                                    <a href="http://localhost:8000/register" class="dropdown-item">Register</a>
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
                        <router-link :to="{name: 'home'}" class="dropdown-item">Home</router-link>
                        <a href="http://localhost:8000/user" class="dropdown-item">Login</a>
                        <a href="http://localhost:8000/register" class="dropdown-item">Register</a>
                    </div>
                </div>
            </div>
        </nav>
    </header> -->