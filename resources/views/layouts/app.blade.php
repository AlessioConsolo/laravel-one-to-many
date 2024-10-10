<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-office</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('admin.projects.index') }}">Gestione Progetti</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html> -->

<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <ul>
            @auth
                
                <li><a href="{{ route('admin.projects.index') }}">Gestione Progetti</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
            <li><a href="{{ route('register') }}">Registrati</a></li>
            @endguest
        </ul>
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
