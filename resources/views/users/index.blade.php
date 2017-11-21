@extends('adminlte::page')

{{ Session::get('message') }}

@section('title')

@section('content_header')
    <section class="content-header">
      <h1>
        Usuários cadastrados
      </h1>
    </section>
@stop

@section('content')

  <div class="box">
    <div class="box-body table-responsive no-padding">
      <table id="users" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Nome</th>     
          <th>E-mail</th>
          <th>Nivel</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->nivel == 1) {{ 'Administrador' }} 
                @elseif($user->nivel == 2) {{ 'Operacional' }}
                @endif
            </td>
            <td>
              {!! Form::open(['url' => 'users/'.$user->id, 'method' => 'delete', 'class'=>'form-horizontal', 'id'=>"form_buttons"]) !!}
                <a href="password/reset/{{ $user->id }}" class="btn-sm bg-yellow">Resetar Senha</a>
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
