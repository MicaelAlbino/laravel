@extends("layout")
@section("conteudo")
<div class="col-12">
    <h2 class="mb-3">Cadastrar</h2>
</div>


        <form action="{{  route('cadastrar_cliente')  }}" method="post">
            @csrf
            <div class="row">
            <div class="col-6">
            <div class="form-group">
                Nome: <input type="text" name="nome" class="form-control" >
            </div>
            </div>

        
            <div class="col-6">
            <div class="form-group">
                CPF: <input type="text" name="cpf" class="form-control" >
            </div>
            </div>

            <div class="col-6">
            <div class="form-group">
                Email: <input type="email" name="contato" class="form-control" >
            </div>
            </div>
            
            <div class="col-6">
            <div class="form-group">
                Telefone: <input type="text" name="telefone" class="form-control" >
            </div>
            </div>

            <div class="col-3">
            <div class="form-group">
                Estado: <input type="text" name="estado" class="form-control" >
            </div>
            </div>

            
            <div class="col-3">
            <div class="form-group">
                CEP: <input type="text" name="cep" class="form-control" >
            </div>
            </div>

            <div class="col-6">
            <div class="form-group">
                Cidade: <input type="text" name="cidade" class="form-control" >
            </div>
            </div>
            </div>
            
            <center>
                <input type="submit" value="Cadastrar" class="btn btn-success btn-lg mt-3">
            </center>
        </form>


    @yield("conteudo")
@endsection