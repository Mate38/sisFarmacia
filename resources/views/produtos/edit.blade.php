@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Produtos
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="produtos">Produtos</a></li>
        <li class="active">Cadastro</li>
      </ol>
    </section>
@stop

@section('content')

 
      <div class="row">
       
        <div class="col-md-10 col-md-offset-1">
        
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastro de produtos</h3>
            </div>
         
            {!! Form::open(['url' => 'produtos/'.$detailpage->id, 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
              <div class="box-body">




                <div class="form-group has-feedback {{ $errors->has('Nome') ? 'has-error' : '' }}">
                  <label for="nome" class="col-sm-2 control-label">Nome</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Nome" value="{{ $detailpage->Nome }}" placeholder="Nome do produto">
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Valor') ? 'has-error' : '' }}">
                  <label for="Valor" class="col-sm-2 control-label">Valor</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Valor" value="{{ $detailpage->Valor }}" placeholder="Valor">
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Descricao') ? 'has-error' : '' }}">
                  <label for="Descricao" class="col-sm-2 control-label">Descrição</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Descricao" placeholder="Descrição do produto">{{ $detailpage->Descricao }}</textarea>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Classificacao') ? 'has-error' : '' }}">
                  <label for="Classificacao" class="col-sm-2 control-label">Classificação</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Classificacao" placeholder="Classificacao do produto">{{ $detailpage->Classificacao }}</textarea>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Unidade_comp') ? 'has-error' : '' }}">
                  <label for="Unidade_comp" class="col-sm-2 control-label">Unidade Comprada</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Unidade_comp" placeholder="Unidade Comprada">{{ $detailpage->Unidade_comp }}</textarea>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Quantidade_comp') ? 'has-error' : '' }}">
                  <label for="Quantidade_comp" class="col-sm-2 control-label">Quantidade_comp</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Quantidade_comp" placeholder="Quantidade Comprada">{{ $detailpage->Quantidade_comp }}</textarea>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Nome_generico') ? 'has-error' : '' }}">
                  <label for="Nome_generico" class="col-sm-2 control-label">Nome Genérico</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Nome_generico" placeholder="Nome Genérico">{{ $detailpage->Nome_generico }}</textarea>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Nome_generico') ? 'has-error' : '' }}">
                  <label for="Nome_generico" class="col-sm-2 control-label">Nome Genérico</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Nome_generico" placeholder="Nome_generico">{{ $detailpage->Nome_generico }}</textarea>
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Fornecedor_idFornecedor') ? 'has-error' : '' }}">
                  <label for="Fornecedor_idFornecedor" class="col-sm-2 control-label">Id Fornecedor</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Fornecedor_idFornecedor" placeholder="Fornecedor_idFornecedor">{{ $detailpage->Fornecedor_idFornecedor }}</textarea>
                  </div>
                </div>





              </div>
           

              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Salvar</button>
              </div>
            {!! Form::close() !!}
           
          </div>
    

@stop