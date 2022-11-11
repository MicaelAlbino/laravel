<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Contato;
use App\Models\jogo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Passar quantidades de Dados - para criar um DashBoard
        $numjogos = jogo::all()->count();
        $numContatos = Contato::all()->count();
        $numEmprestimos = Emprestimo::all()->count();
        $emprestimosadevolver = Emprestimo::where('datadevolucao','=',NULL)->get();
        return view('home',array('numjogos'=>$numjogos,'numContatos'=>$numContatos,'numEmprestimos'=>$numEmprestimos,'emprestimosadevolver'=>$emprestimosadevolver));
    }
}