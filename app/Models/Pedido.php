<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['nome','tipoPedido','valorTotal','descricao_longa','config_id','usuario_id'];

    public function usuarios(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function produtos(){
        return $this->belongsToMany('App\Models\Produto','produtos_pedidos', 'pedido_id','produto_id')
                ->withTimestamps()->withPivot('qtd','valor');
    }
}
