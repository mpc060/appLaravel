<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/">Home </a>
            </li>
            <li @if($current=="usuarios") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/usuarios">Usuários </a>
            </li>  
             <li @if($current=="grupos") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/grupos">Grupos </a>
            </li>
            <li @if($current=="sorteio") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/sorteio">Sorteio de Grupo </a>
            </li>
            <li @if($current=="sorteiousuario") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/sorteiousuario">Sorteio de Usuário </a>
            </li>
            @auth
                <li class="nav-item active">
                    <a class="nav-link" >Você está autenticado</a>
                </li>
            @endauth
            @guest
                <li class="nav-item active">
                    <a class="nav-link" >Você deve estar autenticado para acessar o conteúdo desta página</a>
                </li>
            @endguest
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>