@extends('welcome')

<!-- Autores: jeferson, Jean -->

@section('content')

  <div class="row fixarTopo">
<h1>Clientes</h1>
<hr />

<a href="/home" class="btn btn-success pull-right">
  Menu Principal
</a>

<a href="/clientes/create" class="btn btn-info pull-right" style="margin-right: 10px">
  Cadastrar Cliente
</a>
  <br />
  <br />
  <br />
</div>

<div class="row">
  @if(Session::has('message'))
    <div class="alert alert-success">
      <em> {!! session('message') !!}</em>
      </div>
  @endif

<table class="table table-bordered">
  <tr>
  <th>ID</th>
  <th>Nome</th>
  <th>CPF</th>
  <th>Endereço</th>
   <th>Saldo</th>
  <th>Atualizar Cadastro</th>
  <th>Deletar Cliente</th>
  </tr>

    @foreach($clientes as $cliente)
    <tr>
      <td>{{ $cliente -> idclientes}}</td>
      <td>{{ $cliente -> nome}}</td>
      <td>{{ $cliente -> cpf}}</td>
      <td>{{ $cliente -> endereco}}</td>
      <td>
        <a href="/clientes/{{ $cliente->idclientes }}" class="btn btn-default"
          arial-label="Mostrar Cliente">
          <span class="glyphicon glyphicon-eye-open"
          arial-hidden="true"></span>
        </a>
      </td>
      <td>
        <a href="/clientes/{{ $cliente->idclientes }}/edit" class="btn btn-default"
          arial-label="Editar Cliente">
          <span class="glyphicon glyphicon-pencil"
          arial-hidden="true"></span>
        </a>
      </td>
      <td>
      {{ Form::open( array('url' => "clientes/$cliente->idclientes") ) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class' => 'btn btn-warning', 'type' => 'submit')) }}
      {{ Form::close()}}
      </td>
    </tr>

    @endforeach
  </table>
</div>
@endsection