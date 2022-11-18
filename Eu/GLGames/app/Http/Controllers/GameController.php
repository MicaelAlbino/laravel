<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Jogo;

class GameController extends Controller
{
    public function index(Request $request){
        $data = [];

        $listajogos = Jogo::all();
        $listacategoria = Categoria::all();

        $data["lista"] = $listajogos;
        $data["listaCategoria"] = $listacategoria;

        return view("home", $data);
    }

    public function categoria(Request $request, $idcategoria = 0){
        $data = [];
        $listacategoria = Categoria::all();

        $queryJogos = Jogo::limit(11);

        if($idcategoria != 0){
            $queryJogos->where("categoria_id", $idcategoria);
        }

        $listadejogos = $queryJogos->get();

        $data["lista"] = $listadejogos;
        $data["listaCategoria"] = $listacategoria;

        return view("categoria", $data);
    }


    public function adicionarCart(Request $request, $idProduto = 0){
            //busca prod por id
        $jogo = Jogo::find($idProduto);

        if($jogo){

            $cart = session('cart', []);

            array_push($cart, $jogo);
            session(['cart' => $cart]);
        }

        return redirect()->route("home");

    }


    public function abrirCart(Request $request){
        $cart = session('cart', []);
        $listacategoria = Categoria::all();
        $data = ['cart' => $cart];
        
        return view("carrinho", $data);

    }

    public function retirarCart(Request $request, $indice){
        $cart = session('cart', []);
        if(isset($cart[$indice])){
            unset($cart[$indice]);
        }
        session(["cart" => $cart]);
        return redirect()->route("ver_carrinho");
    }
}
