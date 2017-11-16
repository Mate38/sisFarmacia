<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vendas';

    /**
     * Run the migrations.
     * @table vendas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idvendas');
            $table->date('data_venda')->nullable();
            $table->decimal('valor_total', 10, 2)->nullable();
            $table->unsignedInteger('clientes_idcliente');
            $table->unsignedInteger('vendedores_idvendedores');

            $table->index(["clientes_idcliente"], 'fk_Vendas_Clientes1_idx');

            $table->index(["vendedores_idvendedores"], 'fk_vendas_vendedores1_idx');


            $table->foreign('clientes_idcliente', 'fk_Vendas_Clientes1_idx')
                ->references('idclientes')->on('clientes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('vendedores_idvendedores', 'fk_vendas_vendedores1_idx')
                ->references('idvendedores')->on('vendedores')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
