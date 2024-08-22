<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];
    protected $primaryKey = 'usuario_id';
    public $incrementing = false;

    public function usuario(){
        return this->belongsTo('App\Models\Usuario');
    }
}
