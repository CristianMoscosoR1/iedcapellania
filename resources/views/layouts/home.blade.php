@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-blue-500 to-teal-500 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-6 py-12">
        <div class="text-center text-white mb-8">
            <h1 class="text-5xl font-extrabold">Bienvenido a Colegio ied capellania</h1>
            <p class="text-lg mt-4">El mejor lugar para gestionar programas, usuarios y más.</p>
            <img src="{{ asset('images/radio.jpg') }}" alt="Radio Colegio" class="mx-auto mt-8 mb-4 w-64 rounded-lg shadow-lg">
        </div>
        <div class="flex flex-col items-center gap-6">
            <a href="{{ route('radio') }}" class="bg-white rounded-lg shadow-xl px-8 py-6 text-center hover:shadow-2xl transition">
                <h3 class="text-2xl font-semibold text-blue-600">Escuchar Radio</h3>
                <p class="text-gray-600 mt-2">Sintoniza la radio y disfruta de los programas.</p>
            </a>
            @guest
                <div class="flex gap-4 mt-4">
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition">Registrarse</a>
                </div>
            @endguest
        </div>
    </div>
</div>
@endsection
