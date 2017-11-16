@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Fornecedores
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="fornecedores">Fornecedores</a></li>
        <li class="active">Edição</li>
      </ol>
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
              <h3 class="box-title">Edição de fornecedores</h3>
            </div>
            <!-- /.box-header -->
    <!-- form start -->
            {!! Form::open(['url' => 'fornecedores/'.$detailpage->id, 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
              <div class="box-body">

                <div class="form-group has-feedback {{ $errors->has('Nome') ? 'has-error' : '' }}">
                  <label for="Nome" class="col-sm-2 control-label">Nome</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Nome" value="{{ $detailpage->Nome }}" placeholder="">
                  </div>
                </div>

                <div class="form-group has-feedback {{ $errors->has('CNPJ') ? 'has-error' : '' }}">
                  <label for="CNPJ" class="col-sm-2 control-label">CNPJ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="CNPJ" value="{{ $detailpage->CNPJ }}" placeholder="">
                  </div>
                </div>

                
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Salvar</button>
              </div>
            {!! Form::close() !!}
            <!--</form>-->
          </div>
          <!-- /.box -->

@stop