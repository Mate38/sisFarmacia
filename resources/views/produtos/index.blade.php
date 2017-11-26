@extends('adminlte::page')

{{ Session::get('message') }}

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Produtos
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="produtos">Produtos</a></li>
        <li class="active">Produtos</li>
      </ol>
    </section>
@stop

@section('content')
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Produtos cadastrados</h3>
    </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table id="produtos" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Valor</th>
          <th>Descrição</th>
          <th>Classificação</th>
          <th>Unidade Comprada</th>
          <th>Quantidade Comprada</th>
          <th>Nome Generico</th>
          <th>Id Fornecedor</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produtos as $produto)
       
          <tr>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->valor}}</td>
            <td>{{$produto->descricao}}</td>
            <td>{{$produto->classificacao}}</td>
            <td>{{$produto->unidade}}</td>
            <td>{{$produto->quantidade}}</td>
            <td>{{$produto->nome_generico}}</td>
            <td>{{$produto->fornecedores_idfornecedores}}</td>
            <td>
              <a href="/produtos/{{ $produto->idprodutos }}/edit" class="btn-sm bg-yellow">Editar</a>
            </td>
              
            <td>
            {!! Form::open(['url' => 'produtos/'.$produto->idprodutos, 'method' => 'DELETE', 'class'=>'form-horizontal', 'id'=>"form_buttons"]) !!}
              <a href="#" class="btn-sm bg-red" onClick="document.getElementById('form_buttons').submit();">Excluir</a>
            {!! Form::close() !!}
            </td>

          </tr>
        @endforeach
      </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

@stop