<?php

namespace App\Models;

class Jogo extends ModeloOficial
{
   protected $table = "jogos";
   protected $fillable = ['nome', 'foto', 'preco', 'estoque', 'categoria_id'];
}
