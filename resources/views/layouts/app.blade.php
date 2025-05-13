<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio IED Capellanía</title>
    @vite('resources/js/app.js')
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f4f8fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #1565c0;
            width: 100vw;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(21,101,192,0.08);
            margin-bottom: 0;
            padding: 0;
        }
        .navbar-menu {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .navbar-menu a {
            color: #fff;
            text-decoration: none;
            font-size: 2rem;
            padding: 18px 0;
            flex: 1 1 0;
            text-align: center;
            transition: background 0.2s, color 0.2s;
            border-bottom: 4px solid transparent;
        }
        .navbar-menu a:hover, .navbar-menu a.active {
            background: #1976d2;
            color: #e3f2fd;
            border-bottom: 4px solid #fff;
        }
        .navbar-logo {
            display: none;
        }
        .container {
            max-width: 900px;
            margin: 40px auto 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(21,101,192,0.07);
            padding: 30px 40px;
        }
        @media (max-width: 700px) {
            .navbar-menu a {
                font-size: 1.3rem;
                padding: 12px 0;
            }
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-menu">
            <a href="{{ route('radio') }}" title="Radio"><i class="fas fa-radio"></i></a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/logout') }}" title="Salir"><i class="fas fa-sign-out-alt"></i></a>
                @else
                    <a href="{{ route('login') }}" title="Iniciar sesión"><i class="fas fa-sign-in-alt"></i></a>
                    <a href="{{ route('register') }}" title="Registrarse"><i class="fas fa-user-plus"></i></a>
                @endauth
            @endif
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
