<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        //llenar el created at y updated at automaticamente
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function asignarRole($role){
        //adjuntar un rol a un usuario
        //sync reemplaza los registros actuales con los nuevos
        $this->roles()->sync($role, false);
    }

    public function tieneRol(){
        return $this->roles->flatten()->pluck('name')->unique();
    }

}
