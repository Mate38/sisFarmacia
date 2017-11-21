<!-- Autores: jeferson, Jean -->

@extends('welcome')

@section('content')
<h1>Atualização saldo</h1>
<hr />
<?php 
  $valor = 0.0;
?>
<table class="table table-bordered">
  <tr>
  <th>Nome</th>
  <th>CPF</th>
  <th>Endereço</th>
  <th>Saldo</th>
  </tr>
    <tr>
      <td>{{ $cliente -> nome}}</td>
      <td>{{ $cliente -> cpf}}</td>
      <td>{{ $cliente -> endereco}}</td>
      <td>{{ $cliente -> saldo}}</td>
    </tr>
  </table>

<table class="table table-bordered">
  <tr>
  <th>Valor Da Operação</th>
  <th>Creditar</th>
  <th>Debitar</th>
  </tr>
    <tr>
    {{ Form::open(array('url' => "clientes/transacao/$cliente->idclientes" )) }}
      <td>{{ Form::text('valor', $valor) }}</td>
      <td>
        <input class="btn btn-default" arial-label="Mostrar Cliente" type="submit" name="creditar" value="creditar">

        </input></td>
         <td><input class="btn btn-default"
          arial-label="Mostrar Cliente" type="submit" name="debitar" value="debitar">
        </input></td>

        {{ Form::close() }}
    </tr>
  </table>

  <a href="/clientes" class="btn btn-success pull-left"
arial-label="Clientes">Clientes
</a>

<a href="/" class="btn btn-success pull-right" 
arial-label="Menu Principal">Menu Principal
</a>

@endsection