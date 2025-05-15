@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required><br><br>

        <label for="role_id">Rol:</label><br>
        <select name="role_id" id="role_id">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->role_name }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('users.index') }}">Volver a la lista</a>
@endsection
