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
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->unsignedBigInteger('id');
            $table->integer('qtd');
            $table->string('venda',255);
            $table->string('status',255);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `delivery_laravel`.`carrinhos` CHANGE COLUMN `pedido_id` `pedido_id` BIGINT UNSIGNED NOT NULL, ADD PRIMARY KEY (`pedido_id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
};
