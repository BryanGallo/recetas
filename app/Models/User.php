<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion de 1:n Usuario a Recetas
    //un usuario puede tener multiples recetas
    public function userRecetas()
    {
        return $this->hasMany(Receta::class);
    }

    protected static function booted()
    {
        parent::booted();
        static::created(function ($user) {
            $user->userPerfil()->create();
        });
    }


    //relacion usuario-perfil de uno a uno
    public function userPerfil()
    {
        return $this->hasOne(Perfil::class);
    }
}
