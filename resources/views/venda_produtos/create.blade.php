<!-- 
	Autor: Mateus Cardoso 
	E-mail: matecardoso38@gmail.com 
-->

@extends('adminlte::page')

@section('title')

    @section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box">

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
                        <!--@if ($errors->has('produtos_id'))
                            <span class="help-block">
                                <strong>Necessário selecionar um produto</strong>
                            </span>
                        @endif-->
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('quantidade') ? 'has-error' : '' }}">
                        <label for="quantidade" class="col-sm-2 control-label">Quantidade</label>
                        <div class="col-sm-10">
                        <input type="text" onkeypress='return event.keyCode > 47 && event.keyCode < 58'
                            class="form-control" name="quantidade" placeholder="">
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn bg-blue btn-flat pull-right">Adicionar</button>
                </div>
                {!! Form::close() !!}
            
            </div>

            <div class="box">

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
                                        <button type="submit" class="btn btn-xs btn-flat btn-danger">Retirar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td style="background-color: #E6E6E6;"></td>
                                <td style="text-align: right; background-color: #E6E6E6;">
                                    <b>TOTAL:</b>
                                </td>
                                <td style="background-color: #E6E6E6;">
                                    <b>{{$valor_total}}</b>
                                </td>
                                <td style="background-color: #E6E6E6;">
                                    {!! Form::open(['url' => 'vendas', 'method' => 'delete', 'class'=>'form-horizontal']) !!}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-flat btn-danger">Limpar lista</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="box-footer">
                        {!! Form::open(['url' => 'vendas/finaliza', 'class'=>'form-horizontal', 'id'=>"form_buttons2"]) !!}
                            <button type="submit" class="btn btn-flat btn-success pull-right">Encerrar</button>
                            <a href="vendas/prazo" class="btn btn-flat bg-yellow">Marcar</a>                         
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop


