<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles; // Importar el trait para roles y permisos

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Usar el trait HasRoles

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben estar ocultos para los arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos de datos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Si se usa la verificación de email
        'password' => 'hashed', // Hash del password
    ];

    /**
     * Obtener las iniciales del nombre del usuario.
     *
     * @return string
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ') // Dividimos el nombre en partes
            ->map(fn (string $name) => Str::of($name)->substr(0, 1)) // Obtenemos la primera letra de cada parte
            ->implode(''); // Unimos las iniciales
    }

    /**
     * Obtener los roles del usuario.
     * 
     * Si usas Spatie, no necesitas definir esto manualmente,
     * ya que el paquete gestiona la relación.
     * 
     * Este método es solo si quieres obtener los roles de una manera personalizada.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'role_user');
    // }
}

