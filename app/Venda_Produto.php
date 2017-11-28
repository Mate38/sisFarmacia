<?php

/**
 * Autor: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda_Produto extends Model
{
    protected $table = "venda_produtos";

    protected $fillable = [
        'quantidade', 'valorTotal', 'produtos_id',
    ];

    public function vendas()
    {
        $this->hasMany(Venda::class);
    }

    public function produtos()
    {
        $this->hasMany(Produto::class);
    }
}
