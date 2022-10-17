<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $primaryKey = 'pedido_id';
    
    protected $fillable = ['qtd','venda', 'status', 'pedido_id'];

    public function pedidos(){
        return $this->hasOne('App\Models\Pedido');
    }
}
