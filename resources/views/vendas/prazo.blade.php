@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
        <h1>
            Venda a prazo
        </h1>
    </section>
    @stop

    @section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box">

                {!! Form::open(array('url' => '/vendas/finaliza', 'class'=>'form-horizontal')) !!}

                <div class="box-body">

                    <div class="form-group has-feedback {{ $errors->has('clientes_id') ? 'has-error' : '' }}">
                        <label for="clientes_id" class="col-sm-2 control-label">Cliente</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="clientes_id">
                                <option value="">--- Escolha um cliente ---</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->idclientes }}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-flat bg-blue pull-right">Concluir</button>
                </div>
                {!! Form::close() !!}

            </div>

        </div>
    </div>
@stop


