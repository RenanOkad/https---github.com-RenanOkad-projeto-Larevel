<?php

namespace Database\Seeders;

use App\Models\Produtos_Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Produtos_PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produtos_Pedido::factory(1)->create();
    }
}
