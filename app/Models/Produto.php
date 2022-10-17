<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome','preco','imagem','nome_url','vendas','descricao_longa','categoria_id'];

    public function categorias(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido','produtos_pedidos', 'produto_id','pedido_id')
                ->withTimestamps()->withPivot('qtd','valor');
    }
}
