@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="rol_id">Rol:</label><br>
        <select name="rol_id" id="rol_id">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('users.index') }}">Volver a la lista</a>
@endsection
