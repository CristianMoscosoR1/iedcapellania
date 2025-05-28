@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Lista de usuarios</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botón de crear usuario centrado debajo de la tabla -->
        <div class="text-center mt-4">
            <a href="{{ route('users.create') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="fas fa-user-plus"></i> Crear nuevo usuario
            </a>
        </div>
    </div>
@endsection