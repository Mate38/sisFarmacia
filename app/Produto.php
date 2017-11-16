<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    protected $fillable = [
        'nome',
		'valor',
		'descricao',
		'classificacao', 
		'unidade_comp', 
		'quantidade_comp', 
		'nome_generico', 
		'fornecedor_idfornecedor', 
    ];
    
}
