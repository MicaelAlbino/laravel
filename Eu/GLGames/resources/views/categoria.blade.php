@extends("layout")
@section("conteudo")
    <h2>Categorias</h2>

    @if(isset($listaCategoria) && count($listaCategoria) > 0)
        <ul> 
            <a href="{{ route('categoria')}}">Todos</a></li>
            @foreach($listaCategoria as $cat)
                <a href="{{ route('categoria_por_id', ['idcategoria' => $cat->id])  }}">{{$cat->nome}}</a></li>
            @endforeach
        </ul>
    @endif

    @include("_produtos", ['lista' => $lista])
@endsection