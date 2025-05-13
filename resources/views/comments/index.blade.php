@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Administración de Comentarios</h1>
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Usuario</th>
                <th class="py-2 px-4 border-b">Fecha</th>
                <th class="py-2 px-4 border-b">Comentario</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td class="py-2 px-4 border-b">{{ $comment->user->name ?? 'Anónimo' }}</td>
                <td class="py-2 px-4 border-b">{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                <td class="py-2 px-4 border-b">{{ $comment->content }}</td>
                <td class="py-2 px-4 border-b flex gap-2">
                    <!-- Botón de editar -->
                    <form action="{{ route('comments.update', $comment) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <input type="text" name="comment" value="{{ $comment->content }}" class="border rounded px-2 py-1" required>
                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</button>
                    </form>
                    <!-- Botón de eliminar -->
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('¿Seguro que deseas eliminar este comentario?')">Eliminar</button>
                    </form>
                    <!-- Botón de aprobar -->
                    <form action="{{ route('comments.approve', $comment) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Aprobar</button>
                    </form>
                    <!-- Botón de ocultar -->
                    <form action="{{ route('comments.hide', $comment) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded">Ocultar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection