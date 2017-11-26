@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Produtos
      </h1>
    </section>
@stop

@section('content')
  <!-- Main content -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 col-md-offset-1">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastro de produtos</h3>
            </div>
            <!-- /.box-header -->
    <!-- form start -->

            {!! Form::open(array('url' => '/produtos', 'class'=>'form-horizontal')) !!}
            <!--<form class="form-horizontal" method="post" action="/produtos">-->
              <div class="box-body">

              <!--{!! csrf_field() !!}-->

                <div class="form-group has-feedback {{ $errors->has('Nome') ? 'has-error' : '' }}">
                  <label for="Nome" class="col-sm-2 control-label">Nome</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Nome" placeholder="Nome do produto">
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Valor') ? 'has-error' : '' }}">
                  <label for="Valor" class="col-sm-2 control-label">Valor de venda</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Valor" placeholder="Valor do produto">
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Descricao') ? 'has-error' : '' }}">
                  <label for="Descricao" class="col-sm-2 control-label">Descrição</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Descricao" placeholder="Informações adicionais do produto"></textarea>
                   
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Classificacao') ? 'has-error' : '' }}">
                  <label for="Classificacao" class="col-sm-2 control-label">Classificação</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Classificacao" placeholder="Classificação do produto"></textarea>
                    
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Unidade_comp') ? 'has-error' : '' }}">
                  <label for="Unidade_comp" class="col-sm-2 control-label">Unidade Comprada</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Unidade_comp" placeholder="Unidade comprada"></textarea>
                    
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Quantidade_comp') ? 'has-error' : '' }}">
                  <label for="Quantidade_comp" class="col-sm-2 control-label">Quantidade Comprada</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Quantidade_comp" placeholder="Quantidade Comprada"></textarea>
                  
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Nome_generico') ? 'has-error' : '' }}">
                  <label for="Nome_generico" class="col-sm-2 control-label">Nome Genérico</label>
                  <div class="col-sm-10">
                  <textarea type="text" class="form-control" rows="3" name="Nome_generico" placeholder="Nome Genérico"></textarea>
                   
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('Fornecedor_idFornecedor') ? 'has-error' : '' }}">
                  <label for="Fornecedor_idFornecedor" class="col-sm-2 control-label">Fornecedor</label>
                  <div class="col-sm-10">
                    <select id="Fornecedor_idFornecedor" name="Fornecedor_idFornecedor" class="form-control">
                      @foreach($fornecedores as  $fornecedor)
                          <option value="{{$fornecedor->idfornecedores}}">{{$fornecedor->nome}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                



              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                <button type="submit" class="btn btn-success pull-right">Salvar</button>
              </div>
            {!! Form::close() !!}
            <!--</form>-->
          </div>
          <!-- /.box -->

@stop

