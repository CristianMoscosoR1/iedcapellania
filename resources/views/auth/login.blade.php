<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        body {
            background: linear-gradient(135deg, #b3c6ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(21, 101, 192, 0.13);
            padding: 32px 28px;
            max-width: 350px;
            width: 100%;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .login-box form {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 320px;
            width: 100%;
            margin: auto;
        }

        .login-box h2 {
            color: #1976d2;
            text-align: center;
            margin-bottom: 18px;
        }

        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #b3c6ff;
            border-radius: 6px;
            font-size: 1rem;
        }

        .login-box button {
            width: 90%;
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-box button:hover {
            background: #1565c0;
        }

        .login-box label {
            color: #1976d2;
            font-size: 0.95rem;
        }

        .login-box .form-check {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 10px;
        }

        .login-box .links {
            text-align: center;
            margin-top: 10px;
        }

        .login-box .links a {
            color: #1976d2;
            text-decoration: none;
            font-size: 0.95rem;
        }
    </style>
    <div class="login-box">
        <h2>Iniciar sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recuérdame</label>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <div class="links">
            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</x-guest-layout>