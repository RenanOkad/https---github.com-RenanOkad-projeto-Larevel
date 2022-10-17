<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'imagem', 'nome_url','produtos'];

    public function cidades(){
        return $this->hasMany('App\Models\Produto');
    }
}
