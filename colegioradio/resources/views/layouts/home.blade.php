@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-blue-500 to-teal-500 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col items-center gap-6">
            <h1 class="text-3xl font-bold text-center mb-4">Bienvenido a Colegio IED Capellanía</h1>
            <img src="{{ asset('images/radio.jpeg') }}" alt="Radio Colegio" style="max-width: 100%; border-radius: 10px; margin-bottom: 20px;">
            <a href="{{ route('radio') }}" class="bg-white rounded-lg shadow-xl px-8 py-6 text-center hover:shadow-2xl transition">
                <h3 class="text-2xl font-semibold text-blue-600">Escuchar Radio</h3>
                <p class="text-gray-600 mt-2">Sintoniza la radio y disfruta de los programas.</p>
            </a>
            @guest
                <div class="flex gap-4 mt-4 justify-center">
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition flex items-center gap-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="hidden sm:inline">Iniciar sesión</span>
                    </a>
                    <a href="{{ route('register') }}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition flex items-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        <span class="hidden sm:inline">Registrarse</span>
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>
@endsection
