<?php

/**
 * Autor: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_Venda extends Model
{
    protected $table = "historico_vendas";

    protected $fillable = [
        'quantidade', 'valorTotal', 'produtos_id',
    ];
}
