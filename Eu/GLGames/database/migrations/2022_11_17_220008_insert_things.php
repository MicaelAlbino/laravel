<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cate1 = new \App\Models\Categoria(['nome' => 'Aventura']);
        $cate1->save();

        $cate2 = new \App\Models\Categoria(['nome' => 'Terror']);
        $cate2->save();

        $cate3 = new \App\Models\Categoria(['nome' => 'Rpg']);
        $cate3->save();

        $jogo = new \App\Models\Jogo(['nome' => 'Phamophobia', 'foto' => 'images/phasmophobia.jpg', 'preco' => '45', 'estoque' => 3, 'categoria_id' => $cate2-> id]);
        $jogo->save();

        $jogo2 = new \App\Models\Jogo(['nome' => 'The legend of zelda breath of the wild', 'foto' => 'images/zelda.jpg', 'preco' => '100', 'estoque' => 1, 'categoria_id' => $cate3-> id]);
        $jogo2->save();
        
        $jogo3 = new \App\Models\Jogo(['nome' => 'Rise of the tomb raider', 'foto' => 'images/tombraider.jpg', 'preco' => '25', 'estoque' => 5, 'categoria_id' => $cate1-> id]);
        $jogo3->save();

        $jogo4 = new \App\Models\Jogo(['nome' => 'Skyrim', 'foto' => 'images/skyrim.jpg', 'preco' => '20', 'estoque' => 7, 'categoria_id' => $cate3-> id]);
        $jogo4->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
