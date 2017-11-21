@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Cadastro de usuário
      </h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="box">

        <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="box-body">

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control col-sm-10" value="{{ old('name') }}"
                            placeholder="Nome do usuário">
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="{{ trans('adminlte::adminlte.email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.password') }}">
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Confirmação da senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                </div>

            </div>

        </form>

    </div>
  </div>
</div>
@stop

@section('adminlte_js')
    @yield('js')
@stop
