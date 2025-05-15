<style>
    body {
        background: linear-gradient(135deg, #b3c6ff 0%, #e6f0ff 100%);
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .verify-box {
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
    .verify-box h2 {
        color: #1976d2;
        text-align: center;
        margin-bottom: 18px;
    }
    .verify-box button {
        background: #1976d2;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 0;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
        margin-right: 10px;
    }
    .verify-box button:hover {
        background: #1565c0;
    }
    .verify-box .logout-btn {
        background: transparent;
        color: #1976d2;
        border: none;
        text-decoration: underline;
        font-size: 0.95rem;
        cursor: pointer;
        padding: 0;
        margin-left: 10px;
    }
    .verify-box .logout-btn:hover {
        color: #1565c0;
    }
    .verify-box .message {
        color: #333;
        font-size: 1rem;
        margin-bottom: 10px;
    }
    .verify-box .success {
        color: #388e3c;
        font-weight: 500;
        font-size: 0.98rem;
        margin-bottom: 10px;
    }
    .verify-box .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
</style>
<div class="verify-box">
    <h2>Verifica tu correo electrónico</h2>
    <div class="message">
        {{ __('¡Gracias por registrarte! Antes de comenzar, por favor verifica tu dirección de correo haciendo clic en el enlace que te acabamos de enviar. Si no recibiste el correo, te enviaremos otro con gusto.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="success">
            {{ __('Se ha enviado un nuevo enlace de verificación al correo que proporcionaste durante el registro.') }}
        </div>
    @endif

    <div class="actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">
                {{ __('Reenviar correo de verificación') }}
            </button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                {{ __('Cerrar sesión') }}
            </button>
        </form>
    </div>
</div>
</x-guest-layout>
