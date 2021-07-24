
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
                        <!-- <li>
                            <a  href="{{ route('user.house.create') }}">Nuova Casa</a>
                        </li>
                        <li >
                            <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>
                        </li> -->
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
