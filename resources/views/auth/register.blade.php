<style>
    body {
        background: linear-gradient(135deg, #b3c6ff 0%, #e6f0ff 100%);
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-box {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(21, 101, 192, 0.13);
        padding: 32px 28px;
        max-width: 400px;
        width: 100%;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .register-box h2 {
        color: #1976d2;
        text-align: center;
        margin-bottom: 18px;
    }

    .register-box input[type="text"],
    .register-box input[type="email"],
    .register-box input[type="password"],
    .register-box select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #b3c6ff;
        border-radius: 6px;
        margin-bottom: 12px;
        font-size: 1rem;
        background: #fff;
        color: #333;
    }

    .register-box select {
        appearance: none;
        cursor: pointer;
    }

    .register-box button {
        background: #1976d2;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 14px 0;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background 0.2s;
        width: 100%;
        text-align: center;
        margin-top: 12px;
    }

    .register-box button:hover {
        background: #1565c0;
    }

    .register-box label {
        color: #1976d2;
        font-size: 0.95rem;
    }

    .register-box .links {
        text-align: center;
        margin-top: 10px;
    }

    .register-box .links a {
        color: #1976d2;
        text-decoration: none;
        font-size: 0.95rem;
    }
</style>

<x-guest-layout>
    <div class="register-box">
        <h2>Registro</h2>
        <form method="POST" action="{{ url('/register') }}">
            @csrf

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <!-- Campo de selección de rol mejorado -->
            <label for="rol_id">Rol</label>
            <select id="rol_id" name="rol_id" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('rol_id')" class="mt-2" />

            <button type="submit">Registrarse</button>
        </form>
    </div>
</x-guest-layout>