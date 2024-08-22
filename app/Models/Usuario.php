<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $fillable = ['nome', 'email', 'senha', 'dataNascimento', 'setor_id'];

    protected $hidden = ['senha', 'remember_token'];

    public function setor(){
        return $this->belongsTo('App\Models\Setor');
    }

    public function perfil(){
        return $this->hasOne('App\Models\Perfil');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($usuario) {
            // Delete o perfil associado ao usuário
            $usuario->perfil()->delete();
        });
    }

    public function getAuthPassword(){
        return $this->senha;
    }
}
