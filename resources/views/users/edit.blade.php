<!-- 
	Autor: Mateus Cardoso 
	E-mail: matecardoso38@gmail.com 
-->

@extends('adminlte::page')

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Edição de usuários
      </h1>
    </section>
@stop

@section('content')
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="box">

            {!! Form::open(['url' => 'users/'.$detailpage->id, 'method' => 'PUT', 'class'=>'form-horizontal']) !!}
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

								<div class="form-group has-feedback {{ $errors->has('nivel') ? 'has-error' : '' }}">
									<label for="nivel" class="col-sm-2 control-label">Nível de acesso</label>
									<div class="col-sm-10">
										<select class="form-control" name="nivel" value="{{ $detailpage->nivel }}" placeholder="Nivel de acesso">
											@if($detailpage->nivel != 2) <option value="2">Operacional</option>
											@else <option value="2" selected>Operacional</option>
											@endif
											@if($detailpage->nivel != 1) <option value="1">Administrativo</option>
											@else <option value="1" selected>Administrativo</option>
											@endif
										</select>
									</div>
                </div>
									
								<div class="box-footer">
									<button type="submit" class="btn btn-success btn-flat pull-right">Salvar</button>
								</div>
              
              </div>

            {!! Form::close() !!}

          </div>

@stop