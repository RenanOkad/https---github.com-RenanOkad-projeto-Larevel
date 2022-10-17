<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->string('nome',255);
            $table->string('tipoPedido',255);
            $table->string('valorTotal',255);
            $table->string('descricao_longa',255);
            $table->timestamps();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->unsignedBigInteger('config_id');
            $table->foreign('config_id')->references('id')->on('configs');
        });

        DB::statement("ALTER TABLE `delivery_laravel`.`pedidos` CHANGE COLUMN `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
