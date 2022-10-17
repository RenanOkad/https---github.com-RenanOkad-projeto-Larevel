<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos_Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'pedido_id', 'qtd', 'valor'];

    protected $primaryKey = 'produto_id';
}
