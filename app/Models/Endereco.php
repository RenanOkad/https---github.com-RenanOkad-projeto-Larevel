<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['nome','rua','numero','bairro','cidade_id'];

    public function cidades(){
        return $this->belongsTo('App\Models\Cidade');
    }
}
