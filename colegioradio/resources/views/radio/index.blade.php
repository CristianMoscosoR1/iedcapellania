@extends('layouts.app')

@section('content')
<style>
    .radio-btn {
        display: inline-block;
        padding: 12px 28px;
        margin: 10px 0;
        font-size: 1.1em;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(90deg, #1976d2 60%, #1565c0 100%);
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(25, 118, 210, 0.15);
        text-decoration: none;
        transition: background 0.3s, transform 0.2s;
    }
    .radio-btn:hover {
        background: linear-gradient(90deg, #1565c0 60%, #1976d2 100%);
        transform: translateY(-2px) scale(1.03);
    }
    .auth-btns {
        display: flex;
        gap: 18px;
        justify-content: center;
        margin-top: 30px;
    }
    .auth-btn {
        display: inline-block;
        padding: 10px 22px;
        font-size: 1em;
        font-weight: 500;
        color: #1976d2;
        background: #fff;
        border: 2px solid #1976d2;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s, color 0.3s;
    }
    .auth-btn:hover {
        background: #1976d2;
        color: #fff;
    }
</style>
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-blue-900 via-blue-700 to-blue-400 text-white p-6">
    <!-- Encabezado de la radio -->
    <div class="flex flex-col items-center mb-10">
        <div class="flex items-center gap-4">
            <i class="fas fa-broadcast-tower text-5xl text-white drop-shadow-lg"></i>
            <h1 class="text-3xl md:text-5xl font-bold tracking-wide drop-shadow-lg">Radio Colegio IED Capellanía</h1>
        </div>
        <p class="mt-3 text-lg md:text-xl text-blue-100 font-light">¡Sintoniza la voz de nuestra comunidad educativa!</p>
    </div>
    <!-- GIF y botones de autenticación -->
    <div class="mb-12 flex flex-row items-start justify-center gap-16 w-full max-w-2xl bg-white/20 rounded-xl shadow-2xl p-10 backdrop-blur-md">
        <img src="{{ asset('images/radio.gif') }}" alt="Radio GIF" class="rounded-lg shadow-lg max-h-60 border-4 border-white/30">
        <div class="flex flex-col gap-6 ml-6">
            <a href="{{ route('login') }}" class="auth-btn">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="auth-btn">Registrarse</a>
        </div>
    </div>
    <!-- Botón para escuchar radio -->
    <a href="#radio-player" class="radio-btn mb-12">Escuchar Radio</a>
    <!-- Reproductor -->
    <div class="w-full max-w-xl bg-white/20 rounded-xl p-8 shadow-2xl backdrop-blur-md mt-10">
        <audio id="radio-player" class="w-full">
            <source src="http://localhost:8000/stream" type="audio/mp3">
            Tu navegador no soporta el elemento de audio.
        </audio>
        <!-- Controles -->
        <div class="flex items-center justify-between mt-8 w-full gap-8">
            <button id="play-pause-btn" class="bg-blue-700 hover:bg-blue-900 p-4 rounded-full text-white shadow transition">
                <i class="fas fa-play"></i>
            </button>
            <input type="range" id="volume" class="w-1/2 accent-blue-600" min="0" max="1" step="0.01" value="1">
            <button id="mute-btn" class="bg-gray-600 hover:bg-gray-800 p-4 rounded-full text-white shadow transition">
                <i class="fas fa-volume-mute"></i>
            </button>
        </div>
        <!-- Sección de comentarios -->
        <div class="w-full max-w-xl mt-12 bg-white/20 rounded-lg p-6 shadow-lg backdrop-blur-md">
            <h2 class="text-2xl font-semibold text-white mb-6">Comentarios</h2>
            <!-- Formulario para nuevo comentario -->
            <form method="POST" action="{{ route('comments.store') }}" class="mb-8">
                @csrf
                <textarea name="comment" rows="3" class="w-full rounded p-3 text-gray-800" placeholder="Escribe tu comentario..." required></textarea>
                <button type="submit" class="mt-3 bg-blue-700 hover:bg-blue-900 text-white px-6 py-2 rounded transition">Enviar</button>
            </form>
            <!-- Lista de comentarios -->
            <div class="space-y-6">
                @foreach($comments as $comment)
                    <div class="bg-white/80 rounded p-4 text-gray-900 shadow flex flex-col">
                        <span class="font-bold text-blue-700">{{ $comment->user->name ?? 'Anónimo' }}</span>
                        <span class="text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
                        <p class="mt-2">{{ $comment->content }}</p>
                        <div class="flex gap-4 mt-2">
                            <button class="text-blue-600 hover:underline text-sm">Responder</button>
                            <button class="text-green-600 hover:underline text-sm">👍 Like</button>
                            <button class="text-red-600 hover:underline text-sm">Reportar</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    const playPauseBtn = document.getElementById("play-pause-btn");
    const radioPlayer = document.getElementById("radio-player");
    const muteBtn = document.getElementById("mute-btn");
    const volumeControl = document.getElementById("volume");

    // Play/Pause toggle
    playPauseBtn.addEventListener("click", () => {
        if (radioPlayer.paused) {
            radioPlayer.play();
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            radioPlayer.pause();
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    });

    // Mute/Unmute
    muteBtn.addEventListener("click", () => {
        if (radioPlayer.muted) {
            radioPlayer.muted = false;
            muteBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        } else {
            radioPlayer.muted = true;
            muteBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        }
    });

    // Control de volumen
    volumeControl.addEventListener("input", () => {
        radioPlayer.volume = volumeControl.value;
    });
</script>
@endsection
