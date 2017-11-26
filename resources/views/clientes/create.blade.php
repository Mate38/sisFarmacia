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
        <li><a href="/clientes">Clientes</a></li>
        <li class="active">Cadastro</li>
      </ol>
    </section>
@stop

@section('content')

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Cadastro de Cliente</h3>
    </div>

    {{ Form::model($cliente, array('route'=>array('clientes.store'))) }}
      <div class="box-body">
       
       <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
          <label for="nome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" placeholder="">
          </div>
        </div>
        <br/>
        <div class="form-group has-feedback {{ $errors->has('cpf') ? 'has-error' : '' }}">
          <label for="cpf" class="col-sm-2 control-label">CPF</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="cpf" placeholder="">
          </div>
        </div>
        <br/>
        <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
          <label for="endereco" class="col-sm-2 control-label">Endereço</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="endereco" placeholder="">
          </div>
        </div>
        <br/>
        <div class="box-footer">
          <button type="submit" class="btn btn-success pull-right">Salvar</button>
        </div>
      {{Form::close()}}
    </div>
  </div>
@endsection