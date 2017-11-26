@extends('adminlte::page')

<!-- Autores: jeferson, Jean -->

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>
@stop

@section('content')

<div class="row">
  @if(Session::has('message'))
    <div class="alert alert-success">
      <em> {!! session('message') !!}</em>
      </div>
  @endif

  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Clientes cadastrados</h3>
    </div>

<div class="box-body table-responsive no-padding">
      <table id="estoques" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Endereço</th>
          <th>Saldo</th>
          <th>Atualizar Cadastro</th>
          <th>Deletar Cliente</th>
          </tr>
        </thead>

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
  </div>
</div>
@endsection