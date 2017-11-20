@extends('welcome')

<!-- Autores: jeferson, Jean -->

@section('content')
  <h2>Cadastro de Cliente<h2>
  <hr />

  <form action="/clientes.store" method="DELETE">
      <div>
          <label for="name">Nome:</label>
          <input type="text" id="name"/>
      </div>

      <div>
          <label for="cpf">CPF:</label>
          <input type="text" id="cpf"/>
      </div>

      <div>
          <label for="endereco">Endereço:</label>
          <input type="text" id="endereco"/>
      </div>

        <button class="btn btn-success" type="submit">Salvar</button>
  </form>
  
@endsection