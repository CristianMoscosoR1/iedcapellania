<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Colegio Radio') }}</title>
    @vite('resources/js/app.js')
    <style>
        body {
            background: linear-gradient(135deg, #b3c6ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(21,101,192,0.13);
            padding: 32px 28px;
            max-width: 400px;
            width: 100%;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .top-right.links {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-bottom: 18px;
        }
        .top-right.links a {
            color: #1976d2;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .top-right.links a:hover {
            color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    <a href="{{ route('register') }}">Registrarse</a>
                @endauth
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
