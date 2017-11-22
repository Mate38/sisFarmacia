@extends('adminlte::page')

{{ Session::get('message') }}

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Estoques
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Estoques</li>
      </ol>
    </section>
@stop

@section('content')

  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Estoques cadastrados</h3>
    </div>
      <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table id="estoques" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Quantidade</th>     
          <th>Data de chegada</th>  
          <th>Data de vencimento</th>  
          <th>Data de fabricacao</th>  
          <th>Lote de produto</th>  
          <th>Id do Produto</th>  
         
        </tr>
      </thead>
      <tbody>
        @foreach($estoques as $estoque)
          <tr>
            <td>{{$estoque->Quantidade}}</td>
            <td>{{$estoque->Data_chegada}}</td>
            <td>{{$estoque->Data_vencimento}}</td>
            <td>{{$estoque->Data_fabricacao}}</td>
            <td>{{$estoque->Lote_produto}}</td>
            <td>{{$estoque->Produtos_idProdutos}}</td>

            <td>
              {!! Form::open(['url' => 'estoques/'.$estoques->id, 'method' => 'delete', 'class'=>'form-horizontal', 'id'=>"form_buttons"]) !!}
                <a href="/estoques/{{ $estoque->id }}/edit" class="btn-sm bg-yellow">Editar</a>
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
