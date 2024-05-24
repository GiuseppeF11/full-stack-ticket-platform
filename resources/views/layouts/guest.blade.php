<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | Ticket Platform</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="ticket-container"></div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @auth
                                
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        </ul>

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-outline-danger">
                                    Log Out
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4">
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>


<style lang="scss" scoped>

    .ticket-container {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-image: url(https://www.creativefabrica.com/wp-content/uploads/2022/01/09/ticket-icon-template-Graphics-23210275-1.jpg);
        background-position: center;
        background-size: cover;
    }
    
    
    .nav-item{
        transition: 0.3s;
        margin: 0 10px;
    
        &:hover {
            background-color: lightgrey;
            border-radius: 10px;
        }
    }
    
    .active{
        font-weight: 700;
    }
    
    </style>