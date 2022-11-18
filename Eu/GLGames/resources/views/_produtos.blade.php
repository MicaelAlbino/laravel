@if(isset($lista))
                @foreach($lista as $game)
            <div class="col-3 mb-3" >
                <div class="card">
                    <img src="{{ asset($game->foto)}}" class="card-img-top" style="max-height: 300px" />
                    <div class="card-body" style="max-height: 210px">
                        <h6 class="card-tittle">{{ $game->nome }}</h6> 
                        <p class="card-text">Valor: <b>R$ {{$game->preco}}</b></p>
                        <p class="card-text">Estoque: {{$game->estoque}}</p>
                        @foreach($listaCategoria as $cat)
                            @if($cat->id == $game->categoria_id)
                                <p class="card-text">Gênero: {{$cat->nome}}</p>
                            @endif
                        @endforeach
                        <a href="{{  route('adicionar_carrinho', ['idproduto' => $game->id])  }}" class="btn btn-sm btn-primary">Adicionar Item</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif