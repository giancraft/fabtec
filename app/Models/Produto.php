<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];

    public function vendas(){
        return $this->belongsToMany('App\Models\Pedido', 'pedido__produtos')
                    ->whitPivot('valorUnitario', 'quantidade');
    }
}
