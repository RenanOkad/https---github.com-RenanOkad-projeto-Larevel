<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PiramideController extends Controller
{
    public function calcular($altura, $ab, $tipoTinta){
        if($tipoTinta < 1 || $tipoTinta > 3){
            return "Tipo de tinta informado INVALIDO!";
        }
    
        $al = sqrt(pow($altura,2)+ pow($ab,2));
    
        $areaTriangulo = ($al * (2*$ab))/2;
    
        $areaBase = pow($ab*2,2);
    
        $areaTotal = $areaBase + ($areaTriangulo*4);
    
        $litros = $areaTotal/4.76;
    
        $latas = ceil($litros/18);
    
        if($tipoTinta == 1){
            $preco = $latas * 127.90;
        }elseif($tipoTinta == 2){
            $preco = $latas * 258.98;
        }elseif($tipoTinta == 3){
            $preco = $latas * 344.34;
        }
    
        $volume = ($areaBase * $altura)/3;
    
        echo "</br>Altura: ".$altura;
        echo "</br>ab: ". $ab;
        echo "</br>al: ". $al;
        echo "</br>Área do trinagulo: ". $areaTriangulo;
        echo "</br>Área da Base: ". $areaBase;
        echo "</br>Área da Total: ". $areaTotal;
        echo "</br>Tipo de Tinta: ". $tipoTinta;
        echo "</br>Litros: ". $litros;
        echo "</br>Latas: ". $latas;
        echo "</br>Preço: ". $preco;
        echo "</br>Volume: ". $volume;
        
}
}
