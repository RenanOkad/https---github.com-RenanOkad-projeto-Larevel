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
        Schema::create('produtos__pedidos', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');

            $table->integer('qtd');
            $table->float('valor');
            $table->timestamps();

            $table->primary(['produto_id','pedido_id']);
        });

        DB::statement("ALTER TABLE `delivery_laravel`.`produtos__pedidos` CHANGE COLUMN `produto_id` `produto_id` BIGINT UNSIGNED NOT NULL;");
        DB::statement("ALTER TABLE `delivery_laravel`.`produtos__pedidos` CHANGE COLUMN `pedido_id` `pedido_id` BIGINT UNSIGNED NOT NULL;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos__pedidos');
    }
};
