@extends('layouts.app')

@section('content')
    <h1>Detalles del Usuario</h1>

    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Rol:</strong> {{ $user->role->role_name }}</p>

    <a href="{{ route('users.edit', $user->id) }}">Editar</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <br><br>
    <a href="{{ route('users.index') }}">Volver a la lista</a>
@endsection
