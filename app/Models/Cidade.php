<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'estado_id'];

    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }
}
