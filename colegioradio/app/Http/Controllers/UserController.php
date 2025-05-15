<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostrar todos los usuarios (solo accesible para admin)
    public function index()
    {
        $users = User::with('roles')->get(); // Asegúrate de tener la relación 'roles' definida en el modelo User
        return view('users.index', compact('users'));
    }

    // Mostrar el formulario para crear un usuario (solo accesible para admin)
    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles disponibles
        return view('users.create', compact('roles'));
    }

    // Guardar un nuevo usuario (solo accesible para admin)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'role_id' => 'nullable|exists:roles,id', // Validación para role_id
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id, // Asignación de role_id
        ]);

        // Asignar el rol al usuario
        $user->assignRole(Role::find($request->role_id)->name);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar un solo usuario (solo accesible para admin)
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Mostrar formulario para editar un usuario (solo accesible para admin)
    public function edit(User $user)
    {
        $roles = Role::all(); // Obtener todos los roles disponibles
        return view('users.edit', compact('user', 'roles'));
    }

    // Actualizar un usuario existente (solo accesible para admin)
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id'  => 'required|exists:roles,id',
        ]);

        // Actualizar el usuario
        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
        ]);

        // Asignar el nuevo rol al usuario
        $user->syncRoles([$request->role_id]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar un usuario (solo accesible para admin)
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
