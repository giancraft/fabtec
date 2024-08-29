<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Produto extends Model
{
    use HasFactory;

    protected $fillable = ['valorUnitario', 'quantidade', 'produto_id', 'pedido_id'];
}
