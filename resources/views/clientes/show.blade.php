<!-- Autores: jeferson, Jean -->

@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Clientes
      </h1>
    </section>
@stop

@section('content')
<?php 
  $valor = 0.0;
?>

<div class="box box-success">
  <div class="box-header">
    <h3 class="box-title">Atualizar saldo</h3>
  </div>

  <div class="box-body table-responsive no-padding">
    <table id="clientes" class="table table-bordered table-striped table-hover">
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

  <table id="clientes" class="table table-bordered table-striped table-hover">
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
  </div>

@endsection