@extends('adminlte::page')

{{ Session::get('message') }}

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Fornecedores
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fornecedores</li>
      </ol>
    </section>
@stop

@section('content')

  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Fornecedores cadastrados</h3>
    </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table id="fornecedores" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Nome</th>     
          <th>CNPJ</th>
          <th>Endereco</th>
          <td>Editar</th>
          <td>Excluir</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach($fornecedores as $fornecedor)
          <tr>
            <td>{{$fornecedor->nome}}</td>
            <td>{{$fornecedor->cnpj}}</td>
            <td>{{$fornecedor->endereco}}</td>
            <td>
              <a href="/fornecedores/{{ $fornecedor->idfornecedores }}/edit" class="btn-sm bg-yellow">Editar</a>
            </td>
            <td>
              {!! Form::open(['url' => 'fornecedores/'.$fornecedor->idfornecedores, 'method' => 'DELETE', 'class'=>'form-horizontal', 'id'=>"form_buttons"]) !!}
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
