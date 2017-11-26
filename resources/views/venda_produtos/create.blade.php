@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
        <h1>
            Venda de produtos
        </h1>
    </section>
    @stop

    @section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-success">

                {!! Form::open(array('url' => '/vendas', 'class'=>'form-horizontal')) !!}

                <div class="box-body">

                    <div class="form-group has-feedback {{ $errors->has('produtos_id') ? 'has-error' : '' }}">
                        <label for="produtos_id" class="col-sm-2 control-label">Produto</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="produtos_id">
                                <option value="">--- Escolha um produto ---</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->idprodutos }}">{{$produto->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('quantidade') ? 'has-error' : '' }}">
                        <label for="quantidade" class="col-sm-2 control-label">Quantidade</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="quantidade" placeholder="">
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn bg-blue pull-right">Adicionar</button>
                </div>
                {!! Form::close() !!}

            </div>

            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$valor_total}}</h3>
                    <p>Valor total</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
          </div>

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Estoques cadastrados</h3>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($venda_produtos as $venda_produto)
                            <tr>
                                @foreach($produtos as $produto)
                                    @if($produto->idprodutos == $venda_produto->produtos_id)
                                        <td>{{$produto->nome}}</td>
                                    @endif
                                @endforeach
                                <td>{{$venda_produto->quantidade}}</td>
                                <td>{{$venda_produto->valorTotal}}</td>
                                <td>
                                    {!! Form::open(['url' => 'vendas/'.$venda_produto->id, 'method' => 'delete', 'class'=>'form-horizontal', 'id'=>"form_buttons"]) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">Retirar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer">
                        {!! Form::open(['url' => 'vendas/finaliza', 'class'=>'form-horizontal', 'id'=>"form_buttons2"]) !!}
                            <button type="submit" class="btn btn-success pull-right">Encerrar</button>
                            <a href="vendas/prazo" class="btn bg-yellow pull-right">Marcar</a>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop


