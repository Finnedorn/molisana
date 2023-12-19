<header class="bg-white">
    <div id="logo" class="text-center">
        <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="">
    </div>
    <div id="main-menu">

        <nav class="navbar-nav container navbar-light">
            <ul class="list-unstyled d-flex justify-content-center gap-2 text-uppercase">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">

                  <a class="nav-link {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        Prodotti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'recipes.index' ? 'active' : '' }}"
                        href="{{ route('recipes.index') }}">
                        Ricette
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link {{ Route::currentRouteName() == 'products.create' ? 'active' : '' }}"
                        href="{{ route('products.create') }}">
                        Inserisci prodotto
                    </a> --}}
                </li>
            </ul>
        </nav>
    </div>
</header>
</div>
