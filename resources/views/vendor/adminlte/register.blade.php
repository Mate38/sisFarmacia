<!-- 
	Edição: Mateus Cardoso 
	E-mail: matecardoso38@gmail.com 
-->

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
                            <strong>Necessário informar o nome do usuário</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="E-mail do usuário">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>Necessário informar um e-mail válido</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control"
                            placeholder="Senha do usuário">
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>Necessário informar uma senha válida</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Confirmação da senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirmar a senha">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>Senhas não conferem</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('nivel') ? 'has-error' : '' }}">
                    <label for="nivel" class="col-sm-2 control-label">Nível de acesso</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="nivel" value="{{ old('nivel') }}" placeholder="Nivel de acesso">
                            <option value="2">Operacional</option>
                            <option value="1">Administrativo</option>
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat pull-right">Salvar</button>
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
