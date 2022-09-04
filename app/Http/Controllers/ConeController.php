<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConeController extends Controller
{
    public function calcular($altura, $raio, $tipoTinta){

        $linha = "<br>—————————–";
        $pi = 3.14;

        if($tipoTinta < 1 || $tipoTinta > 3){
            return "Tipo de tinta informado INVALIDO!";
        }
    
        $geratriz = sqrt(pow($altura,2)+ pow($raio,2));
    
        $areaFundo = $pi *pow($raio,2);
    
        $areaTotal = $pi *$raio*($raio+ $geratriz);
    
        $areaLateral = $areaTotal - $areaFundo;
    
        $litros = $areaTotal*3.45;
    
        $latas = ceil($litros/18);
    
        if($tipoTinta == 1){
            $preco = $latas * 238.90;
        }elseif($tipoTinta == 2){
            $preco = $latas * 467.98;
        }elseif($tipoTinta == 3){
            $preco = $latas * 758.34;
        }
    
    
        echo "</br>Altura: ".$altura;
        echo "</br>Raio: ". $raio;
        echo "</br>Nível (Tipo de Tinta): ". $tipoTinta;
        echo $linha;
        echo "</br>Geratriz: ". $geratriz;
        echo $linha;
        echo "</br>Área do Fundo: ". $areaFundo;
        echo "</br>Área Lateral: ". $areaLateral;
        echo "</br>Área Total: ". $areaTotal;
        echo $linha;
        echo "</br>Litros: ". $litros;
        echo "</br>Latas: ". $latas;
        echo $linha;
        echo "</br>Preço: ". $preco;

    
}
}
