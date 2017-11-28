@extends('adminlte::page')

{{ Session::get('message') }}

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Estoques
      </h1>
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
            <td>{{$estoque->quantidade}}</td>
            <td>{{$estoque->data_chegada}}</td>
            <td>{{$estoque->data_vencimento}}</td>
            <td>{{$estoque->data_fabricacao}}</td>
            <td>{{$estoque->lote_produto}}</td>
            <td>{{$estoque->nome($estoque->produtos_idprodutos)}}</td>

            <td>
              {!! Form::open(['url' => 'estoques/'.$estoque->idestoques, 'method' => 'delete', 'class'=>'form-horizontal', 'idestoques'=>"form_buttons"]) !!}
                <a href="/estoques/{{ $estoque->idestoques }}/edit" class="btn-sm bg-yellow">Editar</a>
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