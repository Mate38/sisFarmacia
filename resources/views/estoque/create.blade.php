@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Fornecedores
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="fornecedores">Estoque</a></li>
        <li class="active">Cadastro</li>
      </ol>
    </section>
@stop

@section('content')
 
      <div class="row">
        
        <div class="col-md-10 col-md-offset-1">
       
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastro do Estoque</h3>
            </div>
       
            {!! Form::open(array('url' => '/estoques', 'class'=>'form-horizontal')) !!}
              <div class="box-body">

                <div class="form-group has-feedback {{ $errors->has('Quantidade') ? 'has-error' : '' }}">
                  <label for="Quantidade" class="col-sm-2 control-label">Quantidade</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Quantidade" placeholder="">
                  </div>
                </div>
                
                
                <div class="form-group has-feedback {{ $errors->has('Data_chegada') ? 'has-error' : '' }}">
                  <label for="Data_chegada" class="col-sm-2 control-label">Data de Chegada</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Data_chegada" placeholder="">
                  </div>
                </div>

                 <div class="form-group has-feedback {{ $errors->has('Data_vencimento') ? 'has-error' : '' }}">
                  <label for="Data_vencimento" class="col-sm-2 control-label">Data de Vencimento</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Data_vencimento" placeholder="">
                  </div>
                </div>


                 <div class="form-group has-feedback {{ $errors->has('Data_fabricacao') ? 'has-error' : '' }}">
                  <label for="Data_fabricacao" class="col-sm-2 control-label">Data de Fabricação</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Data_fabricacao" placeholder="">
                  </div>
                </div>

                 <div class="form-group has-feedback {{ $errors->has('Lote_produto') ? 'has-error' : '' }}">
                  <label for="Lote_produto" class="col-sm-2 control-label">Lote de produto</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Lote_produto" placeholder="">
                  </div>
                </div>

                 <div class="form-group has-feedback {{ $errors->has('Produtos_idProdutos') ? 'has-error' : '' }}">
                  <label for="Produtos_idProdutos" class="col-sm-2 control-label">Id do produto</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Produtos_idProdutos" placeholder="">
                  </div>
                </div>
             

      

              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Salvar</button>
              </div>
            {!! Form::close() !!}
       
          </div>
        

@stop