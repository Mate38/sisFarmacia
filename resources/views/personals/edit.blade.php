@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Edição do usuário
      </h1>
    </section>
@stop

@section('content')
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="box">

            {!! Form::open(['url' => 'personals', 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
              <div class="box-body">

								<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
										<label for="name" class="col-sm-2 control-label">Nome</label>
										<div class="col-sm-10">
												<input type="text" name="name" class="form-control col-sm-10" value="{{ $detailpage->name }}"
														placeholder="Nome do usuário">
										</div>
								</div>

								<div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
										<label for="email" class="col-sm-2 control-label">E-mail</label>
										<div class="col-sm-10">
												<input type="email" name="email" class="form-control" value="{{ $detailpage->email }}"
														placeholder="E-mail do usuário">
										</div>
								</div>

								<div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
										<label for="password" class="col-sm-2 control-label">Senha</label>
										<div class="col-sm-10">
												<input type="password" name="password" class="form-control" value="{{ $detailpage->password }}"
														placeholder="Senha do usuário">
										</div>
								</div>
									
								<div class="box-footer">
									<button type="submit" class="btn btn-success pull-right">Salvar</button>
								</div>
              
              </div>

            {!! Form::close() !!}

          </div>

@stop