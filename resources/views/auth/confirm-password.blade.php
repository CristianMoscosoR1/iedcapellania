<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #b3c6ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .confirm-box {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(21,101,192,0.13);
            padding: 32px 28px;
            max-width: 350px;
            width: 100%;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .confirm-box h2 {
            color: #1976d2;
            text-align: center;
            margin-bottom: 18px;
        }
        .confirm-box input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #b3c6ff;
            border-radius: 6px;
            margin-bottom: 12px;
            font-size: 1rem;
        }
        .confirm-box button {
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 0;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .confirm-box button:hover {
            background: #1565c0;
        }
        .confirm-box label {
            color: #1976d2;
            font-size: 0.95rem;
        }
    </style>
    <div class="confirm-box">
        <h2>Confirmar contraseña</h2>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <button type="submit">{{ __('Confirm') }}</button>
        </form>
    </div>
</x-guest-layout>
