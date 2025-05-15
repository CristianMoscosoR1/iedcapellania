<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::create(['name' => 'gestionar usuarios']);
        Permission::create(['name' => 'editar programas']);
        Permission::create(['name' => 'ver comentarios']);

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['gestionar usuarios', 'editar programas', 'ver comentarios']);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['editar programas', 'ver comentarios']);

        $oyente = Role::create(['name' => 'oyente']);
        $oyente->givePermissionTo(['ver comentarios']);

        // Asignar rol a un usuario de prueba
        $user = User::where('email', 'admin@colegio.com')->first(); // Cambia por un email real
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
