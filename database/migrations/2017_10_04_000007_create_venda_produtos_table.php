<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaProdutosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'venda_produtos';

    /**
     * Run the migrations.
     * @table venda_produtos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idvenda_produtos');
            $table->integer('quantidade')->nullable();
            $table->decimal('valor_unitario', 10, 2)->nullable();
            $table->unsignedInteger('vendas_idvendas');

            $table->index(["vendas_idvendas"], 'fk_vendaprodutos_vendas1_idx');


            $table->foreign('vendas_idvendas', 'fk_vendaprodutos_vendas1_idx')
                ->references('idvendas')->on('vendas')
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
