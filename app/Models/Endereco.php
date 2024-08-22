<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['contato_id', 'endereco', 'numero', 
                            'cep', 'bairro', 'complemento', 'cidade_id'];
    
    public function contato(){
        return $this->belongsTo('App\Models\Contato');
    }

    public function cidade(){
        return $this->belongsTo('App\Models\Cidade');
    }
}
