<?php

namespace Modules\Auth\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rolesusuarios()
    {
        return $this->hasMany('App\Models\RolesUsuarios', 'users_id');
    }
    public function user_carrera()
    {
        return $this->hasOne('App\Models\User_carreras', 'users_id');
    }
    public function puntos()
    {
        return $this->hasMany('App\Models\Puntos');
    }

    public function session()
    {
        return $this->hasMany('App\Models\session', 'user_id');
    }

    public function promociones()
    {
        return $this->hasMany('App\Models\Promociones');
    }
    public function material()
    {
        return $this->hasMany('App\Models\EntregaMaterial');
    }
    public function entregas()
    {
        return $this->hasMany('App\Models\Entregas');
    }
    public function transciones()
    {
        return $this->hasMany('App\Models\Transciones');
    }
    /**
     * Genera un nombre de usuario único combinando el nombre y el apellido de una persona.
     *
     * @param int $idPersona El ID de la persona.
     * @return string|null El nombre de usuario generado o null si no se puede generar.
     */
    public function generarNombreUsuario($nombreCompleto)
    {
        // Convertir el nombre completo a minúsculas
        $nombre = strtolower($nombreCompleto);
    
        // Obtener el primer nombre
        $primerNombre = explode(' ', $nombre)[0];
    
        // Generar un número aleatorio
        $numeroAleatorio = rand(100, 999);
    
        // Formar el nombre de usuario
        $nombreUsuario = $primerNombre . '.' . $numeroAleatorio;
    
        // Verificar si el nombre de usuario ya existe en la base de datos
        while (User::where('email', $nombreUsuario . '@verdies.com')->exists()) {
            // Generar un nuevo número aleatorio
            $numeroAleatorio = rand(100, 999);
            // Formar el nuevo nombre de usuario
            $nombreUsuario = $primerNombre . '.' . $numeroAleatorio;
        }
    
        // Devolver el nombre de usuario con el dominio
        return $nombreUsuario . '@verdies.com';
    }

    /**
     * Genera una contraseña segura siguiendo estándares de seguridad comunes.
     *
     * @param int $longitud La longitud de la contraseña a generar (por defecto: 12).
     * @return string La contraseña generada.
     */
    public static function generarContrasenaSegura()
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres);
        $contraseña = '';

        for ($i = 0; $i < 8; $i++) {
            $indice_aleatorio = mt_rand(0, $longitud_caracteres - 1);
            $contraseña .= $caracteres[$indice_aleatorio];
        }

        return $contraseña;
    }


    

    // Obtener el token de recuerdo
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    // Establecer el token de recuerdo
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
    }
}
